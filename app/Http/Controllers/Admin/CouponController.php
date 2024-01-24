<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use App\Models\Coupons;

use App\Models\Service;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Response;

use Purifier;

use Helper;



class CouponController extends Controller

{

    public function index(Request $request)

    {

        if($request->ajax())

        {

            $output = '';

            $query1 = $request->get('query');

            if($query1 != '')

            {

                $couponsdata = Coupons::join('services','coupons.service_id','services.id')

                    ->select('coupons.*','services.name as service_name')

                    ->where(function ($query) use($query1){

                        $query->where('coupons.code', 'like','%'.$query1.'%')

                            ->orWhere('coupons.discount', 'like','%'.$query1.'%')

                            ->orWhere('coupons.start_date', 'like','%'.$query1.'%')

                            ->orWhere('coupons.expire_date', 'like','%'.$query1.'%')

                            ->orWhere('coupons.description', 'like','%'.$query1.'%')

                            ->orWhere('services.name', 'like','%'.$query1.'%');

                        })

                    ->orderByDesc('coupons.id')

                    ->paginate(10);

            }else{

                $couponsdata = Coupons::join('services','coupons.service_id','services.id')

                    ->select('coupons.*','services.name as service_name')

                    ->orderByDesc('coupons.id')

                    ->paginate(10);

            }

            return view('service.coupon.coupon_table', compact('couponsdata'))->render();

        }else{

            $couponsdata = Coupons::where('is_deleted',2)->orderBy('id','DESC')->paginate(10);

            return view('service.coupon.index',compact('couponsdata'));    

        }

        

    }

    public function add()
    {
        $servicedata = Service::where('is_available',1)->where('is_deleted',2)->orderBy('id','DESC')->get();
        return view('service.coupon.add',compact('servicedata'));
    }

    public function store(Request $request)

    {

        $validator = Validator::make($request->all(),[

                'code' => 'required',

                'service_id' => 'required',

                'discount' => 'required|numeric',

                'discount_type' => 'required',

                'start_date' => 'required|date',

                'expire_date' => 'required|date|after:start_date',

                'description' => 'required'

            ],[ 

                'code.required' => trans('messages.enter_coupon'),

                'service_id.required' => trans('messages.select_service'),

                'discount.required' => trans('messages.enter_discount'),

                'discount.numeric' => trans('messages.enter_discount_numbers'),

                'discount_type.required' => trans('messages.select_discount_type'),

                'start_date.required' => trans('messages.start_date'),

                'start_date.date' => trans('messages.valid_date'),

                'expire_date.required' => trans('messages.expire_date'),

                'expire_date.date' => trans('messages.valid_date'),

                'expire_date.after' => trans('messages.after_start_date'),

                'description.required' => trans('messages.enter_description')

            ]);

        if ($validator->fails()) {



            return redirect()->back()->withErrors($validator)->withInput();



        }else{

            $description = strip_tags(Purifier::clean($request->description));

            $Coupon = new Coupons();

            $Coupon->code = $request->code;

            $Coupon->service_id = $request->service_id;

            $Coupon->discount = $request->discount;

            $Coupon->discount_type = $request->discount_type;

            $Coupon->start_date = $request->start_date;

            $Coupon->expire_date = $request->expire_date;

            $Coupon->description = $description;

            $Coupon->is_available = 1;

            $Coupon->is_deleted = 2;

            $Coupon->save();



            return redirect(route('coupons'))->with('success',trans('messages.coupon_added'));

        }

    }

    public function status(Request $request)

    {

        $success = Coupons::where('id',$request->id)->update(['is_available'=>$request->status]);

        if($success) {

            return 1;

        } else {

            return 0;

        }                                 

    }

    public function destroy(Request $request)

    {

        $rec = Coupons::where('id',$request->id)->update(['is_deleted'=>1]);

        if($rec) {

            return 1;

        } else {

            return 0;

        }                                        

    }

    public function show($id)

    {

        $coupondata = Coupons::find($id);



        if(Auth::user()->type == 1){



            $servicedata = Service::where('id','!=',$coupondata['servicename']->id)->where('is_available',1)->where('is_deleted',2)->orderBy('id','DESC')->get();



        }elseif(Auth::user()->type == 2){



            $servicedata = Service::where('provider_id',Auth::user()->id)->where('id','!=',$coupondata['servicename']->id)->where('is_available',1)->where('is_deleted',2)->orderBy('id','DESC')->get();

        }



        return view('service.coupon.show',compact('coupondata','servicedata'));

    }

    public function edit(Request $request,$id)

    {

        $validator = Validator::make($request->all(),[

                    'code' => 'required',

                    'service_id' => 'required',

                    'discount' => 'required|numeric',

                    'discount_type' => 'required',

                    'start_date' => 'required|date',

                    'expire_date' => 'required|date|after:start_date',

                    'description' => 'required'

                ],[ 

                    'code.required' => trans('messages.enter_coupon'),

                    'service_id.required' => trans('messages.select_service'),

                    'discount.required' => trans('messages.enter_discount'),

                    'discount.numeric' => trans('messages.enter_discount_numbers'),

                    'discount_type.required' => trans('messages.select_discount_type'),

                    'start_date.required' => trans('messages.start_date'),

                    'start_date.date' => trans('messages.valid_date'),

                    'expire_date.required' => trans('messages.expire_date'),

                    'expire_date.date' => trans('messages.valid_date'),

                    'expire_date.after' => trans('messages.after_start_date'),

                    'description.required' => trans('messages.enter_description')

                ]);

        if ($validator->fails()) {



            return redirect()->back()->withErrors($validator)->withInput();

            

        }else{

            if($request->is_available) { $available=1; }else { $available=2; }

            $description = strip_tags(Purifier::clean($request->description));

            Coupons::where('id',$id)

                    ->update([

                        "code" => $request->code,

                        "service_id" => $request->service_id,

                        "discount" => $request->discount,

                        "discount_type" => $request->discount_type,

                        "start_date" => $request->start_date,

                        "expire_date" => $request->expire_date,

                        "description" => $description,

                        "is_available" => $available

                    ]);



            return redirect(route('coupons'))->with('success',trans('messages.coupon_updated'));

        }

    }

}


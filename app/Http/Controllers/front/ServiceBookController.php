<?php
namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use App\Models\Timing;
use App\Models\Booking;
use App\Models\Rattings;
use Illuminate\Support\Facades\Mail;
use App\Mail\Your_Booking;
use App\Mail\Accepted;
use App\Models\Coupons;
use App\Models\Aboutus;
use App\Models\BookingAddress;
use App\Models\City;
use App\Models\Transaction;
use App\Models\Notification;
use App\Models\GalleryImages;
use App\Models\PaymentMethods;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Purifier;
use Response;
use Helper;
use Stripe;


class ServiceBookController extends Controller
{
        public function book(Request $request)
        {
                $booking_id = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10);
                
                $checkservice = Service::where('id',$request->service)->where('is_available',1)->where('is_deleted',2)->first();

                $checkprovider = User::where('id',$checkservice->provider_id)->first();

                // if($request->payment_type == 2){

                //         $getuserdata = User::where('id',$request->user_id)->get()->first();
                //         if ($getuserdata->wallet < $request->total_price) {
                //                 return response()->json(["status"=>0,"message"=>trans('messages.low_balance')],200);
                //         }else{
                //                 $wallet = $getuserdata->wallet - $request->total_price;

                //                 $updateuserwallet = User::where('id',$request->user_id)->update(['wallet' => $wallet]);

                //                 $transaction = new Transaction;
                //                 $transaction->user_id = $request->user_id;
                //                 $transaction->service_id = $request->service;
                //                 $transaction->provider_id = $checkservice->provider_id;
                //                 $transaction->booking_id = $booking_id;
                //                 $transaction->amount = $request->total_price;
                //                 $transaction->payment_type = 2;
                //                 $transaction->save();
                //         }

                // }
                // if($request->payment_type == 3 || $request->payment_type == 5 || $request->payment_type == 6){

                //         $payment_id = $request->payment_id;
                        
                // }
                // if($request->payment_type == 4){

                //         Stripe\Stripe::setApiKey(Helper::stripe_key());
                //         $payment = Stripe\Charge::create ([
                //                 "amount" => $request->total_price * 100,
                //                 "currency" => "inr",
                //                 "source" => $request->stripeToken,
                //                 "description" => "Test payment description.",
                //         ]);
                //         $payment_id = $payment->id;
                // }
                // $note = strip_tags(Purifier::clean($request->booking_notes));
                $booking = new Booking();
                $booking->booking_id = $booking_id;
                $booking->service_id = $request->service;
                $booking->service_name = $checkservice->name;
                $booking->service_image = $checkservice->image;
                $booking->price = $checkservice->price;
                $booking->price_type = $checkservice->price_type;
                $booking->duration = $checkservice->duration;
                $booking->duration_type = $checkservice->duration_type;
                $booking->provider_id = $checkservice->provider_id;
                $booking->provider_name = $checkprovider->name;
                if(Storage::exists('service_id')){
                        $booking->coupon_code = $request->coupon_code;
                        $booking->discount = $request->discount;
                }
                $booking->user_id = $request->user_id;
                $booking->save();
                
                return back();
                // $booking->date = $request->date;
                // $booking->time = $request->time;
                // $booking->address = $request->fullname.", ".$request->email.", ".$request->mobile.", ".$request->street.", ".$request->landmark.", ".$request->postcode;
                // $booking->payment_type = $request->payment_type;
                // if($request->payment_type != "1" && $request->payment_type != "2"){
                //         $booking->transaction_id = $payment_id;
                // }
                // $booking->note = $note;
                // $booking->total_amt = $request->total_price;
                // if($booking->save()){

                //         if(Storage::exists('service_id')){
                //                 Storage::disk('local')->delete("service_id");
                //         }
                //         if(Storage::exists('coupon_code')){
                //                 Storage::disk('local')->delete("coupon_code");
                //         }
                //         if(Storage::exists('total_discount')){
                //                 Storage::disk('local')->delete("total_discount");
                //         }
                //         if(Storage::exists('discount_type')){
                //                 Storage::disk('local')->delete("discount_type");
                //         }
                //         if(Storage::exists('service')){
                //                 Storage::disk('local')->delete("service");
                //         }
                //         if(Storage::exists('total_price')){
                //                 Storage::disk('local')->delete("total_price");
                //         }

                //         $helper=helper::create_booking($booking->booking_id);
                        
                //         return back();

                //         // if($helper == 1){
                //         //         helper::create_booking_noti($booking->user_id,$booking->provider_id,$booking->booking_id);
                //         //         return Response::json(['status' => 1,'message' => $request->input()], 200);
                //         // }else{
                //         //         return response()->json(['status'=>0,'message'=>trans('messages.wrong_while_email')],200);
                //         // }
                        
                // }
                // else
                // {
                //         return Response::json(['status' => 0,'message' => trans('messages.wrong')], 200);
                // }
        }

        public function cancel(Request $request)
        {
                if($request->booking_id != ""){

                        $bdata = Booking::where('booking_id',$request->booking_id)->first();

                        if(!empty($bdata)){

                                if($bdata->status == 2)
                                {
                                        return response()->json(['status'=>0,'message'=>trans('messages.accepted_by_provider')],200);
                                }
                                elseif($bdata->status == 4)
                                {
                                        return response()->json(['status'=>0,'message'=>trans('messages.cancelled_by_provider')],200);
                                }
                                else
                                {
                                        $helper=helper::cancel_booking($bdata->id);
                                        if($helper == 1)
                                        {
                                                $success = Booking::where('booking_id',$request->booking_id)->update(['status'=>4,'canceled_by'=>2]);
                                                helper::cancel_booking_noti(Auth::user()->id,$request->booking_id,$request->canceled_by);
                                                return redirect()->back()->with('success',trans('Cancelled Successfully'));
                                        }
                                        else
                                        {
                                                return response()->json(['status'=>0,'message'=>trans('messages.wrong_while_email')],200);
                                        }

                                }
                        }else{
                                return 0;
                        }
                } else {
                    return 0;
                }
        }
        public function stripe_pay(Request $request)
        {
                // dd($request->input());
                Stripe\Stripe::setApiKey("sk_test_51HVsZRLKgWGtoXaz2VWYK0XT4FjOinBELkdjMuEMoBVYChCu3lUUmhv9o6FtbAQhWdyOMANwkDyXzxW8KmtrFNiQ009xR3GbaZ");
                $payment = Stripe\Charge::create ([
                        "amount" => 1000 * 100,
                        "currency" => "inr",
                        "source" => $request->stripeToken,
                        "description" => "Test payment description.",
                ]);
                dd($payment);
                return back();
        }
        public function checkout($service)
        {
            $booking_id = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10);
            $checkservice = Service::where([['id',$service],['is_available',1],['is_deleted',2]])->first();
            $checkprovider = User::where('id',$checkservice->provider_id)->first();
            
            $booking = new Booking();
            $booking->booking_id = $booking_id;
            $booking->service_id = $checkservice->id;
            $booking->service_name = $checkservice->name;
            $booking->service_image = $checkservice->image;
            $booking->price = $checkservice->price;
            $booking->price_type = $checkservice->price_type;
            $booking->duration = $checkservice->duration;
            $booking->duration_type = $checkservice->duration_type;
            $booking->provider_id = $checkservice->provider_id;
            $booking->provider_name = $checkprovider->name;
            $booking->user_id = Auth::user()->id;
            $booking->save();
            
            $name = Auth::user()->name;
            $user_email = Auth::user()->email;
            
            Mail::to($user_email)->send(new Your_Booking($name, $booking_id));
            
            return redirect("/home/user/bookings")->with('success',trans('Application sent Successfully'));
            
                // if(isset($_COOKIE["city_name"])){
                //         $servicedata = Service::with('rattings')
                //                 ->join('categories', 'services.category_id', '=', 'categories.id')
                //                 ->join('users', 'services.provider_id', '=', 'users.id')
                //                 ->select('services.id as service_id','services.name as service_name','services.price','services.price_type','services.description',
                //                         'services.discount','services.duration',
                //                     DB::raw("CONCAT('".asset('application/storage/app/public/service')."/', services.image) AS service_image"))
                //                 ->where('services.slug',$service)
                //                 ->where('services.is_available',1)
                //                 ->where('services.is_deleted',2)
                //                 ->first();
                //         $addressdata = BookingAddress::where('user_id',Auth::user()->id)->orderByDesc('id')->get();
                //         $paymethods = PaymentMethods::where('is_available',1)->orderBy('id')->get();
                // }else{
                //         $servicedata = "";
                //         $addressdata = "";
                //         $paymethods = "";  
                // }
                
                // return view("front.checkout",compact('addressdata','servicedata','paymethods'));
        }
        public function remove_coupon()
        {
                if(Storage::exists('service_id')){
                        Storage::disk('local')->delete("service_id");
                }
                if(Storage::exists('coupon_code')){
                        Storage::disk('local')->delete("coupon_code");
                }
                if(Storage::exists('total_discount')){
                        Storage::disk('local')->delete("total_discount");
                }
                if(Storage::exists('discount_type')){
                        Storage::disk('local')->delete("discount_type");
                }
                if(Storage::exists('service')){
                        Storage::disk('local')->delete("service");
                }
                if(Storage::exists('total_price')){
                        Storage::disk('local')->delete("total_price");
                }
                return redirect()->back()->with('success',trans('messages.success'));
        }
        public function check_coupon(Request $request, $service)
        {
                $validator = Validator::make($request->all(),
                        ['coupon' => 'required',],
                        [ 'coupon.required' => trans('messages.enter_coupon')]
                );
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }else{
                        $sdata = Service::where('slug',$service)->first();
                        
                        $checkcoupon = Coupons::where('service_id',$sdata->id)
                                              ->where('code',$request->coupon)
                                              ->where('is_available',1)
                                              ->where('is_deleted',2)
                                              ->first();
                      
                        if(!empty($checkcoupon)){
                                if ((date('Y-m-d') >= $checkcoupon->start_date) && (date('Y-m-d') <= $checkcoupon->expire_date))
                                {
                                        Storage::disk('local')->put("service_id", $sdata->id);
                                        Storage::disk('local')->put("coupon_code", $checkcoupon->code);
                                        Storage::disk('local')->put("discount" , $checkcoupon->discount);
                                        Storage::disk('local')->put("discount_type", $checkcoupon->discount_type);

                                        return redirect()->back()->with('success',trans('messages.success'))->withInput();
                                }else{
                                        return redirect()->back()->with('error',trans('messages.coupon_expired'));
                                }
                        }else{
                                return redirect()->back()->with('error',trans('messages.not_for_this_service'));
                        }                
                }
        }
	public function continue_booking($service)
	{
                if(isset($_COOKIE["city_name"])){
        		$servicedata = Service::with('rattings')
                                ->join('categories', 'services.category_id', '=', 'categories.id')
                                ->join('users', 'services.provider_id', '=', 'users.id')
                                ->select('services.id as service_id','services.name as service_name','services.price','services.price_type','services.description','services.discount','services.duration','services.slug','services.image as service_image','categories.id as category_id','categories.name as category_name','services.provider_id as porvider_id','users.name as provider_name','users.image as provider_image')
                                ->where('services.slug',$service)
                                ->where('services.is_available',1)
                                ->where('services.is_deleted',2)
                                ->first();
                }else{
                        $servicedata = "";
                }
		return view('front.continue_booking',compact('servicedata'));
	}
        public function stripe_form()
        {
                return view('front.stripe_form');
        }
        public function success()
        {
                return view('front.booking_success');
        }
        public function emailTest()
        {
            $name =  "Samson";
            $booking_id = "Agg567GHFGJHJHSrtt";
            $user_email = "thogosamson@gmail.com";
            
            Mail::to($user_email)->send(new Accepted($name, $booking_id));
            
            
            
        }
}
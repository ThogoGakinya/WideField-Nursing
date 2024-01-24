<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Mail\Accepted;
use Illuminate\Support\Facades\Mail;
use Helper;
class BookingController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $query1 = $request->get('query');
            $query = Booking::query();
            if($query1 != '')
            {
                if(Auth::user()->type == 2){
                    $query = $query->where('bookings.provider_id',Auth::user()->id);
                }elseif($request->get('provider') != ""){
                    $query = $query->where('bookings.provider_id',$request->get('provider'));
                }
                $query = $query->where(function ($query) use($query1){
                        $query->where('bookings.service_name', 'like','%'.$query1.'%')
                            ->orWhere('bookings.booking_id', 'like','%'.$query1.'%')
                            ->orWhere('bookings.date', 'like','%'.$query1.'%')
                            ->orWhere('bookings.time', 'like','%'.$query1.'%');
                        });
            }else{
                if(Auth::user()->type == 2){
                    $query = $query->where('bookings.provider_id',Auth::user()->id);
                }elseif($request->get('provider') != ""){
                    $query = $query->where('bookings.provider_id',$request->get('provider'));
                }
            }
            $bookingdata = $query->orderByDesc('id')->paginate(10);
            return view('booking.booking_table', compact('bookingdata'))->render();
        }else{
            if(Auth::user()->type == 1){
                $bookingdata = Booking::orderByDesc('id')->paginate(10);
                $ahandymandata="";
            }elseif(Auth::user()->type == 2){
                $ahandymandata = User::where("provider_id",Auth::user()->id)->where('type',3)->where('is_available',1)->get();
                $bookingdata = Booking::where('provider_id',Auth::user()->id)->orderByDesc('id')->paginate(10);
            }
            return view('booking.index',compact('bookingdata','ahandymandata'));
        }
    }
    public function booking_details($booking)
    {
        $ahandymandata = User::where("provider_id",Auth::user()->id)->where('type',3)->where('is_available',1)->get();
        $bookingdata = Booking::join('services','bookings.service_id','services.id')
            ->join('categories','services.category_id','categories.id')
            ->join('users','bookings.provider_id','users.id')
            ->leftJoin('users as handyman','bookings.handyman_id','handyman.id')
            ->select('bookings.id','bookings.booking_id','bookings.service_id','bookings.service_name','bookings.provider_name','bookings.date','bookings.time','bookings.price','bookings.total_amt','bookings.discount','bookings.address','bookings.note','bookings.status','bookings.canceled_by','bookings.payment_type','bookings.provider_id','users.name as provider_name','users.slug as provider_slug','categories.name as category_name','services.price_type','services.duration_type','services.duration','services.description','bookings.handyman_accept','bookings.reason','handyman.id as handyman_id','handyman.name as handyman_name','handyman.email as handyman_email','handyman.mobile as handyman_mobile','users.email as provider_email','users.mobile as provider_mobile','handyman.image as handyman_image','users.image as provider_image','bookings.service_image as service_image',
                DB::raw('DATE(bookings.created_at) AS created_date'))
            ->where('bookings.booking_id',$booking)
            ->first();
        return view('booking.booking_details',compact('bookingdata','ahandymandata'));
    }
    public function assign_handyman(Request $request)
    {
        $assign = Booking::where('id',$request->id)->update(['handyman_id'=>$request->handyman_id,'handyman_accept'=>1,'reason'=>null]);
        if($assign){
            $checkbooking = Booking::where('id',$request->id)->first();
            helper::assign_handyman_noti($request->handyman_id,$checkbooking->booking_id);

            return redirect()->back()->with('success',trans('messages.handyman_assigned'));
        }else{
            return redirect()->back()->with('error',trans('messages.wrong'));
        }
    }
    public function accept(Request $request)
    {
        $checkbooking = Booking::where('id',$request->id)->first();
        if($checkbooking->status == 4){
            return response()->json(['status'=>0,'message'=>trans('messages.cancelled_by_user')],200);
        }
        $success = Booking::where('id',$request->id)->update(['status'=>$request->status]);
        $getserviceid = Booking::where('id',$request->id)->first();
        if($success) {
               $successs = Service::where('id',$getserviceid->service_id)->update(['is_available'=>2]);
               $user = User::where('id',$checkbooking->user_id)->first();
               $user_email = $user->email;
               $name = $user->name;
               Mail::to($user_email)->send(new Accepted($name, $checkbooking->booking_id));
               return 1;
                // $helper=helper::accept_booking($request->id);
                // if($helper == 1)
                // {
                //     $checkbooking = Booking::where('id',$request->id)->first();
                //     helper::accept_booking_noti($checkbooking->user_id,"",$checkbooking->booking_id);
                //     return 1;
                // }
                // else
                // {
                //      // $serviceupdate = Service::find($request->serviceid);
                        // $serviceupdate->is_available = 2;
                        // $serviceupdate->update();
                // }
        } else {
            return response()->json(['status'=>0,'message'=>trans('messages.wrong')],200);
        }
    }
    public function complete(Request $request)
    {
        $success = Booking::where('id',$request->id)->update(['status'=>$request->status]);
        if($success) {
            $helper=helper::complete_booking($request->id);
            return 1;
            // if($helper == 1){
            //     $booking = Booking::find($request->id);
            //     helper::complete_booking_noti($booking->user_id,$booking->booking_id);

            //     if($booking->payment_type != 1 && $booking->payment_type != 2){
            //         $providerdata = User::where('id',$booking->provider_id)->first();
            //         $wallet = $providerdata->wallet+$booking->total_amt;
            //         User::where('id',$booking->provider_id)->update(['wallet'=>$wallet]);
            //     }
            //     return 1;
            // }else{
            //     return response()->json(['status'=>0,'message'=>trans('messages.wrong_while_email')],200);
            //}
        } else {
            return response()->json(['status'=>0,'message'=>trans('messages.wrong')],200);
        }
    }
    public function cancel(Request $request)
    {
        $checkbooking = Booking::where('id',$request->id)->first();
        if($checkbooking->status == 4){
            return response()->json(['status'=>0,'message'=>trans('messages.cancelled_by_user')],200);
        }
        $checkbooking->status = $request->status;
        $checkbooking->canceled_by = $request->canceled_by;

        if($checkbooking->payment_type != 1 && $checkbooking->payment_type != 2)
        {
            $wallet = Auth::user()->wallet + $checkbooking->total_amt;
            $updateuserwallet = User::where('id',Auth::user()->id)->update(['wallet' => $wallet]);
            
            $transaction = new Transaction;
            $transaction->user_id = Auth::user()->id;
            $transaction->service_id = $checkbooking->service_id;
            $transaction->provider_id = $checkbooking->provider_id;
            $transaction->booking_id = $checkbooking->booking_id;
            $transaction->transaction_id = $checkbooking->transaction_id;
            $transaction->amount = $checkbooking->total_amt;
            $transaction->payment_type = 1;
            $transaction->save();
        }
        if($checkbooking->save()) {
            $helper=helper::cancel_booking($request->id);
            return 1;
            // if($helper == 1){
            //     $checkbooking = Booking::where('id',$request->id)->first();
            //     helper::cancel_booking_noti($checkbooking->user_id,$checkbooking->booking_id,$request->canceled_by);
            //     return 1;
            // }else{
            //     return response()->json(['status'=>0,'message'=>trans('messages.wrong_while_email')],200);
            // }
        } else {
            return response()->json(['status'=>0,'message'=>trans('messages.wrong')],200);
        }
    }
}

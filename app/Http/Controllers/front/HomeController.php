<?php
namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use App\Models\Timing;
use App\Models\HomeSettings;
use App\Models\Rattings;
use App\Models\CMS;
use App\Models\City;
use App\Models\Banner;
use App\Models\GalleryImages;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (isset($_COOKIE["city_name"])) {
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            $categorydata = Category::select('id','name','slug','image')
                            ->where('is_featured',1)->where('is_available',1)->where('is_deleted',2)
                            ->orderByDesc('id')->take(12)->get();
            $servicedata = Service::with('rattings')
                            ->join('categories', 'services.category_id', '=', 'categories.id')
                            ->join('users', 'services.provider_id', '=', 'users.id')
                            ->select('services.id','services.name as service_name','services.slug','services.price','services.price_type','services.duration','services.duration_type','categories.name as category_name','users.mobile','services.image as service_image')
                            ->where('users.city_id',@$city->id)
                            ->where('services.is_available',1)->where('services.is_deleted',2)
                            ->orderByDesc('services.id')->take(10)->get();
            $providerdata = User::with('rattings')
                            ->join('cities', 'users.city_id', '=', 'cities.id')
                            ->join('provider_types', 'users.provider_type', '=', 'provider_types.id')
                            ->select('users.id','users.name as provider_name','users.email','users.mobile','users.about','users.slug',
                                'users.address','cities.name as city_name','provider_types.name as provider_type','users.image as provider_image',)
                            ->where('users.city_id',@$city->id)
                            ->where('users.type',2)->where('users.is_available',1)
                            ->orderByDesc('users.id')->take(10)->get();
            
            $howworkdata = HomeSettings::first();

            $banners = Banner::with('categoryname','servicename')
                        ->leftJoin('services','banners.service_id','services.id')
                        ->leftJoin('users','services.provider_id','users.id')
                        ->leftJoin('categories','categories.id','banners.category_id')
                        ->select('banners.id','banners.service_id','banners.category_id','users.city_id','banners.image','categories.slug as category_slug','services.slug as service_slug','services.name as sname')
                        ->orderByDesc('id')
                        ->get();
            $bannerdata = array();
            foreach($banners as $bdata){
                if($bdata->service_id != ""){
                   if($bdata->city_id == @$city->id){
                      $bannerdata[] = array(
                         'id' => $bdata->id,
                         'category_id' => $bdata->category_id,
                         'service_id' => $bdata->service_id,
                         'image' => $bdata->image,
                         'category_slug' => $bdata->category_slug,
                         'service_slug' => $bdata->service_slug,
                      );
                   }
                }else{
                   $bannerdata[] = array(
                      'id' => $bdata->id,
                      'category_id' => $bdata->category_id,
                      'service_id' => $bdata->service_id,
                      'image' => $bdata->image,
                      'category_slug' => $bdata->category_slug,
                      'service_slug' => $bdata->service_slug,
                   );
                }
            }
        }else{
            $categorydata = "";
            $servicedata = "";
            $providerdata = "";
            $howworkdata = "";
            $bannerdata = "";
        }
        // dd($bannerdata);
        return view("front.home",compact('categorydata','servicedata','providerdata','howworkdata','bannerdata'));
    }

    public function categories()
    {
        if (isset($_COOKIE["city_name"])) {
            $categorydata = Category::select('id','name','slug','image')->where('is_available',1)->where('is_deleted',2)->orderByDesc('id')->get();
        }else{
            $categorydata = "";
        }
        return view("front.categories",compact('categorydata'));
    }
    
    public function providers()
    {
        if(isset($_COOKIE["city_name"])){
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            
            $providerdata = User::with('rattings')
                        ->join('cities', 'users.city_id', '=', 'cities.id')
                        ->join('provider_types', 'users.provider_type', '=', 'provider_types.id')
                        ->select('users.id','users.name as provider_name','users.email','users.mobile','users.about','users.slug',
                            'users.address','cities.name as city_name','provider_types.name as provider_type','users.image as provider_image')
                        ->where('users.city_id',@$city->id)
                        ->where('users.type',2)->where('users.is_available',1)
                        ->paginate(10);
        }else{
            $providerdata = "";
        }
        return view("front.providers",compact('providerdata'));
    }
    
    public function provider_details($provider)
    {
        if(isset($_COOKIE["city_name"])){
            
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            
            $providerdata = User::select('users.id','users.name as provider_name','users.address','users.email','users.mobile','users.about','users.slug','users.image as provider_image')
                ->where('users.city_id',@$city->id)->where('users.type',2)->where('users.is_available',1)->where('users.slug',$provider)
                ->first();
            if(empty($providerdata)){
                return redirect(route('home'));
            }else{
                $timingdata = Timing::select('day','open_time','close_time','is_always_close')->where('provider_id',$providerdata->id)->get();
            }
        }else{
            $providerdata = "";
            $timingdata = "";
        }
        return view("front.provider_details",compact('providerdata','timingdata'));
    }
    
    public function provider_rattings($provider)
    {
        if(isset($_COOKIE["city_name"])){
            
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            
            $providerdata = User::select('users.id','users.name as provider_name','users.slug','users.image as provider_image')
                ->where('users.city_id',@$city->id)->where('users.type',2)->where('users.is_available',1)->where('users.slug',$provider)
                ->first();
            if(empty($providerdata)){
                return redirect(route('home'));
            }else{
                $providerrattingsdata = Rattings::join('users', 'rattings.user_id', '=', 'users.id')
                    ->select('rattings.id','rattings.ratting','rattings.comment','users.name as user_name','users.image as user_image',
                       DB::raw('DATE(rattings.created_at) AS date'))
                    ->where('rattings.provider_id',$providerdata->id)
                    ->paginate(10);
            }
        }else{
            $providerdata = "";
            $providerrattingsdata = "";
        }
        return view("front.provider_rattings",compact('providerdata','providerrattingsdata'));
    }
    
    public function provider_services($provider)
    {
        if(isset($_COOKIE["city_name"])){
            
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            
            $providerdata = User::select('users.id','users.name as provider_name','users.slug','users.image as provider_image')
                ->where('users.city_id',@$city->id)->where('users.type',2)->where('users.is_available',1)->where('users.slug',$provider)
                ->first();

            if(empty($providerdata)){
                return redirect(route('home'));
            }else{
                $servicedata = Service::with('rattings')
                    ->join('categories', 'services.category_id', '=', 'categories.id')
                    ->join('users', 'services.provider_id', '=', 'users.id')
                    ->select('services.id','services.name as service_name','services.price','users.city_id','services.price_type','services.duration','services.duration_type','categories.name as category_name','services.slug','services.image as service_image','users.mobile as provider_mobile')
                    ->where('services.provider_id',$providerdata->id)
                    ->where('services.is_available',1)
                    ->where('services.is_deleted',2)
                    ->paginate(9);
            }
        }else{
            $providerdata = "";
            $servicedata = "";
        }
        return view("front.provider_services",compact('servicedata','providerdata'));
    }
    
    public function category_services($category)
    {
        if(isset($_COOKIE["city_name"])){
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            $servicedata = Service::with('rattings')
                        ->join('categories', 'services.category_id', '=', 'categories.id')
                        ->join('users', 'services.provider_id', '=', 'users.id')
                        ->select('services.id','services.name as service_name','services.price','services.price_type','services.duration','services.duration_type','categories.name as category_name','users.mobile','services.slug','services.image as service_image')
                        ->where('categories.slug',$category)
                        ->where('users.city_id',@$city->id)
                        ->where('services.is_available',1)->where('services.is_deleted',2)
                        ->orderByDesc('services.id')
                        ->paginate(12);
        }else{
            $servicedata = "";
        }
        
        return view("front.services",compact('servicedata'));
    }
    
    public function services(Request $request)
    {
        if(isset($_COOKIE["city_name"])){
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            
            $servicedata = Service::with('rattings')
                        ->join('categories', 'services.category_id', '=', 'categories.id')
                        ->join('users', 'services.provider_id', '=', 'users.id')
                        ->select('services.id','services.category_id','services.start_time','services.end_time','services.name as service_name','services.slug','services.price','services.price_type','services.duration','services.duration_type','categories.name as category_name','users.mobile','services.image as service_image')
                        ->where('users.city_id',@$city->id)
                        ->where('services.is_available',1)
                        ->where('services.is_deleted',2)
                        ->orderByDesc('services.id')
                        ->paginate(12);
        }else{
            $servicedata = "";
        }
        return view("front.services",compact('servicedata'));
    }
    
    public function service_details($service)
    {
        if(isset($_COOKIE["city_name"])){
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            $servicedata = Service::with('rattings')
                        ->join('categories', 'services.category_id','categories.id')
                        ->join('users', 'services.provider_id','users.id')
                        ->select('services.id as service_id','services.name as service_name','services.price','services.price_type','services.description','services.discount','services.slug',
                            'categories.id as category_id','categories.name as category_name','categories.slug as category_slug',
                            'services.provider_id as porvider_id','services.image as service_image')
                        ->where('services.slug',$service)
                        ->where('services.is_available',1)
                        ->where('services.is_deleted',2)
                        ->where('users.city_id',@$city->id)
                        ->first();
            if(!empty($servicedata)){
               
                $serviceaverageratting = Rattings::select(DB::raw('ROUND(avg(rattings.ratting),2) as avg_ratting'))
                            ->where('service_id',$servicedata->service_id)
                            ->first();
                $servicerattingsdata = Rattings::join('users', 'rattings.user_id', '=', 'users.id')
                            ->select('rattings.id','rattings.ratting','rattings.comment','users.name as user_name','users.image as user_image',
                               DB::raw('DATE(rattings.created_at) AS date'))
                            ->where('rattings.service_id',$servicedata->service_id)
                            ->get();
                
                $galleryimages = GalleryImages::select('image as gallery_image')->where('service_id',$servicedata->service_id)->get();

                $providerdata = User::with('rattings')
                            ->join('provider_types', 'users.provider_type', '=', 'provider_types.id')
                            ->join('cities', 'users.city_id', '=', 'cities.id')
                            ->leftJoin('timings', 'timings.provider_id', '=', 'users.id')
                            ->select('users.id as provider_id','users.name as provider_name','users.email','users.slug','users.mobile','cities.name as city_name','users.about','provider_types.name as provider_type','users.image as provider_image')
                            ->where('users.id',$servicedata->porvider_id)
                            ->first();
            
                $timingdata = Timing::select('day','open_time','close_time','is_always_close')->where('provider_id',$providerdata->provider_id)->get();
                
                $reletedservices = Service::with('rattings')
                    ->join('categories', 'services.category_id', '=', 'categories.id')
                    ->join('users', 'services.provider_id', '=', 'users.id')
                    ->select('services.id','services.name as service_name','services.slug','services.price','services.price_type','services.duration','services.duration_type','categories.id as category_id','categories.name as category_name','users.mobile as provider_mobile','users.image as provider_image','services.image as service_image')
                    ->where('services.category_id',$servicedata->category_id)
                    ->where('users.city_id',@$city->id)
                    ->where('services.id','!=',$servicedata->service_id)
                    ->where('services.is_available',1)->where('services.is_deleted',2)
                    ->where('users.is_available',1)->orderByDesc('services.id')
                    ->get();
            }else{
                $servicedata="";$serviceaverageratting="";$servicerattingsdata="";$galleryimages="";$providerdata="";$timingdata="";$reletedservices="";
            }
        }else{
            $servicedata="";$serviceaverageratting="";$servicerattingsdata="";$galleryimages="";$providerdata="";$timingdata="";$reletedservices="";
        }
        return view("front.service_details",compact('servicedata','serviceaverageratting','servicerattingsdata','galleryimages','providerdata','timingdata','reletedservices'));
    }

    public function search(Request $request)
    {
        if(isset($_COOKIE["city_name"])){
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            $categorydata = Category::select('id','name')
                            ->where('is_available',1)->where('is_deleted',2)
                            ->orderBy('id','DESC')->get();
            $search_by = $request->search_by;
            if($search_by != ""){
                if($search_by == "service"){
                    $servicedata = Service::with('rattings')
                                ->join('users', 'services.provider_id', '=', 'users.id')
                                ->join('categories as cat', 'services.category_id', '=', 'cat.id')
                                ->select('services.id','services.name as service_name','services.price','services.slug','services.image as service_image',
                                    'services.price_type','services.duration','services.duration_type','users.mobile','cat.name as category_name')
                                ->where('users.city_id',@$city->id)
                                ->where('services.is_available',1)
                                ->where('services.is_deleted',2);
                    
                    if ($request->has('search_name') && $request->search_name != ""){
                        $servicedata = $servicedata->where('services.name', 'LIKE','%' . $request->search_name . '%');
                    }
                    if ($request->has('category') && $request->category != ""){
                        $servicedata = $servicedata->join('categories', 'services.category_id', '=', 'categories.id');
                        $servicedata = $servicedata->where('services.category_id', $request->category);
                    }
                    if ($request->has('sort_by') && $request->sort_by != "") {
                        if ($request->sort_by == "newest"){
                            $servicedata = $servicedata->orderByDesc('services.id');
                        }
                        if ($request->sort_by == "oldest"){
                            $servicedata = $servicedata->orderBy('services.id');
                        }
                        if($request->sort_by == "low_to_high"){
                            $servicedata = $servicedata->orderBy('services.price');
                        }
                        if($request->sort_by == "high_to_low")
                        {
                            $servicedata = $servicedata->orderByDesc('services.price');
                        }
                    }else{
                        $service = $service->orderByDesc('services.id');
                    }
                    $servicedata = $servicedata->paginate(12);
                    if($request->ajax()){
                        $view = view('front.service_section',compact('servicedata'))->render();
                        return Response::json(['count'=>count($servicedata),'ResponseData'=>$view]);
                    }else{
                        return view("front.search",compact('servicedata','categorydata'));
                    }      
                }
                if($search_by == "provider"){
                    $providerdata = User::with('rattings')
                                    ->join('cities','users.city_id','cities.id')
                                    ->join('provider_types', 'users.provider_type', '=', 'provider_types.id')
                                    ->select('users.id as provider_id','provider_types.name as provider_type','users.name as provider_name','users.slug','users.mobile','users.about','users.image as provider_image')
                                    ->where('users.type',2)
                                    ->where('users.is_available',1)
                                    ->where('users.city_id',@$city->id);

                    if ($request->has('search_name') && $request->search_name != ""){
                        $providerdata = $providerdata->where('users.name', 'LIKE','%' . $request->search_name . '%');
                    }
                    if ($request->has('sort_by') && $request->sort_by != "") {
                        if ($request->sort_by == "oldest"){
                            $providerdata = $providerdata->orderBy('users.id');
                        }
                        if ($request->sort_by == "newest"){
                            $providerdata = $providerdata->orderByDesc('users.id');
                        }
                    }else{
                        $providerdata = $providerdata->orderByDesc('users.id');
                    }
                    $providerdata = $providerdata->paginate(12);

                    if($request->ajax()){
                        $view = view('front.provider_section',compact('providerdata'))->render();
                        return Response::json(['count'=>count($providerdata),'ResponseData'=>$view]);
                    }else{
                         return view("front.search",compact('providerdata','categorydata'));
                    }
                }
            }else{
                $servicedata = Service::with('rattings')
                    ->join('categories', 'services.category_id', '=', 'categories.id')
                    ->join('users', 'services.provider_id', '=', 'users.id')
                    ->select('services.id','services.name as service_name','services.price','services.slug','services.image as service_image',
                        'services.price_type','services.duration','services.duration_type','categories.id as category_id','categories.name as category_name','users.mobile')
                    ->where('users.city_id',@$city->id)
                    ->where('services.is_available',1)->where('services.is_deleted',2)->orderByDesc('services.id')
                    ->paginate(12);
            }
        }else{
            $servicedata = "";
            $categorydata = "";
        }
        return view("front.search",compact('servicedata','categorydata'));
    }

    public function aboutus()
    {
        if(isset($_COOKIE["city_name"])){
            $aboutdata = CMS::select('about_image','about_content')->first();
            $howworkdata = HomeSettings::first();
        }else{
            $aboutdata = "";
            $howworkdata = "";
        }
        return view('front.aboutus',compact('aboutdata','howworkdata'));
    }
    public function tc()
    {
        if(isset($_COOKIE["city_name"])){
            $tcdata = CMS::select('tc_content')->first();
        }else{
            $tcdata = "";
        }
        return view('front.tc',compact('tcdata'));
    }
    public function policy()
    {
        if(isset($_COOKIE["city_name"])){
            $policydata = CMS::select('privacy_content')->first();
        }else{
            $policydata = "";
        }
        return view('front.policy',compact('policydata'));
    }
    public function find_service(Request $request)
    {
        if(isset($_COOKIE["city_name"])){
            $city = City::select('id')->where('name',$_COOKIE['city_name'])->first();
            if($request->ajax())
            {
                    $query = $request->get('query');
                    if($query != ""){
                        $servicedata = Service::join('users','services.provider_id','users.id')
                                ->select('services.name as service_name','services.slug as service_slug')
                                ->where('services.name', 'like', '%'.$query.'%')
                                ->where('users.city_id',@$city->id)
                                ->where('services.is_available',1)
                                ->where('services.is_deleted',2)
                                ->orderByDesc('services.id')
                                ->get();
                }else{
                    $servicedata = "";
                }
            }
        }else{
            $servicedata = "";    
        }
        return view('front.suggest', compact('servicedata'))->render();
    }
    public function find_cities(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('query');
            if($query != ""){
                $citydata = City::select('cities.name','cities.id','cities.image')
                        ->where('cities.name', 'like', '%'.$query.'%')
                        ->where('cities.is_available',1)
                        ->where('cities.is_deleted',2)
                        ->orderBy('name')
                        ->get();
            }else{
                $citydata = City::select('cities.name','cities.id','cities.image')
                    ->where('cities.is_available',1)
                    ->where('cities.is_deleted',2)
                    ->orderBy('name')
                    ->get();
            }
            return view('front.suggest', compact('citydata'))->render();
        }
    }
}

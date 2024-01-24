         <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
               <div class="navbar-header">
                  <a id="mobile_btn" href="javascript:void(0);">
                     <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                     </span>
                  </a>
                  <a href="{{ URL::to('/') }}" class="navbar-brand logo"><img src="{{ Helper::image_path(Helper::appdata()->logo)}}" class="avatar-lg rounded" alt="Logo"> </a>
                  <a href="{{ URL::to('/') }}" class="navbar-brand logo-small"><img src="{{ Helper::image_path(Helper::appdata()->logo)}}" class="avatar-lg rounded" alt="Logo"></a>
               </div>
               <div class="main-menu-wrapper">
                  <div class="menu-header">
                     <a href="{{ URL::to('/') }}" class="menu-logo"><img src="{{ Helper::image_path(Helper::appdata()->logo) }}" class="avatar-lg rounded" alt="Logo"></a>
                     <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                  </div>
                  <ul class="main-nav">
                     <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ URL::to('/') }}">{{trans('labels.home')}}</a></li>
                     
              <!--       
                     
                     <li class="{{ request()->is('home/categories*') ? 'active' : '' }}"><a href="{{ URL::to('/home/categories') }}">{{trans('labels.categories')}}</a></li>
                     <li class="{{ request()->is('home/services*') ? 'active' : '' }}"><a href="{{ URL::to('/home/services') }}">{{trans('labels.services')}}</a></li>
                     <li class="{{ request()->is('home/search*') ? 'active' : '' }}"><a href="{{ URL::to('/home/search') }}">{{trans('labels.search')}}</a></li>
                     
                -->   
                     
                     
                     @if (!Session::get('id'))
                        <li class="{{ request()->is('home/register-provider*') ? 'active' : '' }}"><a href="{{ URL::to('/home/register-provider') }}">{{trans('labels.become_provider')}}</a></li>
                         <li class="{{ request()->is('home/login*') ? 'active' : '' }} "><a href="{{ URL::to('/home/login') }}">{{trans('labels.login')}}</a></li>
                  
                        <li class="{{ request()->is('home/contact-us*') ? 'active' : '' }} "><a href="{{ URL::to('/home/contact-us') }}">{{trans('labels.contact_us')}}</a></li>
                     @endif
                     <li>
                         
                        <a href="javascript:void(0);" class="nav-link" data-toggle="modal" data-target="#citiesModal" aria-expanded="false" id="selected_city"></a>
                     </li>
                  </ul>
               </div>
               <ul class="nav header-navbar-rht">
                  @if (Session::get('id'))
                     <li class="nav-item desc-list wallet-menu">
                        <a href="{{URL::to('/home/user/wallet')}}" class="nav-link header-login">
                           <img src="{{Helper::image_path('wallet.png')}}" alt="" class="mr-2 wallet-img" /><span>{{trans('labels.wallet')}}</span> : {{Helper::currency_format(Helper::wallet())}}
                        </a>
                     </li>
                     <li class="nav-item dropdown logged-item">
                        <a href="" onclick="clearnotification('{{ URL::to('/home/user/clearnotification') }}','{{URL::to('/home/user/notifications')}}')" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                           <i class="fas fa-bell"></i>
                           @if(Helper::notification() > 0)
                              <span class="badge badge-pill bg-yellow">{{Helper::notification()}}</span>
                           @endif
                        </a>
                     </li>
                     <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                           <span class="user-img">
                              <img class="rounded-circle" src="{{Helper::image_path(@Auth::user()->image)}}" alt="" />
                           </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                           <a class="dropdown-item" href="{{URL::to('/home/user/dashboard')}}">{{trans('labels.dashboard')}}</a>
                           <a class="dropdown-item" href="{{URL::to('/home/user/bookings')}}">{{trans('labels.my_bookings')}}</a>
                           <a class="dropdown-item" href="{{URL::to('/home/user/profile')}}">{{trans('labels.profile_settings')}}</a>
                           <a class="dropdown-item" href="{{URL::to('/logout')}}">{{ trans('labels.logout') }}</a>
                        </div>
                     </li>
                  @endif
               </ul>
            </nav>
         </header>

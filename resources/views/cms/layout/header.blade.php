@php 
$ui = \App\Models\UiComponent::buildUiStructure(); 
use App\Models\Places;

   $places = Places::with('tours')->get();

@endphp
@php
function externalLinkTarget($url) {
    return preg_match('/^(http|https|www)\:/i', $url) ? ' target="_blank" rel="noopener"' : '';
}
@endphp


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    .register i {
        font-size: 22px;
        color: #333;
        transition: 0.3s;
    }

    .register i:hover {
        color: #007bff;
    }

    .header-account ul li i {
        font-size: 20px;
        top: 0px;
        position: relative;
    }

    .main-header .main-menu .navigation>li>a {
        position: relative;
        display: block;
        text-align: center;
        line-height: 26px;
        font-weight: 600;
        padding: 33px 0px;
        letter-spacing: 0px;
        color: #081E2A;
        font-size: 17px;
        text-transform: capitalize;
        transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
    }

    .header-top {
        padding-left: 209px;
        padding-right: 109px;
        background-color: #ffc107 !important;
        padding-top: 4px;
        padding-bottom: 4px;
    }

    .header-top .header-top-wrap .header-top-right ul li i {
        color: #fdfdfd;
        margin-right: 8px;
        font-size: 15px;
    }

    .header-top .header-top-wrap .header-top-left .follow-social ul {
        background-color: #ffc107 !important;
        padding: 8px 10px !important;
    }

    .header-top .header-top-wrap .header-top-left .booking i {
        color: #ffffff;
        margin-right: 5px;
    }

    .header-top .header-top-wrap .header-top-left .booking span {
        font-size: 14px;
        font-weight: 500;
        line-height: 17px;
        text-decoration: none;
    }

    /* Dropdown container */
    .dropdown2 {
        position: relative;
    }

    .dropdown2>a {
        text-decoration: none;
        padding: 10px 15px;
        display: inline-block;
    }

    /* Dropdown content hidden by default */
    .dropdown2 .dropdown-content {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background: #fff;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        width: 600px !important;
        /* adjust as needed */
        display: flex;
        gap: 20px;
        /* space between sections */
    }

    /* Show dropdown on hover */
    .dropdown2:hover .dropdown-content {
        display: flex;
    }

    /* Each trip section */
    .trip-section {
        flex: 1;
        /* divide available space equally */
    }

    .trip-section h3 {
        margin-bottom: 10px;
        font-size: 16px;
    }

    /* Trip items block layout */
    .trip-items {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    /* .trip-item {
    flex: 0 0 48%; 
    background: #f2f2f2;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    font-size: 14px;
} */

    .main-header .main-menu .navigation>li>ul {
        position: absolute;
        width: 800px;
        border-radius: 6px;
        z-index: 1;
        padding: 20px 30px 20px 30px;
        transform: translateY(15px);
        -webkit-transform-origin: top;
        -ms-transform-origin: top;
        -o-transform-origin: top;
        transform-origin: top;
        opacity: 0;
        visibility: hidden;
        transition: all 300ms ease;
        -moz-transition: all 300ms ease;
        -webkit-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        background-color: #FFFFFF;
        box-shadow: 0px 6px 15px 0px rgba(64, 79, 104, 0.05);
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .header-top-wrap {
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 10px;
        }

        .header-top-right ul {
            flex-direction: column;
            gap: 6px;
        }

        .follow-social {
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .follow-social ul {
            flex-direction: row;
            gap: 10px;
        }
    }

    @media (max-width: 480px) {
        .header-top {
            padding: 10px;
        }

        .header-top-right span {
            font-size: 14px;
        }

        .follow-social span {
            font-size: 14px;
        }
    }
</style>
<header class="main-header flex">
    <!-- Header Lower -->
    <div id="header">
        <div class="header-top ">
            <div class="header-top-wrap flex-two">
               <div class="header-top-right" id="topbar-left">
                    <ul class="flex-three">
                        @foreach($ui['topbar']['desktop']['left'] as $item)
                            @if($item->component_name == 'email')
                                <li class="flex-three">
                                    <i class="fa fa-envelope"></i>
                                    <span style="color:white;font-weight:600;">{{ $item->value }}</span>
                                </li>
                            @endif

                            @if($item->component_name == 'phone')
                                <li class="flex-three">
                                    <i class="fa fa-phone"></i>
                                    <span style="color:white;font-weight:600;">{{ $item->value }}</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>


                </div>
                <div class="header-top-left flex-two" id="topbar-right">
                    <div class="follow-social flex-two">
                        <span>Follow Us :</span>
                           <ul class="flex-two">
                                @foreach($ui['topbar']['desktop']['right'] as $item)
                                    @if($item->component_name == 'social')
                                     <li>
    <a href="{{ $item->value }}" {!! externalLinkTarget($item->value) !!}>
        <i class="{{ $item->icon_class }}"></i>
    </a>
</li>
   @endif
                                @endforeach
                            </ul>


                    </div>
                </div>
            </div>
        </div>
        <div class="header-lower">
            <div class="tf-container full">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-container flex justify-space align-center">
                            <!-- Logo Box -->
                            <div class="mobile-nav-toggler mobie-mt mobile-button">
                                <i class="icon-Vector3"></i>
                            </div>
                          <div class="logo-box" id="header-left">
                                <div class="logo">
                                    <a href="/">
                                      @foreach($ui['header']['desktop']['left'] as $logo)
                                            @if($logo->component_name == 'logo')
                                                <img src="/{{ $logo->value }}" alt="Logo">
                                            @endif
                                        @endforeach
                                    </a>
                                </div>
                            </div>
                            <div class="nav-outer flex align-center">
                                <!-- Main Menu -->
                                <nav class="main-menu show navbar-expand-md">
                                    <div class="navbar-collapse collapse clearfix"
                                        id="navbarSupportedContent">
                                            <ul class="navigation clearfix" id="header-center-ul">

                                                    @foreach($ui['header']['desktop']['center'] as $index => $menu)

                                                        {{-- Render first 3 menu items --}}
                                                        @if($index < 3)
                                                            <li class="dropdown">
                                                           <a href="{{ $menu->value }}" {!! externalLinkTarget($menu->value) !!}>
                                                                {{ $menu->label }}
                                                            </a>
    </li>
                                                        @endif

                                                        {{-- Inject Bike Trips menu after 3rd item --}}
                                                        @if($index == 2)
                                                            <li class="dropdown2">
                                                                <a href="/pages/bike-trips">Bike Trips</a>

                                                                <ul class="dropdown-content">

                                                                    @foreach($places as $place)
                                                                        @if($place->tours->count() > 0)
                                                                            <li class="trip-section">
                                                                                <h3>{{ $place->name }}</h3>

                                                                                <div class="trip-items">
                                                                                    @foreach($place->tours as $tour)
                                                                                        <div class="trip-item">
                                                                                            <a href="/pages/tours/{{ $tour->id }}/{{ Str::slug($tour->name) }}">
                                                                                                {{ $tour->name }}
                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach

                                                                </ul>
                                                            </li>
                                                        @endif

                                                    @endforeach

                                                    {{-- Render remaining menu items (4th onward) --}}
                                                    @foreach($ui['header']['desktop']['center'] as $index => $menu)
                                                        @if($index >= 3)
                                                            <li class="dropdown">
                                                                <a href="{{ $menu->value }}">{{ $menu->label }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach

                                                </ul>

                                    </div>
                                </nav>
                                <!-- Main Menu End-->
                            </div>
                            <div class="search-mobie relative">
                            </div>
                           <div class="register" id="header-right">

                                @foreach($ui['header']['desktop']['right'] as $btn)
                                    @if($btn->component_name == 'book_now')
                                     <a href="{{ $btn->value }}" class="btn-main" {!! externalLinkTarget($btn->value) !!}>

                                            <p class="btn-main-text">{{ $btn->label }}</p>
                                            <p class="iconer"><i class="icon-arrow-right"></i></p>
                                        </a>
                                    @endif
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <img src="/assets/images/page/fl1.png" alt="" class="fly-ab"> -->
    </div>

    <!-- End Header Lower -->
    

    <!-- Mobile Menu  -->
    <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="/">
                    <img src="{{ asset('/assets/images/dreamridelogo.webp') }}" alt=""></a></div>
            <div class="bottom-canvas">
              <div class="menu-outer">

                        @foreach($ui['header']['mobile']['top'] as $item)
                            <li><a href="{{ $item->value }}">{{ $item->label }}</a></li>
                        @endforeach

                        @foreach($ui['header']['mobile']['sidebar'] as $item)
                            <li><a href="{{ $item->value }}">{{ $item->label }}</a></li>
                        @endforeach

                        @foreach($ui['header']['mobile']['bottom'] as $item)
                            <li><a href="{{ $item->value }}">{{ $item->label }}</a></li>
                        @endforeach

                    </div>

            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->

</header>

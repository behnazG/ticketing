<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/rtl/vertical-menu-template/email-application.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2019 16:01:10 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
          content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>{{trans("mb.brand")}}</title>
    <link rel="apple-touch-icon" href="{{asset("app-assets/images/ico/apple-icon-120.png")}}">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/fontawesome/css/all.css')}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/vendors.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/forms/toggle/switchery.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/plugins/forms/switch.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/core/colors/palette-switch.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/forms/selects/select2.min.css")}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/app.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/custom-rtl.min.css")}}">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset("app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/core/colors/palette-gradient.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/fonts/simple-line-icons/style.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/pages/email-application.css")}}">
    <!-- END Page Level CSS-->
@yield('css')
<!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- END Custom CSS-->
</head>
<?php
$tickt_status = \App\Ticket::find_tickets('i', 0, 'all', true);
$status_ticket = [0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
foreach ($tickt_status as $t_s) {
    $status_ticket[$t_s->status] = $t_s->counts;
}
$user_id = auth::user()->id;
$user_authorise = \App\UserAuthorise::getAuthorise();
?>
<body id="mybodyss"
      class="vertical-layout vertical-menu content-left-sidebar email-application  menu-collapsed fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue"
      data-col="content-left-sidebar">
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="collapse navbar-collapse show" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>

                    <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide"
                                                                   data-toggle="dropdown" href="#"><i
                                    class="ficon ft-search"></i></a>
                        <ul class="dropdown-menu">
                            <li class="arrow_box">
                                <form method="post"
                                      action="{{url('/tickets/search')}}">
                                    @csrf
                                    <div class="input-group search-box">
                                        <div class="position-relative has-icon-right full-width">
                                            <input class="form-control" id="ticket_id"
                                                   name="ticket_id" type="text"
                                                   placeholder="{{trans('theme.enter the ticket number')}}">
                                            <div class="form-control-position navbar-search-close"><i class="ft-x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                @php($languages=\App\Language::all())
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link"
                           id="dropdown-flag" href="#"
                           data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false"><i
                                    class="flag-icon {{$languages[auth::user()->lang-1]["icon"]}}"></i><span
                                    class="selected-language"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <div class="arrow_box">
                                @foreach ($languages as $lang)
                                    <a class="dropdown-item"
                                       href="{{url("/changeLanguage/".$lang["id"])}}"><i
                                                class="flag-icon {{$lang["icon"]}}"></i> {{$lang["name"]}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                           data-toggle="dropdown"><i
                                    class="ficon ft-bell bell-shake" id="notification-navbar-link"></i><span
                                    class="badge badge-pill badge-sm badge-asa badge-default badge-up badge-glow"
                                    id="topmenu_number_notify"></span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <div class="arrow_box_right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span
                                                class="grey darken-2">{{trans("mb.notifications")}}</span>
                                    </h6>
                                </li>
                                <div id="top_notify_list">

                                </div>
                                <li class="dropdown-menu-footer">
                                    <button onclick="notifyMe();" class="dropdown-item info text-right pr-1"
                                    >{{trans("mb.readAll")}}</button>
                                </li>
                            </div>
                        </ul>
                    </li>
                    @if(auth::user()->is_staff==1)
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="ficon ft-mail"> </i>
                                <span class="badge badge-pill badge-sm badge-asa badge-default badge-up badge-glow"
                                      id="topmenu_number_email"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <div class="arrow_box_right">
                                    <li class="dropdown-menu-header">
                                        <h6 class="dropdown-header m-0"><span
                                                    class="grey darken-2">{{trans("mb.tickets")}}</span></h6>
                                    </li>
                                    <div id="top_ticket_list">

                                    </div>
                                    <li class="dropdown-menu-footer"><a class="dropdown-item text-right info pr-1"
                                                                        href="{{url("tickets")}}">{{trans("mb.readAll")}}</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    @endif
                    <?php
                    $user_image = (isset(auth::user()->image_path)) ? asset('storage/' . auth::user()->image_path) : asset("app-assets/images/icons/user.jpg");
                    ?>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link"
                           href="#" data-toggle="dropdown">
                            <span
                                    class="avatar avatar-online">

                                <img src="{{$user_image}}"
                                     alt="avatar">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right">
                                <a class="dropdown-item" href="#">
                                    <span
                                            class="avatar avatar-online">
                                        <img
                                                src="{{$user_image}}"
                                                alt="{{auth::user()->name}}">
                                        <span class="user-name text-bold-700 ml-1">{{auth::user()->name}}</span>
                                    </span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url("users/".auth::user()->id."/edit")}}"><i
                                            class="ft-user"></i>{{trans("mb.editProfile")}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ft-power"></i>
                                    {{ __('mb.Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index-2.html"><img class="brand-logo"
                                                                                          alt="Asa admin logo"
                                                                                          src="{{asset("app-assets/images/logo/logo.png")}}"/>
                    <h3 class="brand-text">{{trans("mb.brand")}}</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a href="{{url('/')}}">
                    <i class="ft-home"></i><span class="menu-title" data-i18n="">{{__('mb.dashboard')}}</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="#">
                    <i class="ft-mail"></i><span class="menu-title" data-i18n="">{{trans('mb.tickets')}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item"
                           href="{{url('tickets/inbox')}}">{{trans('mb.myTicket')}}</a>
                    </li>
                    @if(auth::user()->is_staff ==0)
                        <li><a class="menu-item"
                               href="{{url('tickets/compose')}}">{{trans('mb.compose')}}</a>
                        </li>
                    @endif
                </ul>
            </li>
            @if(!empty($user_authorise) && in_array("reports",$user_authorise)|| auth::user()->organizational_chart_id==1)
                <li class=" nav-item">
                    <a href="#">
                        <i class="ft-bar-chart"></i><span class="menu-title"
                                                          data-i18n="">{{trans('mb.reports')}}</span></a>
                    <ul class="menu-content">

                    </ul>
                </li>
            @endif
            @if(!empty($user_authorise) && in_array("admin_users",$user_authorise) || auth::user()->organizational_chart_id==1)
                <li class=" nav-item">
                    <a href="#">
                        <i class="ft-user"></i><span class="menu-title"
                                                     data-i18n="">{{trans('mb.users')}}</span></a>
                    <ul class="menu-content">
                        <li>
                            <a class="menu-item"
                               href="{{url('users/create')}}">{{trans('mb.create',["name"=>trans('mb.user')])}}</a>
                        </li>
                        <li>
                            <a class="menu-item"
                               href="{{url('users/hotels')}}">{{trans('mb.users').' '.trans('mb.hotel')}}</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{url('users/staffs')}}">{{trans('mb.staffs')}}</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(!empty($user_authorise) && in_array("admin_hotels",$user_authorise) || in_array("admin_categories",$user_authorise) || in_array("admin_organizationCharts",$user_authorise) || auth::user()->organizational_chart_id==1)
                <li class=" nav-item">
                    <a href="#">
                        <i class="ft-settings"></i><span class="menu-title"
                                                         data-i18n="">{{trans('mb.settings')}}</span></a>
                    <ul class="menu-content">
                        @if( in_array("admin_categories",$user_authorise)|| auth::user()->organizational_chart_id==1)
                            <li><a class="menu-item"
                                   href="{{url('categories')}}">{{trans('mb.categories')}}</a>
                            </li>
                        @endif
                        @if(in_array("admin_hotels",$user_authorise)|| auth::user()->organizational_chart_id==1)
                            <li><a class="menu-item"
                                   href="{{url('hotels')}}">{{trans('mb.hotels')}}</a>
                            </li>
                        @endif
                        @if(in_array("admin_organizationCharts",$user_authorise)|| auth::user()->organizational_chart_id==1)
                            <li><a class="menu-item"
                                   href="{{url('organizationCharts')}}">{{trans('mb.organizationChart')}}</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    <div class="navigation-background"></div>
</div>

<div class="app-content content">
    <div class="sidebar-left">
        <div class="sidebar">
            <div class="sidebar-content email-app-sidebar d-flex">
                <div class="email-app-menu col-12 card d-none d-lg-block rounded-0">
                    @if(auth::user()->is_staff ==0)
                        <div class="form-group form-group-compose text-center">
                            <a href="{{url("tickets/compose")}}"
                               class="btn btn-asa btn-min-width btn-glow my-1 btn-block">
                                <i class="ft-mail"></i> {{trans("mb.compose")}}
                            </a>
                        </div>
                    @endif
                    <div class="list-group list-group-messages">
                        <a href="{{url('/tickets/inbox')}}"
                           class="list-group-item list-group-item-action border-0">
                            <i class="fa fa-mail-bulk mr-1 ml-1"></i> {{trans("mb.myTicket")}}
                        </a>
                        <?php $status_list = \App\Ticket::STATUS_LIST();?>
                        @foreach($status_list as $index=>$status)
                            <a href="{{url('tickets/inbox/'.$index)}}"
                               class="list-group-item list-group-item-action border-0">
                                <i class="{{$status[2]}} mr-1 ml-1 {{$status[1]}}"></i> {{$status[0]}}
                                <span class="float-right">{{$status_ticket[$index]}}</span>
                            </a>
                        @endforeach
                    </div>
                    <div class="list-group list-group-messages">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-right">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card email-app-details d-none d-lg-block rounded-0">
                    <div class="card-content">

                            <div class="email-app-options card-body">
                                @if(auth::user()->is_staff==1)
                                <form method="post" action="{{url('/tickets/advancedSearch')}}" id="search_all_ticket">
                                    <div class="row">
                                        <div class="col-10 col-lg-8   text-center offset-lg-2">
                                            <fieldset class="form-group position-relative has-icon-left m-0 pb-1">
                                                <div class="input-group">
                                                    @csrf
                                                    <input type="text" class="form-control round" name="subject_ticket"
                                                           id="subject_ticket">
                                                    <input type="hidden" name="topic_search" id="topic_search">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-light dropdown-toggle round"
                                                                type="button"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">{{trans("mb.searchIn")}}
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item search_in_tickets"
                                                               data-topic="1">{{trans('mb.ticketNumber')}}</a>
                                                            <a class="dropdown-item search_in_tickets"
                                                               data-topic="2">{{trans('mb.ticketSubject')}}</a>
                                                            <a class="dropdown-item search_in_tickets"
                                                               data-topic="3">{{trans('mb.sender')}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-3 d-lg-none d-xl-block text-right">
                                            <button type="button" class="btn btn-sm btn-icon btn-pure">
                                                <i class="la la-angle-left font-medium-5"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-icon btn-pure">
                                                <i class="la la-angle-right font-medium-5"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer fixed-bottom footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">Copyright &copy;<a
                    class="text-bold-800 grey darken-2" href=""
                    target="_blank">ASA System Yeganeh. All Rights Reserved</a></span>
    </div>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{asset("app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
<script src="{{asset("app-assets/vendors/js/forms/toggle/switchery.min.js")}}" type="text/javascript"></script>
<script src="{{asset("app-assets/js/scripts/forms/switch.min.js")}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset("app-assets/vendors/js/forms/select/select2.full.min.js")}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN CHAMELEON  JS-->
<script src="{{asset("app-assets/js/core/app-menu.min.js")}}" type="text/javascript"></script>
<script src="{{asset("app-assets/js/core/app.min.js")}}" type="text/javascript"></script>
<script src="{{asset("app-assets/js/scripts/customizer.min.js")}}" type="text/javascript"></script>
<script src="{{asset("app-assets/vendors/js/jquery.sharrre.js")}}" type="text/javascript"></script>
<!-- END CHAMELEON  JS-->
@yield('js')
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset("app-assets/js/scripts/pages/email-application.js")}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/checkbox-radio.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#mybodyss').removeClass("menu-expanded");
            $('#mybodyss').addClass("menu-collapsed");
        }, 1000)
    });
</script>

@include('fragments.js.ajax_blayout')

<script>
    $(document).ready(function () {
        $(".search_in_tickets").on('click', function () {
            var types = $(this).data('topic');
            $("#topic_search").val(types);
            $("#search_all_ticket").submit();
        })
    });
</script>
</body>

<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/rtl/vertical-menu-template/email-application.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2019 16:01:17 GMT -->
</html>
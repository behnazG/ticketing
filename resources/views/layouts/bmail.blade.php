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
    <link rel="shortcut icon" type="image/x-icon"
          href="https://themeselection.com/demo/chameleon-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/fontawesome/css/all.css')}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/vendors.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/forms/toggle/switchery.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/plugins/forms/switch.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/core/colors/palette-switch.min.css")}}">
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
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- END Custom CSS-->
</head>
<body id="mybody" class="vertical-layout vertical-menu content-left-sidebar email-application  menu-collapsed fixed-navbar"
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
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>


                    <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide"
                                                                   data-toggle="dropdown" href="#"><i
                                    class="ficon ft-search"></i></a>
                        <ul class="dropdown-menu">
                            <li class="arrow_box">
                                <form>
                                    <div class="input-group search-box">
                                        <div class="position-relative has-icon-right full-width">
                                            <input class="form-control" id="search" type="text"
                                                   placeholder="{{trans('theme.Search here...')}}">
                                            <div class="form-control-position navbar-search-close"><i class="ft-x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                                                       id="dropdown-flag" href="#"
                                                                       data-toggle="dropdown" aria-haspopup="true"
                                                                       aria-expanded="false"><i
                                    class="flag-icon flag-icon-ir"></i><span class="selected-language"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <div class="arrow_box"><a class="dropdown-item"
                                                      href="#"><i
                                            class="flag-icon flag-icon-ir"></i> Fa</a>
                                <a class="dropdown-item" href="#"><i
                                            class="flag-icon flag-icon-us"></i> En</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                           data-toggle="dropdown"><i
                                    class="ficon ft-bell bell-shake" id="notification-navbar-link"></i><span
                                    class="badge badge-pill badge-sm badge-danger badge-default badge-up badge-glow">5</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <div class="arrow_box_right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span>
                                    </h6>
                                </li>
                                <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                        class="ft-share info font-medium-4 mt-2"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading info">New Order Received</h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">Lorem
                                                    ipsum dolor sit amet!</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="2015-06-11T18:29:20+08:00">3:30 PM
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                        class="ft-save font-medium-4 mt-2 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading warning">New User Registered</h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    Aliquam tincidunt mauris eu risus.</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="2015-06-11T18:29:20+08:00">10:05 AM
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                        class="ft-repeat font-medium-4 mt-2 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading danger">New Purchase</h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">Lorem
                                                    ipsum dolor sit ametest?</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="2015-06-11T18:29:20+08:00">Yesterday
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                        class="ft-shopping-cart font-medium-4 mt-2 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading primary">New Item In Your Cart</h6>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="2015-06-11T18:29:20+08:00">Last week
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i
                                                        class="ft-heart font-medium-4 mt-2 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading info">New Sale</h6>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="2015-06-11T18:29:20+08:00">Last month
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item info text-right pr-1"
                                                                    href="javascript:void(0)">Read all</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                           data-toggle="dropdown"><i
                                    class="ficon ft-mail"> </i></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <div class="arrow_box_right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6>
                                </li>
                                <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm rounded-circle"><img
                                                            src="../../../app-assets/images/portrait/small/avatar-s-6.png"
                                                            alt="avatar"></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">Sarah Montery<i
                                                            class="ft-circle font-small-2 success float-right"></i></h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    Everything looks good. I will provide...</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="2015-06-11T18:29:20+08:00">3:55 PM
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm rounded-circle"><span
                                                            class="media-object rounded-circle text-circle bg-warning">E</span></span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">Eliza Elliot<i
                                                            class="ft-circle font-small-2 danger float-right"></i></h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">Okay.
                                                    here is some more details...</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="2015-06-11T18:29:20+08:00">2:10 AM
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm rounded-circle"><img
                                                            src="../../../app-assets/images/portrait/small/avatar-s-3.png"
                                                            alt="avatar"></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">Kelly Reyes<i
                                                            class="ft-circle font-small-2 warning float-right"></i></h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">Check
                                                    once and let me know if you...</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="2015-06-11T18:29:20+08:00">Yesterday
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm rounded-circle"><img
                                                            src="../../../app-assets/images/portrait/small/avatar-s-19.png"
                                                            alt="avatar"></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">Tonny Deep<i
                                                            class="ft-circle font-small-2 danger float-right"></i></h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">We
                                                    will start new project development...</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                          datetime="2015-06-11T18:29:20+08:00">Friday
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-right info pr-1"
                                                                    href="javascript:void(0)">Read all</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown"> <span
                                    class="avatar avatar-online"><img
                                        src="../../../app-assets/images/portrait/small/avatar-s-19.png"
                                        alt="avatar"></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right"><a class="dropdown-item" href="#"><span
                                            class="avatar avatar-online"><img
                                                src="../../../app-assets/images/portrait/small/avatar-s-19.png"
                                                alt="avatar"><span class="user-name text-bold-700 ml-1">John Doe</span></span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit
                                    Profile</a><a class="dropdown-item" href="email-application.html"><i
                                            class="ft-mail"></i> My Inbox</a><a class="dropdown-item"
                                                                                href="project-summary.html"><i
                                            class="ft-check-square"></i> Task</a><a class="dropdown-item"
                                                                                    href="chat-application.html"><i
                                            class="ft-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.html"><i class="ft-power"></i> Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->


<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
     data-img="../../../app-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index-2.html"><img class="brand-logo"
                                                                                          alt="Asa admin logo"
                                                                                          src="../../../app-assets/images/logo/logo.png"/>
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
                           href="{{url('tickets/inbox')}}">{{trans('mb.inbox')}}</a>
                    </li>
                    <li><a class="menu-item"
                           href="{{url('tickets/sent')}}">{{trans('mb.sent')}}</a>
                    </li>
                    <li><a class="menu-item"
                           href="{{url('tickets/compose')}}">{{trans('mb.compose')}}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#">
                    <i class="ft-bar-chart"></i><span class="menu-title"
                                                      data-i18n="">{{trans('mb.reports')}}</span></a>
                <ul class="menu-content">

                </ul>
            </li>
            <li class=" nav-item">
                <a href="#">
                    <i class="ft-settings"></i><span class="menu-title"
                                                     data-i18n="">{{trans('mb.settings')}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item"
                           href="{{url('users')}}">{{trans('mb.users')}}</a>
                    </li>
                    <li><a class="menu-item"
                           href="{{url('categories')}}">{{trans('mb.categories')}}</a>
                    </li>
                    <li><a class="menu-item"
                           href="{{url('hotels')}}">{{trans('mb.hotels')}}</a>
                    </li>
                    <li><a class="menu-item"
                           href="{{url('organizationCharts')}}">{{trans('mb.organizationChart')}}</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="navigation-background"></div>
</div>

<div class="app-content content">
    <div class="sidebar-left">
        <div class="sidebar">
            <div class="sidebar-content email-app-sidebar d-flex">
                <div class="email-app-menu col-12 card d-none d-lg-block rounded-0">
                    <div class="form-group form-group-compose text-center">
                        <button type="button" class="btn btn-danger btn-min-width btn-glow my-1 btn-block">
                            <i class="ft-mail"></i> {{trans("mb.compose")}}
                        </button>
                    </div>
                    <div class="list-group list-group-messages">
                        <a href="#"
                           class="list-group-item list-group-item-action border-0 active"> {{trans("mb.inbox")}}
                            <span class="primary float-right">8</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0">{{trans("mb.sent")}}</a>
                        <a href="#" class="list-group-item list-group-item-action border-0">{{trans("mb.trash")}}</a>
                    </div>
                    <div class="list-group list-group-messages">
                        <a href="#" class="list-group-item list-group-item-action border-0">
                            <i class="ft-circle mr-1 danger"></i> {{trans("mb.undone")}}
                            <span class="primary float-right">8</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0">
                            <i class="ft-circle mr-1 warning"></i> {{trans("mb.inProgress")}}
                            <span class="primary float-right">8</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0">
                            <i class="ft-circle mr-1 success"></i> {{trans("mb.done")}}
                            <span class="primary float-right">8</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0">
                            <i class="ft-circle mr-1 primary"></i> {{trans("mb.closed")}}
                            <span class="primary float-right">8</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0">
                            <i class="ft-circle mr-1 info"></i> {{trans("mb.resend")}}
                            <span class="primary float-right">8</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0">
                            <i class="ft-circle mr-1 teal"></i> {{trans("mb.training")}}
                            <span class="primary float-right">8</span>
                        </a>

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
                            <div class="row">
                                <div class="col-10 col-lg-8   text-center offset-lg-2">
                                    <fieldset class="form-group position-relative has-icon-left m-0 pb-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-light dropdown-toggle round" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">{{trans("mb.searchIn")}}
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">{{trans('mb.ticketNumber')}}</a>
                                                    <a class="dropdown-item" href="#">{{trans('mb.ticketSubject')}}</a>
                                                    <a class="dropdown-item" href="#">{{trans('mb.ticketUser')}}</a>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control round"
                                                   aria-label="Amount (to the nearest dollar)">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-light round" type="button"> <i class="ft-search"></i> {{trans('mb.search')}}</button>
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
                class="float-md-left d-block d-md-inline-block">2018  &copy; Copyright <a
                    class="text-bold-800 grey darken-2" href="https://themeselection.com/"
                    target="_blank">ThemeSelection</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More
                    themes</a></li>
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank">
                    Support</a></li>

        </ul>
    </div>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{asset("app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
<script src="{{asset("app-assets/vendors/js/forms/toggle/switchery.min.js")}}" type="text/javascript"></script>
<script src="{{asset("app-assets/js/scripts/forms/switch.min.js")}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
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
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script>
    $(document).ready(function () {
        // $('#mybody').removeClass("menu-expanded");
        // $('#mybody').addClass("menu-collapsed");
    });
</script>
</body>

<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/rtl/vertical-menu-template/email-application.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2019 16:01:17 GMT -->
</html>
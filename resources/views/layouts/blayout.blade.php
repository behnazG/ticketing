<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/rtl/vertical-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2019 15:59:40 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
          content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>{{__("mb.brand")}}</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon"
          href="https://themeselection.com/demo/chameleon-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/fontawesome/css/all.css')}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/forms/switch.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css-rtl/core/colors/palette-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/forms/selects/select2.min.css")}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/app.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.min.css')}}">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.min.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- END Custom CSS-->
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

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
                    <i class="ft-user"></i><span class="menu-title"
                                                 data-i18n="">{{trans('mb.users')}}</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item"
                           href="{{url('users/create')}}">{{trans('mb.create',["name"=>trans('mb.user')])}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{url('users/hotels')}}">{{trans('mb.users').' '.trans('mb.hotel')}}</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{url('users/staffs')}}">{{trans('mb.staffs')}}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#">
                    <i class="ft-settings"></i><span class="menu-title"
                                                     data-i18n="">{{trans('mb.settings')}}</span></a>
                <ul class="menu-content">
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
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-left">
                    <div class="breadcrumb-wrapper mr-1">
                        @isset($breadcrumbs)
                            <ol class="breadcrumb">
                                @foreach($breadcrumbs as $breadcrumb)
                                    <li class="breadcrumb-item"><a
                                                href="{{url($breadcrumb["url"])}}">{{$breadcrumb["name"]}}</a>
                                    </li>
                                @endforeach
                            </ol>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">@yield('pageName')</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
        @yield('content')
        <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close"
                                                                                         href="#"><i
                class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-primary box-shadow-3" href="#"
                                                      id="customizer-toggle-setting"><i
                class="ft-settings font-medium-3 spinner white"></i></a>
    <div class="customizer-content p-2">
        <h5 class="mt-1 mb-1 text-bold-500">Navbar Color Options</h5>
        <div class="navbar-color-options clearfix">
            <div class="gradient-colors mb-1 clearfix">
                <div class="bg-gradient-x-purple-blue navbar-color-option" data-bg="bg-gradient-x-purple-blue"
                     title="bg-gradient-x-purple-blue"></div>
                <div class="bg-gradient-x-purple-red navbar-color-option" data-bg="bg-gradient-x-purple-red"
                     title="bg-gradient-x-purple-red"></div>
                <div class="bg-gradient-x-blue-green navbar-color-option" data-bg="bg-gradient-x-blue-green"
                     title="bg-gradient-x-blue-green"></div>
                <div class="bg-gradient-x-orange-yellow navbar-color-option" data-bg="bg-gradient-x-orange-yellow"
                     title="bg-gradient-x-orange-yellow"></div>
                <div class="bg-gradient-x-blue-cyan navbar-color-option" data-bg="bg-gradient-x-blue-cyan"
                     title="bg-gradient-x-blue-cyan"></div>
                <div class="bg-gradient-x-red-pink navbar-color-option" data-bg="bg-gradient-x-red-pink"
                     title="bg-gradient-x-red-pink"></div>
            </div>
            <div class="solid-colors clearfix">
                <div class="bg-primary navbar-color-option" data-bg="bg-primary" title="primary"></div>
                <div class="bg-success navbar-color-option" data-bg="bg-success" title="success"></div>
                <div class="bg-info navbar-color-option" data-bg="bg-info" title="info"></div>
                <div class="bg-warning navbar-color-option" data-bg="bg-warning" title="warning"></div>
                <div class="bg-danger navbar-color-option" data-bg="bg-danger" title="danger"></div>
                <div class="bg-blue navbar-color-option" data-bg="bg-blue" title="blue"></div>
            </div>
        </div>

        <hr>

        <h5 class="my-1 text-bold-500">Layout Options</h5>
        <div class="row">
            <div class="col-12">
                <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="fixed-layout">
                    <label class="custom-control-label" for="fixed-layout">Fixed</label>
                </div>
                <div class="d-inline-block custom-control custom-radio mb-1 col-4">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="static-layout">
                    <label class="custom-control-label" for="static-layout">Static</label>
                </div>
                <div class="d-inline-block custom-control custom-radio mb-1">
                    <input type="radio" class="custom-control-input bg-primary" name="layouts" id="boxed-layout">
                    <label class="custom-control-label" for="boxed-layout">Boxed</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-inline-block custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input bg-primary" name="right-side-icons"
                           id="right-side-icons">
                    <label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
                </div>
            </div>
        </div>

        <hr>

        <h5 class="mt-1 mb-1 text-bold-500">Sidebar menu Background</h5>
        <!-- <div class="sidebar-color-options clearfix">
            <div class="bg-black sidebar-color-option" data-sidebar="menu-dark" title="black"></div>
            <div class="bg-white sidebar-color-option" data-sidebar="menu-light" title="white"></div>
        </div> -->
        <div class="row sidebar-color-options ml-1">
            <label for="sidebar-color-option" class="card-title font-medium-2 mr-2">White Mode</label>
            <div class="text-center mb-1">
                <input type="checkbox" id="sidebar-color-option" class="switchery" data-size="xs"/>
            </div>
            <label for="sidebar-color-option" class="card-title font-medium-2 ml-2">Dark Mode</label>
        </div>

        <hr>

        <label for="collapsed-sidebar" class="font-medium-2">Menu Collapse</label>
        <div class="float-right">
            <input type="checkbox" id="collapsed-sidebar" class="switchery" data-size="xs"/>
        </div>

        <hr>

        <!--Sidebar Background Image Starts-->
        <h5 class="mt-1 mb-1 text-bold-500">Sidebar Background Image</h5>
        <div class="cz-bg-image row">
            <div class="col mb-3">
                <img src="../../../app-assets/images/backgrounds/04.jpg" class="rounded sidiebar-bg-img" width="50"
                     height="100" alt="background image">
            </div>
            <div class="col mb-3">
                <img src="../../../app-assets/images/backgrounds/01.jpg" class="rounded sidiebar-bg-img" width="50"
                     height="100" alt="background image">
            </div>
            <div class="col mb-3">
                <img src="../../../app-assets/images/backgrounds/02.jpg" class="rounded sidiebar-bg-img" width="50"
                     height="100" alt="background image">
            </div>
            <div class="col mb-3">
                <img src="../../../app-assets/images/backgrounds/05.jpg" class="rounded sidiebar-bg-img" width="50"
                     height="100" alt="background image">
            </div>
        </div>
        <!--Sidebar Background Image Ends-->

        <!--Sidebar BG Image Toggle Starts-->
        <div class="sidebar-image-visibility">
            <div class="row ml-1">
                <label for="toggle-sidebar-bg-img" class="card-title font-medium-2 mr-2">Hide Image</label>
                <div class="text-center mb-1">
                    <input type="checkbox" id="toggle-sidebar-bg-img" class="switchery" data-size="xs" checked/>
                </div>
                <label for="toggle-sidebar-bg-img" class="card-title font-medium-2 ml-2">Show Image</label>
            </div>
        </div>
        <!--Sidebar BG Image Toggle Ends-->

        <hr>

        <div class="row mb-2">

            <div class="col">
                <a href="https://themeselection.com/" class="btn btn-primary btn-block box-shadow-1" target="_blank">More
                    Themes</a>
            </div>
        </div>
        <div class="text-center">
            <button id="twitter" class="btn btn-social-icon btn-twitter sharrre mr-1"><i class="la la-twitter"></i>
            </button>
            <button id="facebook" class="btn btn-social-icon btn-facebook sharrre mr-1"><i class="la la-facebook"></i>
            </button>
            <button id="google" class="btn btn-social-icon btn-google sharrre"><i class="la la-google"></i></button>
        </div>
    </div>
</div>

<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">2018  &copy; Copyright <a
                    class="text-bold-800 grey darken-2" href="https://themeselection.com/" target="_blank">ThemeSelection</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More
                    themes</a></li>
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank">
                    Support</a></li>

        </ul>
    </div>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/switch.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
@yield('page_js')
<script src="{{asset("app-assets/vendors/js/forms/select/select2.full.min.js")}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN CHAMELEON  JS-->
<script src="{{asset('app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/jquery.sharrre.js')}}" type="text/javascript"></script>
<!-- END CHAMELEON  JS-->
<!-- BEGIN PAGE LEVEL JS-->
@yield('js')
<script src="{{asset('app-assets/js/scripts/forms/checkbox-radio.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>


<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/rtl/vertical-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2019 16:01:05 GMT -->
</html>
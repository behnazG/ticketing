@extends("layouts.blayout")
@section('content')
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div id="recent-projects" class="media-list position-relative">
                                <div class="table-responsive">
                                    <table class="table table-padded table-xl mb-0" id="recent-project-table">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">Project Name</th>
                                            <th class="border-top-0">Assigned to</th>
                                            <th class="border-top-0">Deadline</th>
                                            <th class="border-top-0">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-truncate align-middle">
                                                <a href="#">X Admin</a>
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled users-list m-0">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-19.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="Katherine Nichols"
                                                        class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-18.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="Joseph Weaver"
                                                        class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-17.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge badge-info">+2 more</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate pb-0">
                                                <span>15th July, 2018</span>
                                                <p class="font-small-2 text-muted"> 1 day left</p>
                                            </td>
                                            <td>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                                         style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate align-middle">
                                                <a href="#">Analytics UI</a>
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled users-list m-0">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-17.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="Katherine Nichols"
                                                        class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-14.png"
                                                             alt="Avatar">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate pb-0">
                                                <span>26th May, 2018</span>
                                                <p class="font-small-2 text-muted danger"> behind</p>
                                            </td>
                                            <td>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                                         style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate align-middle">
                                                <a href="#">Traveltrip</a>
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled users-list m-0">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-19.png"
                                                             alt="Avatar">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate pb-0">
                                                <span>23rd May, 2018</span>
                                                <p class="font-small-2 text-muted"> in 11 Days</p>
                                            </td>
                                            <td>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                                         style="width: 55%" aria-valuenow="55" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate align-middle">
                                                <a href="#">Apex Angular</a>
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled users-list m-0">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-19.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="Katherine Nichols"
                                                        class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-18.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="Joseph Weaver"
                                                        class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-17.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge badge-info">+1 more</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate pb-0">
                                                <span>13th May, 2018</span>
                                                <p class="font-small-2 text-muted"> 1 month</p>
                                            </td>
                                            <td>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                                         style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate align-middle">
                                                <a href="#">Chameleon Admin</a>
                                            </td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled users-list m-0">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-11.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="Katherine Nichols"
                                                        class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-12.png"
                                                             alt="Avatar">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate pb-0">
                                                <span>18th July, 2018</span>
                                                <p class="font-small-2 text-muted danger"> behind</p>
                                            </td>
                                            <td>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                                         style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card pull-up">
                                <div class="card-header">
                                    <h4 class="card-title float-left">Project X</h4><a
                                            class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                    <span class="badge badge-pill badge-info float-right m-0">In Progress</span>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body pt-0 pb-1">
                                        <h6 class="text-muted font-small-3"> Completed Task : 4/10</h6>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                                 style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <h6 class="text-bold-600 mt-2"> Client: <span
                                                            class="info">Xeon Inc.</span></h6>
                                                <h6 class="text-bold-600 mt-1"> Deadline: <span class="blue-grey">5th June, 2018</span>
                                                </h6>
                                            </div>
                                            <div class="media-body text-right mt-2">
                                                <ul class="list-unstyled users-list">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-19.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="Katherine Nichols"
                                                        class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-18.png"
                                                             alt="Avatar">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-original-title="Joseph Weaver"
                                                        class="avatar avatar-sm pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="../../../app-assets/images/portrait/small/avatar-s-17.png"
                                                             alt="Avatar">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card pull-up bg-gradient-directional-danger">
                                <div class="card-header bg-hexagons-danger">
                                    <h4 class="card-title white">Analytics</h4>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a class="btn btn-sm btn-white danger box-shadow-1 round btn-min-width pull-right"
                                                   href="#" target="_blank">Report <i class="ft-bar-chart pl-1"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show bg-hexagons-danger">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center width-100">
                                                <div id="Analytics-donut-chart" class="height-100 donutShadow"></div>
                                            </div>
                                            <div class="media-body text-right mt-1">
                                                <h3 class="font-large-2 white">12,515</h3>
                                                <h6 class="mt-1"><span class="text-muted white">Analytics in the <a
                                                                href="#" class="darken-2 white">last year.</a></span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Revenue, Hit Rate & Deals -->
            <!-- Emails Products & Avg Deals -->
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header p-1">
                            <h4 class="card-title float-left">Project X - <span
                                        class="blue-grey lighten-2 font-small-3 mb-0">24 DEC 2017 - 09 APR 2019</span>
                            </h4>
                            <span class="badge badge-pill badge-info float-right m-0">Approved</span>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-footer text-center p-1">
                                <div class="row">
                                    <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Tasks</p>
                                        <p class="font-medium-5 text-bold-400">26</p>
                                    </div>
                                    <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Completed</p>
                                        <p class="font-medium-5 text-bold-400">58%</p>
                                    </div>
                                    <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Pending</p>
                                        <p class="font-medium-5 text-bold-400">42%</p>
                                    </div>
                                    <div class="col-md-3 col-12 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Version</p>
                                        <p class="font-medium-5 text-bold-400">4.5</p>
                                    </div>
                                </div>
                                <hr>
                                <span class="text-muted"><a href="#"
                                                            class="danger darken-2">Project X</a> Statistics</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                        <div class="card-header">
                            <h4 class="card-title">New Clients <span
                                        class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body p-1">
                                <h4 class="font-large-1 text-bold-400">18.5% <i class="ft-users float-right"></i></h4>
                            </div>
                            <div class="card-footer p-1">
                                <span class="text-muted"><i
                                            class="la la-arrow-circle-o-up info"></i> 23.67% increase</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
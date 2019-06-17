@extends("layouts.blayout")
@section('content')
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card pull-up bg-gradient-directional-danger">
                                <div class="card-header bg-hexagons-danger">
                                    <h4 class="card-title white">{{trans('mb.tickets')}}</h4>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a class="btn btn-sm btn-white danger box-shadow-1 round btn-min-width pull-right"
                                                   href="#" target="_blank">{{trans("mb.compose")}}<i class="ft-mail pl-1"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show bg-hexagons-danger">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left mt-1">
                                                <h3 class="text-right font-large-2 white">12,515</h3>
                                                <h6 class="mt-1"><span class="text-muted white">{{__("mb.tickets").' '.__("mb.in")}} <a
                                                                href="#" class="darken-2 white">{{__("mb.lastWeek")}}....</a></span>
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

            <div class="row">
                <div class="col-12">
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
            </div>

        </div>
    </div>
@endsection
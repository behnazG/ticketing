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
                                                   href="{{url("tickets/compose")}}">{{trans("mb.compose")}}<i class="ft-mail pl-1"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show bg-hexagons-danger">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left mt-1">
                                                <h3 class="text-right font-large-2 white">{{$count_ticket}}</h3>
                                                {{--<h6 class="mt-1"><span class="text-muted white">{{__("mb.tickets").' '.__("mb.in")}} <a--}}
                                                                {{--href="#" class="darken-2 white">{{__("mb.lastWeek")}}....</a></span>--}}
                                                {{--</h6>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends("layouts.blayout")
@section('content')
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-1">{{trans("mb.newTicket")}}</span>
                                        <h1 class="success mb-0">{{$count_ticket}}</h1>
                                    </div>
                                    <div class="align-self-top">
                                        <i class="ft-tag icon-opacity success font-large-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header p-1">
                    <h4 class="card-title float-left">{{trans("mb.myTicket")}}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-footer text-center p-1">
                        <div class="row">
                            @foreach($ticket_status as $index=>$status)
                                <div class="col-md-2 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                    <a href="{{url('tickets/inbox/'.$index)}}">
                                        <p class="blue-grey lighten-2 mb-0">
                                            <i class="{{$status[2]}}   {{$status[1]}} font-large-1"></i>
                                            <span
                                                    class="d-block mb-1 mt-1">{{$status[0]}}</span>
                                        </p>
                                    </a>
                                    <p class="font-medium-5 text-bold-400">{{$ticket_status_user[$index]}}</p>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <span class="text-muted"><a class="success " href="{{url('tickets/inbox/')}}"><i
                                        class="ft-tag icon-opacity"></i><u>{{trans("mb.allTickets")}}</u></a></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header p-1">
                    <h4 class="card-title float-left">{{trans("mb.lastUpdate")}}</h4>
                </div>
                <div class="card-content collapse show">
                    <div id="accordion">
                        @foreach($last_updates as $i=>$last_update)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapse{{$i}}"
                                                aria-expanded="true" aria-controls="collapse{{$i}}">
                                         {{$last_update->subject}}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                       {{$last_update->description}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
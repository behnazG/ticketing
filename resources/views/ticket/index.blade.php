@extends('layouts.bmail')
@section('content')
    <div class="card" style="">
        <div class="card-content">
            <div id="recent-projects" class="media-list position-relative">
                <div class="table-responsive">
                    <table class="table table-padded table-xl mb-0" id="recent-project-table">
                        <thead>
                        <tr>
                            <th class="border-top-0"></th>
                            <th class="border-top-0"></th>
                            <th class="border-top-0"></th>
                            @if($user->is_staff!=1)
                                <th class="border-top-0">{{trans("mb.hotel")}}</th>
                            @endif
                            <th class="border-top-0"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $i=>$ticket)
                            <tr>
                                <td class="border-top-0 {{$ticket_status[$ticket->status][1]}}"><i class="{{$ticket_status[$ticket->status][2]}}"></i> {{$ticket_status[$ticket->status][0]}}</td>
                                <td class="border-top-0">{{($ticket->front_user==false)?trans("mb.unknown"):$ticket->front_user->name}}</td>
                                <td class="border-top-0"><a href="{{url("/tickets/".$ticket->generate_ticket_id())}}">{{$ticket->subject}}</a></td>
                                @if($user->is_staff!=1)
                                    <td class="border-top-0">{{trans("mb.hotel")}}</td>
                                @endif
                                <td class="border-top-0">{{date_sh($ticket->created_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
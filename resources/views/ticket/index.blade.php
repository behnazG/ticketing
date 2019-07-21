@extends('layouts.bmail')
@section('content')
    @include("fragments.alert")
    <div class="card" style="">
        <div class="card-content">
            <div id="recent-projects" class="media-list position-relative">
                <div class="table-responsive">
                    <table class="table table-padded table-xl mb-0" id="recent-project-table">
                        <thead>
                        <tr class="text-center">
                            <th class="border-top-0">{{trans("mb.ticketNumber")}}</th>
                            <th class="border-top-0">{{trans("mb.category")}}</th>
                            <th class="border-top-0">{{trans("mb.from")}}</th>
                            <th class="border-top-0">{{trans("mb.subject")}}</th>
                            <th class="border-top-0">{{trans('mb.time')}}</th>
                            <th class="border-top-0">{{trans('mb.expireDateTicket')}}</th>
                            <th class="border-top-0">{{trans("mb.status")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $i=>$ticket)
                            <tr class="text-center">
                                <th class="border-top-0"><a
                                            href="{{url("/tickets/".$ticket->generate_ticket_id())}}">{{$ticket->id}}</a>
                                </th>
                                <td>{{$ticket->category->name}}</td>
                                <td class="border-top-0">
                                    {{($ticket->sender==false)?trans("mb.unknown"):$ticket->sender->name}}<br/>
                                    {{trans('mb.hotel').' '}}
                                    {{is_null($ticket->hotel)?trans('mb.unknown'):$ticket->hotel->name}}
                                </td>
                                <td class="border-top-0"><a
                                            href="{{url("/tickets/".$ticket->generate_ticket_id())}}">{{$ticket->subject}}</a>
                                </td>
                                <td class="border-top-0">{{date_sh($ticket->created_at)}}
                                    <br/>{{date_shamsi($ticket->created_at)}}</td>
                                <td class="border-top-0">{{date_sh($ticket->expire_date)}}
                                    <br/>{{date_shamsi($ticket->expire_date,"Y-m-d")}}</td>
                                <td class="border-top-0 {{$ticket_status[$ticket->status][1]}}"><i
                                            class="{{$ticket_status[$ticket->status][2]}}"></i> {{$ticket_status[$ticket->status][0]}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
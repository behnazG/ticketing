<div class="col-10 offset-1">
    <div class="card-content collpase show">
        <div class="card-body">
            <div class="card-text">
                <table class="table table-striped bg-dark mb-0 white">
                    <thead>
                    <tr>
                        <th>{{trans("mb.type")}}</th>
                        <th>{{trans("mb.user")}}</th>
                        <th>{{trans("mb.more")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$ticket_time_log->isEmpty())
                        @foreach($ticket_time_log as $t_l)
                            <tr>
                                <td>{{$t_l->type_name}}</td>
                                <td>{{$t_l->user_full_name}}</td>
                                <td>
                                    @if($t_l->type == 1)
                                        <p>

                                            {{ trans("mb.sentTo")." ".$t_l->receiver_full_name}}
                                        </p>
                                        <p>
                                            <?=$t_l->comment?>
                                        </p>
                                        <p>
                                            {{trans("mb.status").": ".$status_list[$t_l->ticket_status][0]}}
                                        </p>
                                    @elseif($t_l->type==2)
                                        <p>
                                            {{trans("mb.startWork").": "}}
                                            @if(!is_null($t_l->start_time_system))
                                                {{date_shamsi($t_l->start_time_system)}}
                                            @endif
                                        </p>
                                        <p>
                                            {{trans("mb.endWork").": "}}
                                            @if(!is_null($t_l->end_time_system))
                                                {{date_shamsi($t_l->end_time_system)}}
                                            @endif
                                        </p>
                                    @elseif($t_l->type==4)
                                        <p>
                                            {{trans("mb.userTime").": "}}
                                            @if(!is_null($t_l->time_user))
                                                {{$t_l->time_user}}
                                            @endif
                                        </p>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-content collpase show">
    <div class="card-body">
        <div class="card-text">
            @include('fragments.error')
        </div>
        <form class="form form-horizontal" action="{{url("/tickets/changeStatus/$ticket->id")}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @isset($ticket->id)
                {{method_field('PUT')}}
            @endisset
            <div class="col-8 m-auto text-center">
                <p class="{{$status_list[$current_ticket->status][1]}}">{{trans("mb.currentStatus")}}: {{$status_list[$current_ticket->status][0]}}
                </p>
            </div>
            <div class="col-8 m-auto">
                <div class="row form-group skin skin-line">
                    @foreach($status_list as $index=>$value)
                        @if(($current_user->is_staff == 1 && in_array($index,[1,2]))
                        ||($current_user->is_staff == 0 && in_array($index,[3,4,5])))
                            <div class="{{$current_user->is_staff == 1?"col-6":"col-4"}} p-1">
                                <fieldset>
                                    <input type="radio" id="status" name="status"
                                           value="{{$index}}" {{(old('status')==$index) || (!old("status") && $ticket->status==$index) ?'checked':''}}>
                                    <label for="status">{{$value[0]}}</label>
                                </fieldset>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @if($current_user->is_staff==1)
                <div class="col-8 m-auto">
                    <div id="show_time">
                        <div class="row form-group">
                            <label class="col-4 label-control">{{trans("mb.workTime").' '.trans("mb.user")}}</label>
                            <input name="minut" id="minut" type="number" class="form-control col-md-2"
                                   placeholder="{{trans("mb.minut")}}"
                                   value="{{isset($ticket_time_log->time_user)?explode(':',$ticket_time_log->time_user)[1]:""}}">
                            <h1>:</h1>
                            <input name="hour" id="hour" type="number" class="form-control col-md-2"
                                   placeholder="{{trans("mb.hour")}}"
                                   value="{{isset($ticket_time_log->time_user)?explode(':',$ticket_time_log->time_user)[0]:""}}">
                        </div>
                    </div>
                </div>
            @endif
            @include('fragments.submitPart',['submitText'=>trans("mb.changeStatus"),'giveUpUrl'=>'/tickets'])
        </form>
    </div>
</div>
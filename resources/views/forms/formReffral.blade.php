<div class="col-10 offset-1">
    <div class="card-content collpase show">
        <div class="card-body">
            <div class="card-text">
                @include('fragments.error')
            </div>
            <form class="form form-horizontal" action="{{url("/tickets/reffral/$ticket->id")}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @isset($ticket->id)
                    {{method_field('PUT')}}
                @endisset
                <input type="hidden" name="user_id" id="user_id" value="{{auth::user()->id}}">
                <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket->ticket_id}}">
                <div class="form-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                                    <textarea name="comment" id="comment" class="form-control">
                                       {{old('comment')}}
                                    </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 label-control">{{trans("mb.user")}}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="receiver_id" id="receiver_id">
                                <option></option>
                                @foreach($authorise_user_reffral  as $user)
                                    @if($current_user->id != $user->id)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 label-control">{{trans("mb.expireDateTicket")}}</label>
                        <input name="expire_date_hour" id="expire_date_hour" type="number" class="form-control col-2 ml-1"
                               placeholder="{{trans("mb.hour")}}" min="0"
                               value="{{$ticket->expire_date_hour ?? old("expire_date_hour")}}">
                        <span class="m-1">ساعت</span>
                        <input name="expire_date_day" id="expire_date_day" type="number" class="form-control col-2"
                               placeholder="{{trans("mb.day")}}" min="0"
                               value="{{$ticket->expire_date_day ?? old("expire_date_day")}}">
                        <span class="m-1">روز</span>

                        <p class="col-3 label-control m-1">{{date_shamsi($ticket->expire_date)}}</p>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 label-control">{{trans("mb.timeTable")}}</label>
                        <input name="duration_hour" id="duration_hour" type="number" class="form-control col-2 ml-1"
                               placeholder="{{trans("mb.hour")}}" min="0"
                               value="{{$ticket->duration_hour ?? old("duration_hour")}}">
                        <span class="m-1">ساعت</span>
                        <input name="duration_day" id="duration_day" type="number" class="form-control col-2"
                               placeholder="{{trans("mb.day")}}" min="0"
                               value="{{$ticket->duration_day ?? old("duration_day")}}">
                        <span class="m-1">روز</span>

                        <p class="col-3 label-control m-1">{{date_shamsi($ticket->duration)}}</p>
                    </div>

                </div>
                @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'])
            </form>
        </div>
    </div>
</div>
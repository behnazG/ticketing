<div class="card-content collpase show">
    <div class="card-body">
        <div class="card-text">
            @include('fragments.error')
        </div>
        <form class="form form-horizontal" action="{{url("/tickets/setTimes/$ticket->id")}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @isset($ticket->id)
                {{method_field('PUT')}}
            @endisset
            <div class="col-8 m-auto text-center">
            </div>
            <div class="col-8 m-auto">
                <div id="show_time">
                    <div class="row form-group">
                        <label class="col-2 label-control" for="expire_date_fa">{{trans('mb.expireDateTicket')}}</label>
                        <div class="col-6">
                            <input type="text" id="expire_date_fa" class="form-control"
                                   placeholder="{{trans('mb.expireDate')}}"
                                   name="expire_date_fa"
                                   value="{{$ticket->expire_date_fa??old('expire_date_fa')}}">
                            <input type="hidden" name="expire_date" id="expire_date"
                                   value="{{$ticket->expire_date ?? old("expire_date")}}">
                        </div>

                        <p class="col-3 label-control m-1">{{(is_null($ticket->expire_date))?trans("mb.unknown"):date_shamsi($ticket->expire_date,"Y-m-d")}}</p>
                    </div>
                </div>
            </div>
            <div class="col-8 m-auto">
                <div id="show_time">
                    <div class="row form-group">
                        <label class="col-2 label-control">{{trans("mb.timeTable")}}</label>
                        <input name="duration_hour" id="duration_hour" type="number" class="form-control col-2 ml-1"
                               placeholder="{{trans("mb.hour")}}" min="0"
                               value="{{$ticket->duration_hour ?? old("duration_hour")}}">
                        <span class="m-1">ساعت</span>
                        <input name="duration_day" id="duration_day" type="number" class="form-control col-2"
                               placeholder="{{trans("mb.day")}}" min="0"
                               value="{{$ticket->duration_day ?? old("duration_day")}}">
                        <span class="m-1">روز</span>
                    </div>
                </div>
            </div>
            @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'])
        </form>
    </div>
</div>
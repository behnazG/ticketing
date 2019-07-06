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
                        <label class="col-4 label-control">{{trans("mb.expireDateTicket")}}</label>
                        <input name="expire_date_hour" id="expire_date_hour" type="number" class="form-control col-2"
                               placeholder="{{trans("mb.hour")}}" min="0">
                        <h1>,</h1>
                        <input name="expire_date_day" id="expire_date_day" type="number" class="form-control col-2"
                               placeholder="{{trans("mb.day")}}" min="0">

                        <p class="col-3 label-control">{{date_sh($ticket->expire_date)}}</p>
                    </div>
                </div>
            </div>
            <div class="col-8 m-auto">
                <div id="show_time">
                    <div class="row form-group">
                        <label class="col-4 label-control">{{trans("mb.timeTable")}}</label>
                        <input name="time_table_hour" id="time_table_hour" type="number" class="form-control col-2"
                               placeholder="{{trans("mb.hour")}}" min="0">
                        <h1>,</h1>
                        <input name="time_table_day" id="time_table_day" type="number" class="form-control col-2"
                               placeholder="{{trans("mb.day")}}" min="0">

                        <p class="col-3 label-control">{{date_sh($ticket->time_table)}}</p>
                    </div>
                </div>
            </div>
            @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'])
        </form>
    </div>
</div>
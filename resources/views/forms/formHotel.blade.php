@section('css')
    <link href="{{asset("vendor/jalaliDatePick/jquery.md.bootstrap.datetimepicker.style.css")}}" rel="stylesheet"/>
@endsection
@section('page_js')
    <script src="{{asset("vendor/jalaliDatePick/jquery.md.bootstrap.datetimepicker.js")}}"></script>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('input').on('ifChanged', function (event) {
                var n = this.name;
                var t = this.type;
                var flag = $(this).is(":checked");
                if (t == "radio") {

                } else if (t == "checkbox") {
                    if (n == "valid" || n == "active") {
                        change_label(flag, n);
                    }
                }
            });
            function change_label(flag, inputName) {
                var l_n = "label_" + inputName;
                switch (inputName) {
                    case "valid":
                        if (flag == true)
                            $('#' + l_n).html("{{trans('mb.valid')}}");
                        else
                            $('#' + l_n).html("{{trans('mb.invalid')}}");
                        break;
                    case "active":
                        if (flag == true)
                            $('#' + l_n).html("{{trans('mb.active')}}");
                        else
                            $('#' + l_n).html("{{trans('mb.deactive')}}");
                        break;
                }
            }
            $('#expire_date_fa').MdPersianDateTimePicker({
                targetTextSelector: '#expire_date_fa',
                targetDateSelector: '#expire_date',
            });
        });
    </script>

@endsection

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-card-center">{{$formTitle}}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text">
                            @include('fragments.error')
                        </div>
                        <form class="form form-horizontal" action="{{url("/hotels/$hotel->id")}}" method="post">
                            @csrf
                            @isset($hotel->id)
                                {{method_field('PUT')}}
                            @endisset
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="name">{{trans('mb.name')}}</label>
                                    <div class="col-md-4">
                                        <input type="text" id="name" class="form-control"
                                               placeholder="{{trans('mb.name')}}"
                                               name="name" value="{{$hotel->name??old('name')}}">
                                    </div>
                                    <label class="col-md-2 label-control" for="phone">{{trans('mb.phone')}}</label>
                                    <div class="col-md-4">
                                        <input type="text" id="phone" class="form-control"
                                               placeholder="{{trans('mb.phone')}}"
                                               name="phone" value="{{$hotel->phone??old('phone')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control"
                                           for="province_id">{{trans('mb.province')}}</label>
                                    <div class="col-md-4">
                                        <select id="province_id" class="form-control select2" name="province_id">
                                            <option></option>
                                            @foreach($provinces as $provice)
                                                <option value="{{$provice->id}}"
                                                        {{old('province_id')==$provice->id || (!old('province_id')&& $hotel->province_id==$provice->id)?'selected':''}}
                                                >{{$provice->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-md-2 label-control" for="city_id">{{trans('mb.city')}}</label>
                                    <div class="col-md-4">
                                        <select id="city_id" class="form-control select2" name="city_id">
                                            <option></option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}"
                                                        {{old('city_id')==$city->id || (!old('city_id')&& $hotel->city_id==$city->id)?'selected':''}}
                                                >{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="email">{{trans('mb.email')}}</label>
                                    <div class="col-md-4">
                                        <input type="email" id="email" class="form-control"
                                               placeholder="{{trans('mb.email')}}"
                                               name="email" value="{{$hotel->email??old('email')}}">
                                    </div>
                                    <label class="col-md-2 label-control"
                                           for="sms_receiver_num">{{trans('mb.smsReceiverNum')}}</label>
                                    <div class="col-md-4">
                                        <input type="text" id="sms_receiver_num" class="form-control"
                                               placeholder="{{trans('mb.smsReceiverNum')}}"
                                               name="sms_receiver_num"
                                               value="{{$hotel->sms_receiver_num??old('sms_receiver_num')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="address">{{trans('mb.address')}}</label>
                                    <div class="col-md-10">
                                        <input type="text" id="address" class="form-control"
                                               placeholder="{{trans('mb.address')}}"
                                               name="address" value="{{$hotel->address??old('address')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control"
                                           for="expire_date_fa">{{trans('mb.expireDate')}}</label>
                                    <div class="col-md-4">
                                        <input type="text" id="expire_date_fa" class="form-control"
                                               placeholder="{{trans('mb.expireDate')}}"
                                               name="expire_date_fa"
                                               value="{{$hotel->expire_date_fa??old('expire_date_fa')}}">
                                        <input type="hidden" name="expire_date" id="expire_date">
                                    </div>
                                    @include('fragments.valid',['isValid'=>$hotel->valid])
                                </div>
                            </div>
                            @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/hotels'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
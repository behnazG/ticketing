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
                    } else if (n == "is_staff") {
                        is_staff(flag);
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

            $('#div_image').on('click', function () {
                $("#image_path").click();
            });

            $('#image_path').on('change', function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.div-upload-image-text').css({
                            "background-image": "url(" + e.target.result + ")",
                            "background-size": "cover"
                        });
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });

            function is_staff(flag) {
                if (flag == true) {
                    $('.is_staff').css('display', 'grid');
                    $('.is_hotel').css('display', 'none');
                } else {
                    $('.is_hotel').css('display', 'grid');
                    $('.is_staff').css('display', 'none');
                }
            }
        });
    </script>
@endsection
<?php
$show_is_staff = "";
if (($user->is_staff && $user->is_staff == 1) || old('is_staff')==1) {
    $show_is_staff = true;
}
else {
    $show_is_staff = false;
}
?>
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
                        <form class="form form-horizontal" action="{{url("/users/$user->id")}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @isset($user->id)
                                {{method_field('PUT')}}
                            @endisset
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="is_staff">{{trans('mb.staff')}}</label>
                                    <div class="col-md-4">
                                        <div class="col-md-4">
                                            <div class="row skin skin-square">
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input type="checkbox" name="is_staff"
                                                               id="is_staff" {{$show_is_staff ?'checked':''}} >
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('fragments.valid',['isValid'=>$user->valid,'showLabel'=>true])
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="email">{{trans('mb.email')}}</label>
                                    <div class="col-md-4">
                                        <input type="text" id="email" class="form-control"
                                               placeholder="{{trans('mb.email')}}"
                                               name="email" value="{{$user->email??old('email')}}">
                                    </div>
                                    <label class="col-md-2 label-control is_hotel {{!$show_is_staff?"":"display_none"}}"
                                           for="hotel_id">{{trans('mb.hotel')}}</label>
                                    <div class="col-md-4 is_hotel {{!$show_is_staff?"":"display_none"}}">
                                        <select id="hotel_id" name="hotel_id" class="form-control select2">
                                            <option></option>
                                            @foreach($hotels as $hotel)
                                                <option value="{{$hotel->id}}"
                                                        {{(old("hotel_id")==$hotel->id ||(!old('hotel_id') && $user->hotel_id && $user->hotel_id==$hotel->id)) ?"selected":""}}
                                                >{{$hotel->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-md-2 label-control is_staff {{$show_is_staff?"":"display_none"}}"
                                           for="organizational_chart_id">{{trans('mb.organizationChart')}}</label>
                                    <div class="col-md-4 {{$show_is_staff?"":"display_none"}} is_staff">
                                        <select id="organizational_chart_id" name="organizational_chart_id"
                                                class="form-control select2">
                                            <option></option>
                                            @foreach($organizationCharts as $organizationChart)
                                                <option value="{{$organizationChart->id}}"
                                                        {{(old("organizational_chart_id")==$organizationChart->id ||(!old('organizational_chart_id') && $user->organizational_chart_id && $user->organizational_chart_id==$organizationChart->id)) ?"selected":""}}
                                                >{{$organizationChart->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="name">{{trans('mb.name')}}</label>
                                    <div class="col-md-4">
                                        <input type="text" id="name" class="form-control"
                                               placeholder="{{trans('mb.name')}}"
                                               name="name" value="{{$user->name??old('name')}}">
                                    </div>
                                    <label class="col-md-2 label-control" for="mobile">{{trans('mb.mobile')}}</label>
                                    <div class="col-md-4">
                                        <input type="text" id="mobile" class="form-control"
                                               placeholder="{{trans('mb.mobile')}}"
                                               name="mobile" value="{{$user->mobile??old('mobile')}}">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    @include('fragments.gender')
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control"
                                           for="password">{{trans('mb.password')}}</label>
                                    <div class="col-md-4">
                                        <input type="password" id="password" class="form-control" value=""
                                               autocomplete="off"
                                               placeholder="{{trans('mb.password')}}"
                                               name="password">
                                    </div>
                                    <label class="col-md-2 label-control"
                                           for="password_confirmation">{{trans('mb.passwordConfirmation')}}</label>
                                    <div class="col-md-4">
                                        <input type="password" id="password_confirmation" class="form-control"
                                               placeholder="{{trans('mb.passwordConfirmation')}}"
                                               name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group row">

                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <div class="row">
                                            <label class="col-md-4 label-control"
                                                   for="image_path">{{trans('mb.image')}}</label>
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <input type="file" class="d-none" name="image_path" id="image_path">
                                                    <div class="div-upload-image m-auto" name="div_image"
                                                         id="div_image">
                                                        <div class="div-upload-image-text">
                                                            <i class="h1 ft-camera text-light"></i>
                                                            <i class="ft-plus-square div-upload-image-plus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        @isset($user_image)
                                            <img src="{{$user_image}}" class="img-fluid">
                                        @endisset
                                    </div>
                                </div>

                            </div>
                            @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/users'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
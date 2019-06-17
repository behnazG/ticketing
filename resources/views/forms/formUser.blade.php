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
                                <label class="col-md-2 label-control" for="email">{{trans('mb.email')}}</label>
                                <div class="col-md-4">
                                    <input type="text" id="email" class="form-control"
                                           placeholder="{{trans('mb.email')}}"
                                           name="email" value="{{$user->email??old('email')}}">
                                </div>
                                <label class="col-md-2 label-control" for="hotel_id">{{trans('mb.hotel')}}</label>
                                <div class="col-md-4">
                                    <select id="hotel_id" name="hotel_id" class="form-control select2">
                                        <option></option>
                                        @foreach($hotels as $hotel)
                                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="name">{{trans('mb.name')}}</label>
                                <div class="col-md-4">
                                    <input type="text" id="name" class="form-control" placeholder="{{trans('mb.name')}}"
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
                                <label class="col-md-2 label-control"
                                       for="organizational_chart_id">{{trans('mb.organizationChart')}}</label>
                                <div class="col-md-4">
                                    <select id="organizational_chart_id" name="organizational_chart_id" class="form-control select2">
                                        <option></option>
                                        @foreach($organizationCharts as $organizationChart)
                                            <option value="{{$organizationChart->id}}">{{$organizationChart->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @include('fragments.gender')
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 label-control"
                                               for="password">{{trans('mb.password')}}</label>
                                        <div class="col-md-8">
                                            <input type="text" id="password" class="form-control"
                                                   placeholder="{{trans('mb.password')}}"
                                                   name="password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-4 label-control"
                                               for="password_confirmation">{{trans('mb.passwordConfirmation')}}</label>
                                        <div class="col-md-8">
                                            <input type="text" id="password_confirmation" class="form-control"
                                                   placeholder="{{trans('mb.passwordConfirmation')}}"
                                                   name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <label class="col-md-4 label-control"
                                               for="image_path">{{trans('mb.image')}}</label>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <input type="file" class="d-none" name="pic" id="pic">
                                                <div class="div-upload-image m-auto" name="div_image" id="div_image">
                                                    <div class="div-upload-image-text">
                                                        <i class="h1 ft-camera text-light"></i>
                                                        <i class="ft-plus-square div-upload-image-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                @include('fragments.valid',['isValid'=>$user->valid])
                            </div>
                        </div>
                        @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/users'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                    <input type="text" id="name" class="form-control" placeholder="{{trans('mb.name')}}"
                                           name="name" value="{{$hotel->name??old('name')}}">
                                </div>
                                <label class="col-md-2 label-control" for="phone">{{trans('mb.phone')}}</label>
                                <div class="col-md-4">
                                    <input type="text" id="phone" class="form-control" placeholder="{{trans('mb.phone')}}"
                                           name="phone" value="{{$hotel->phone??old('phone')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="address">{{trans('mb.address')}}</label>
                                <div class="col-md-10">
                                    <input type="text" id="address" class="form-control" placeholder="{{trans('mb.address')}}"
                                           name="address" value="{{$hotel->address??old('address')}}">
                                </div>
                            </div>
                            <div class="form-group row">
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
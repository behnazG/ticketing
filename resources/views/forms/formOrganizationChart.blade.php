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
                    <form class="form form-horizontal" action="{{url("/organizationCharts/$organizationChart->id")}}" method="post">
                        @csrf
                        @isset($organizationChart->id)
                            {{method_field('PUT')}}
                        @endisset
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="name">{{trans('mb.name')}}</label>
                                <div class="col-md-4">
                                    <input type="text" id="name" class="form-control" placeholder="{{trans('mb.name')}}"
                                           name="name" value="{{$organizationChart->name??old('name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="parent">{{trans('mb.parent')}}</label>
                                <div class="col-md-4">
                                    <select id="parent" name="parent" class="form-control">
                                        <option value="0" {{old('parent')==0 ?'selected':''}} ></option>
                                        @foreach($organizationChart_list as $c)
                                            <option value="{{$c->id}}" {{(old('parent')==$c->id||$organizationChart->parent==$c->id) ?'selected':''}} >{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                @include('fragments.valid',['isValid'=>$organizationChart->valid])
                            </div>
                        </div>
                        @include('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/organizationCharts'])
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
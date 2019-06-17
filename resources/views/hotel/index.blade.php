@extends('layouts.blayout')

@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('js')
    <script type="text/javascript"
            src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}"
            type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable(
                {
                    "paging": false,
                    "ordering": false,
                    "info": false,
                    "searching": false
                }
            );
        });
    </script>
    @include('fragments.js.delete',["title"=>trans('mb.hotel'),"url"=>"hotels"])
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-card-center">{{trans('mb.hotels')}}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="row ">
                            <div class="form-group col-12">
                                <a class="btn  btn-danger box-shadow-2  btn-min-width pull-right"
                                   href="{{url("hotels/create")}}">
                                    <i class="ft-plus-square"></i> {{trans("mb.add",["name"=>trans('mb.hotel')])}}
                                </a>
                            </div>
                        </div>
                        <div class="card-text">
                            @include('fragments.error')
                        </div>
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap mt-2">
                            <thead>
                            <tr>
                                <th class="col-md-7">{{trans('mb.name')}}</th>
                                <th class="col-md-2">{{trans('mb.valid')}}</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotels as $hotel)
                                <tr id="row_{{$hotel->id}}">
                                    <td>{{$hotel->name}}</td>
                                    <td>@include('fragments.valid',['showValidMessage'=>$hotel->valid])</td>
                                    <td>@include('fragments.edit',['id'=>$hotel->id,'url'=>'hotels'])</td>
                                    <td>@include('fragments.delete',['id'=>$hotel->id])</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$hotels->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

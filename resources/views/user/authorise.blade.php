<?php
$titlePage = trans("mb.authoriseTo", ["name" => $user["name"]]);
$breadcrumbs = [
    ['url' => '/', 'name' => 'داشبورد'],
    ['url' => '/users/staffs', 'name' => trans('mb.users')],
    ['url' => '/users/' . $user->id . '/authorise', 'name' => trans("mb.authoriseTo", ["name" => $user["name"]])],
];
?>
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
    <script src="{{asset("app-assets/js/scripts/navs/navs.min.js")}}" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $(".select_all").on('click', function () {
                var class_name = $(this).data('class');
                $("." + class_name).iCheck('check');
            })
            $(".unselect_all").on('click', function () {
                var class_name = $(this).data('class');
                $("." + class_name).iCheck('uncheck');
            })
        });
    </script>
    @include('fragments.js.delete',["title"=>trans('mb.user'),"url"=>"users"])
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$user->name}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1"
                                   href="#tab1" aria-expanded="true"><i class="fa fa-hotel"></i>
                                    &nbsp;{{' '.trans("mb.hotels")}} </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
                                   aria-expanded="false"><i class="ft-layers"></i> &nbsp;{{trans("mb.categories")}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3"
                                   aria-expanded="false"><i class="ft-more-horizontal"></i> &nbsp;{{trans("mb.others")}}
                                </a>
                            </li>
                        </ul>
                        <form action="/authorises/{{$user->id}}" method="post">
                            @csrf
                            {{method_field('put')}}
                            <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
                                     aria-labelledby="base-tab1">
                                    <div class="col-12">
                                        <div class="row form-group mt-3">
                                            <div class="col-12 row">
                                                <div class="col-6">
                                                    {{--                                                    <h2>{{trans("mb.select",["name"=>trans("mb.hotel")])}}</h2>--}}
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button type="button" class="btn btn-outline-light select_all"
                                                            data-class="checkbox_hotel">
                                                        <i class="ft-check-square"></i> {{trans('mb.selectAll')}}
                                                    </button>&nbsp;
                                                    <button type="button" class="btn btn-outline-light unselect_all"
                                                            data-class="checkbox_hotel">
                                                        <i class="ft-square"></i> {{trans('mb.unSelectAll')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            @foreach($hotels as $hotel)
                                                <div class="col-md-4">
                                                    <div class="row skin skin-square">
                                                        <div class="col-md-12 col-sm-12">
                                                            <fieldset>
                                                                <input type="checkbox" name="hotel_{{$hotel->id}}"
                                                                       class="checkbox_hotel"
                                                                       {{old("hotel_".$hotel->id) || (!old("hotel_".$hotel->id) && in_array($hotel->id,$old_hotels))?'checked':'' }}
                                                                       id="hotel_{{$hotel->id}}">
                                                                <label for="hotel_{{$hotel->id}}"
                                                                       id="label_hotel_{{$hotel->id}}"><span
                                                                            class="">{{$hotel->name }}</span>{{' - '.$hotel->province_name.' - '.$hotel->city_name.''}}
                                                                </label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                    <div class="col-12">
                                        <div class="row form-group mt-3">
                                            <div class="col-12 row">
                                                <div class="col-6">
                                                    {{--<h2>{{trans("mb.select",["name"=>trans("mb.category")])}}</h2>--}}
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button type="button" class="btn btn-outline-light select_all"
                                                            data-class="checkbox_category">
                                                        <i class="ft-check-square"></i> {{trans('mb.selectAll')}}
                                                    </button>&nbsp;
                                                    <button type="button" class="btn btn-outline-light unselect_all"
                                                            data-class="checkbox_category">
                                                        <i class="ft-square"></i> {{trans('mb.unSelectAll')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">

                                        </div>
                                        <div class="row form-group">
                                            @foreach($categories as $category)
                                                <div class="col-md-4">
                                                    <div class="row skin skin-square">
                                                        <div class="col-md-12 col-sm-12">
                                                            <fieldset>
                                                                <input type="checkbox" name="category_{{$category->id}}"
                                                                       id="category_{{$category->id}}"
                                                                       {{old("category_".$category->id) || (!old("category_".$category->id) && in_array($category->id,$old_categories))?'checked':'' }}
                                                                       class="checkbox_category">
                                                                <label for="category_{{$category->id}}"
                                                                       id="label_category_{{$category->id}}"><span
                                                                            class="">{{$category->name}}</span></label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                                    <div class="row form-group mt-3">
                                        <div class="col-12">
                                            <div class="row skin skin-square">
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="allow_referral"
                                                               {{old("allow_referral") || (!old("allow_referral") && $old_allow_referral==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="allow_referral">
                                                        <label for="allow_referral"
                                                               id="allow_referral"><span
                                                                    class="">{{trans('mb.allowReferrals')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="view_pending_ticket"
                                                               {{old("view_pending_ticket") || (!old("view_pending_ticket") && $old_view_pending_ticket==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="view_pending_ticket">
                                                        <label for="view_pending_ticket"
                                                               id=""><span
                                                                    class="">{{trans('mb.viewPendingTicket')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="view_in_progress_ticket"
                                                               {{old("view_in_progress_ticket") || (!old("view_in_progress_ticket") && $old_view_in_progress_ticket==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="view_in_progress_ticket">
                                                        <label for="view_in_progress_ticket"
                                                               id=""><span
                                                                    class="">{{trans('mb.viewInProgressTicket')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="view_closed"
                                                               {{old("view_closed") || (!old("view_closed") && $old_view_closed==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="view_closed">
                                                        <label for="view_closed"
                                                               id=""><span
                                                                    class="">{{trans('mb.viewClosedTicket')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="set_times"
                                                               {{old("set_times") || (!old("set_times") && $old_set_times==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="set_times">
                                                        <label for="set_times"
                                                               id=""><span
                                                                    class="">{{trans('mb.setExpireDateAndTimeTable')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="get_sms"
                                                               {{old("get_sms") || (!old("get_sms") && $old_get_sms==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="get_sms">
                                                        <label for="get_sms"
                                                               id=""><span
                                                                    class="">{{trans('mb.getSmsTicket')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>


                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="admin_users"
                                                               {{old("admin_users") || (!old("admin_users") && $old_admin_users==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="admin_users">
                                                        <label for="admin_users"
                                                               id=""><span
                                                                    class="">{{trans('mb.AdminUsers')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="add_authorise"
                                                               {{old("add_authorise") || (!old("add_authorise") && $old_add_authorise==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="add_authorise">
                                                        <label for="add_authorise"
                                                               id=""><span
                                                                    class="">{{trans('mb.addAuthorise')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="admin_hotels"
                                                               {{old("admin_hotels") || (!old("admin_hotels") && $old_admin_hotels==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="admin_hotels">
                                                        <label for="admin_hotels"
                                                               id=""><span
                                                                    class="">{{trans('mb.adminHotels')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="admin_categories"
                                                               {{old("admin_categories") || (!old("admin_categories") && $old_admin_categories==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="admin_categories">
                                                        <label for="admin_categories"
                                                               id=""><span
                                                                    class="">{{trans('mb.adminCategories')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-4">
                                                    <fieldset>
                                                        <input type="checkbox" name="admin_organizationCharts"
                                                               {{old("admin_organizationCharts") || (!old("admin_organizationCharts") && $old_admin_organizationCharts==1)?'checked':'' }}
                                                               class="checkbox_hotel" id="admin_organizationCharts">
                                                        <label for="admin_organizationCharts"
                                                               id=""><span
                                                                    class="">{{trans('mb.adminOrganizationCharts')}}</span>
                                                        </label>
                                                    </fieldset>
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('fragments.submitPart',["submitText"=>trans('mb.authorise'),"giveUpUrl"=>"/users/staffs"])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

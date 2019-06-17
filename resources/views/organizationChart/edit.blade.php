<?php
$titlePage= trans('mb.edit').' '. $organizationChart["name"];
$breadcrumbs = [
    ['url' => '', 'name' => 'داشبورد'],
    ['url' => '/organizationCharts', 'name' => trans('mb.organizationCharts')],
    ['url' => '/organizationCharts/edit', 'name' => trans('mb.edit')],
    ['url' => '/organizationCharts/edit', 'name' =>  $organizationChart["name"]],
];
?>
@extends('layouts.blayout',['breadcrumbs'=>$breadcrumbs])
@section('pageName','')
@section('content')
    @include('forms.formOrganizationChart',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'organizationChart'=>$organizationChart])
@endsection
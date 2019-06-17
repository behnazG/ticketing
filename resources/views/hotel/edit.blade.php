<?php
$titlePage= trans('mb.edit').' '. $hotel["name"];
$breadcrumbs = [
    ['url' => '', 'name' => 'داشبورد'],
    ['url' => '/hotels', 'name' => trans('mb.hotels')],
    ['url' => '/hotels/edit', 'name' => trans('mb.edit')],
    ['url' => '/hotels/edit', 'name' =>  $hotel["name"]],
];
?>
@extends('layouts.blayout',['breadcrumbs'=>$breadcrumbs])
@section('pageName','')
@section('content')
    @include('forms.formHotel',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'hotel'=>$hotel])
@endsection
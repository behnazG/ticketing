<?php
$titlePage = trans('mb.create', ['name' => trans('mb.hotel')]);
$breadcrumbs = [
    ['url' => '/', 'name' => 'داشبورد'],
    ['url' => '/hotel', 'name' => trans('mb.hotels')],
    ['url' => '/hotel/create', 'name' => $titlePage],
];
?>
@extends('layouts.blayout',['breadcrumbs'=>$breadcrumbs])
@section('pageName','')
@include('forms.formHotel',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'hotel'=>$hotel])

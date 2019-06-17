<?php
$titlePage= trans('mb.edit').' '. $category["name"];
$breadcrumbs = [
    ['url' => '', 'name' => 'داشبورد'],
    ['url' => '/categories', 'name' => trans('mb.categories')],
    ['url' => '/categories/edit', 'name' => trans('mb.edit')],
    ['url' => '/categories/edit', 'name' =>  $category["name"]],
];
?>
@extends('layouts.blayout',['breadcrumbs'=>$breadcrumbs])
@section('pageName','')
@section('content')
    @include('forms.formCategory',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'category_list'=>$category_list])
@endsection
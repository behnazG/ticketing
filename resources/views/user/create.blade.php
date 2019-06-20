<?php
$titlePage = trans('mb.create', ['name' => trans('mb.user')]);
$breadcrumbs = [
    ['url' => '/', 'name' => 'داشبورد'],
    ['url' => '/user', 'name' => trans('mb.users')],
    ['url' => '/user/create', 'name' => $titlePage],
];
?>
@extends('layouts.blayout',['breadcrumbs'=>$breadcrumbs])
@section('pageName','')
@include('forms.formUser',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'user'=>$user])

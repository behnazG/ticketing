<?php
$titlePage = trans('mb.edit') . ' ' . $user["name"];
$breadcrumbs = [
    ['url' => '', 'name' => 'داشبورد'],
    ['url' => '/users', 'name' => trans('mb.users')],
    ['url' => '/users/edit', 'name' => trans('mb.edit')],
    ['url' => '/users/edit', 'name' => $user["name"]],
];
?>
@extends('layouts.blayout',['breadcrumbs'=>$breadcrumbs])
@section('pageName','')
@include('forms.formUser',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'user'=>$user])

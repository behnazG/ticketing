<?php
$titlePage = trans('mb.create', ['name' => trans('mb.category')]);
$breadcrumbs = [
    ['url' => '/admin', 'name' => 'داشبورد'],
    ['url' => '/admin/category', 'name' => trans('mb.categories')],
    ['url' => '/admin/category/create', 'name' => $titlePage],
];
?>
@extends('layouts.blayout',['breadcrumbs'=>$breadcrumbs])
@section('pageName','')

@section('js')
    <script>
        $(document).ready(function () {
            $('input').on('ifChanged', function (event) {
                var n = this.name;
                var t = this.type;
                var flag = $(this).is(":checked");
                if (t == "radio") {

                } else if (t == "checkbox") {
                    if (n == "valid" || n == "active") {
                        change_label(flag, n);
                    }
                }
            });
            function change_label(flag, inputName) {
                var l_n = "label_" + inputName;
                switch (inputName) {
                    case "valid":
                        if (flag == true)
                            $('#' + l_n).html("{{trans('mb.valid')}}");
                        else
                            $('#' + l_n).html("{{trans('mb.invalid')}}");
                        break;
                    case "active":
                        if (flag == true)
                            $('#' + l_n).html("{{trans('mb.active')}}");
                        else
                            $('#' + l_n).html("{{trans('mb.deactive')}}");
                        break;
                }
            }
        });
    </script>

@endsection

@section('content')
    @include('forms.formCategory',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'category'=>$category,'category_list'=>$category_list])
@endsection
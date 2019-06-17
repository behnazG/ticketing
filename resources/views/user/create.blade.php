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
            $('#div_image').on('click', function () {
                $("#image_path").click();
            });

            $('#image_path').on('change',function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.div-upload-image-text').css({"background-image":"url(" +e.target.result+ ")","background-size":"cover"});
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endsection
@section('content')
    @include('forms.formUser',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'user'=>$user])
@endsection
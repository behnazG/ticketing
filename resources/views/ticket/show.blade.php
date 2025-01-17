﻿@extends("layouts.bmail")
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/pages/chat-application.css")}}">
    <link href="{{asset("vendor/jalaliDatePick/jquery.md.bootstrap.datetimepicker.style.css")}}" rel="stylesheet"/>
@endsection
@section('js')
    <script src="{{asset("/app-assets/js/scripts/pages/chat-application.js")}}" type="text/javascript"></script>
    <script src="{{asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")}}"></script>
    <script src="{{asset("vendor/unisharp/laravel-ckeditor/adapters/jquery.js")}}"></script>
    <script src="{{asset("vendor/jalaliDatePick/jquery.md.bootstrap.datetimepicker.js")}}"></script>
    <script>
        $('textarea').ckeditor(
            {
                language: 'fa',
                // uiColor: '#9AB8F3'
                toolbarGroups: [
                    {name: 'document', groups: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']},
                    {
                        name: 'clipboard',
                        groups: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                    },
                    {name: 'basicstyles', groups: ['Bold', 'Italic']},
                    {name: 'links', groups: ['Link', 'Unlink', 'Anchor']},
                    {name: 'styles', groups: ['Styles', 'format']},
                    '/',
                    {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                    {name: 'paragraph', groups: ['list', 'indent', 'align', 'bidi']},
                    {name: 'styles'},
                ],
                removeButtons: 'Anchor,blocks',

            }
        );
    </script>
    <script>
        $(document).ready(function () {
            $('#btn_replay').on('click', function () {
                $('.dv_extra').css('display', 'none');
                $('#dv_replay').css('display', 'block');
            });
            $('#btn_change_status').on('click', function () {
                $('.dv_extra').css('display', 'none');
                $('#dv_change_status').css('display', 'block');
            });
            $('#btn_reffral').on('click', function () {
                $('.dv_extra').css('display', 'none');
                $('#dv_reffral').css('display', 'block');
            });
            $('#btn_start_work').on('click', function () {
                $.ajax({
                    type: 'GET',
                    url: '/tickets/startWorkTime/{{$current_ticket->generate_ticket_id()}}',
                    success: function (result) {
                        location.reload();
                    }

                });
            });
            $("#btn_end_work").on('click', function () {
                $.ajax({
                    type: 'GET',
                    url: '/tickets/endWorkTime/{{$current_ticket->generate_ticket_id()}}',
                    success: function (data) {
                        location.reload();
                    }
                });
            });
            $('#btn_show_work_time').on('click', function () {
                $('.dv_extra').css('display', 'none');
                $('#dv_show_work_time').css('display', 'block');
            });
            $('#btn_set_times').on('click', function () {
                $('.dv_extra').css('display', 'none');
                $('#dv_set_times').css('display', 'block');
            });

            $('#expire_date_fa').MdPersianDateTimePicker({
                targetTextSelector: '#expire_date_fa',
                targetDateSelector: '#expire_date',
            });
        });
    </script>
@endsection
@section('content')
    <div class="email-app-title card-body">
        <div class="row">
            <div class="col-12"> @include("fragments.alert") </div>

            <div class="col-lg-9 col-12 text-left ">
                <h3 class="list-group-item-heading">{{$current_ticket->subject}}</h3>
            </div>

            <p class="col-3 text-right">
                        <span class="{{$status_list[$current_ticket->status][1]}}"><i
                                    class="font-medium-1 {{$status_list[$current_ticket->status][2]}}"></i> {{$status_list[$current_ticket->status][0]}}</span>
            </p>
        </div>
        <div class="row mt-3">
            <p class="col-3 gray-asa"><i
                        class="ft-info "></i>{{ trans('mb.category').':'.$current_ticket->category->name}} </p>
            <p class="col-3 gray-asa"><i
                        class="ft-calendar"></i> {{ trans('mb.time').':'.date_sh($current_ticket->created_at) }}</p>
            <p class="col-3 gray-asa"><i
                        class="ft-calendar"></i> {{ trans('mb.expireDateTicket').':'.date_sh($current_ticket->expire_date) }}
            </p>
            <p class="col-3 gray-asa"><i
                        class="ft-tag"></i> {{trans("mb.ticketNumber").': '.$current_ticket->ticket_id}}</p>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <p class="col-12 gray-asa">
                        <i class="fas fa-paper-plane"></i> {{trans("mb.sender").':  '.$current_ticket->sender->name ." ".trans("mb.user")." ". trans('mb.hotel')." ".$current_ticket->hotel->name }}
                    </p>
                    <p class="col-12 gray-asa">
                        <i class="fas fa-headphones-alt"></i> {{trans("mb.trackBy").':  '.$current_ticket->receiver->name}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="media-list">
        <div class="card-body chat-application">
            <div class="chats ps-container ps-theme-dark ps-active-y">
                <div class="chats ps-container ps-theme-dark">
                    @foreach($chains as $ticket)
                        <?php
                        $self_sender = ($ticket->sender_id == $current_user->id) ? true : false;
                        $sender_user_image = ($ticket->sender == false) ? get_icon_url() : $ticket->sender->get_image_url();
                        $sender_user_name = ($ticket->sender == false) ? trans("mb.unknown") : $ticket->sender->name;
                        $is_staff = $ticket->sender->is_staff;
                        ?>
                        <div class="chat {{($is_staff)?"chat-left":""}}">
                            <div class="chat-avatar">
                                <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title=""
                                   data-original-title="">
                                    <img src="{{$self_sender?$current_user->get_image_url():$sender_user_image}}"
                                         alt="avatar">
                                </a>
                            </div>
                            <div class="chat-body">
                                <div class="chat-content text-left">
                                    <p class="row">
                                        <span class="col-6 float-right">{{$self_sender?$current_user->name:$sender_user_name}}</span>
                                        <span class="col-6 float-left text-right">{{date_sh($ticket->created_at)}}</span>
                                    </p>
                                    <p class="mt-1"><?=$ticket->text?></p>
                                    <p class="mt-1">
                                        @if($a=$ticket->download_attach_file('file_1'))
                                            <a target="_blank" class="{{$is_staff?"":"white"}}"
                                               href="{{$a}}"><i
                                                        class="ft-paperclip font-medium-5 pl-1"></i> {{trans("mb.file1")}}
                                            </a>
                                        @endif
                                        @if($a=$ticket->download_attach_file('file_2'))
                                            <a target="_blank" class="{{$is_staff?"":"white"}}"
                                               href="{{$a}}"><i
                                                        class="ft-paperclip font-medium-5 pl-1"></i> {{trans("mb.file2")}}
                                            </a>
                                        @endif
                                        @if($a=$ticket->download_attach_file('file_3'))
                                            <a target="_blank" class="{{$is_staff?"":"white"}}"
                                               href="{{$a}}"><i
                                                        class="ft-paperclip font-medium-5 pl-1"></i> {{trans("mb.file3")}}
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 258px;">
                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                    <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps-scrollbar-y-rail" style="top: 0px; height: 300px; right: 272px;">
                    <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 95px;"></div>
                </div>
            </div>

            {{--///////////////////////////////////////--}}
            @if($current_user->is_staff == 1)
                @foreach($ticket_time_log as $t_l)
                    @if($t_l->type == 1)
                        @include('fragments.alertMessage',['alert_class'=>'info','message'=>trans('mb.reffralFrom').': '.$t_l->user_full_name.'<br />'.$t_l->comment])
                    @endif
                @endforeach
            @endif
            <div class="row mt-1">
            </div>
            {{--/////////////////////////--}}
            @if($authorise==true)
                {{--BUTTON--}}
                <div class="row mt-1 text-left">
                    <div class="col-12">
                        @if($allowed_refferal)
                            <button type="button" class="btn btn-asa btn btn-glow " id="btn_reffral"><i
                                        class="fas fa-arrow-right"></i> {{trans("mb.reffral")}}
                            </button>
                        @endif
                        @if($set_times)
                            <button type="button" class="btn btn-asa btn btn-glow " id="btn_set_times"><i
                                        class="fas fa-calendar"></i> {{trans("mb.setTimes")}}
                            </button>
                        @endif
                        <button type="button" class="btn btn-asa btn btn-glow " id="btn_replay">
                            <i class="fas fa-reply"></i> {{trans("mb.replay")}}
                        </button>
                        <button type="button" class="btn btn-asa btn btn-glow " id="btn_change_status"><i
                                    class="fas fa-reply"></i> {{trans("mb.changeStatus")}}
                        </button>
                        @php($show_button_start_work=true)
                        @foreach($ticket_time_log as $t_l)
                            @if($t_l->type==2)
                                @if(is_null($t_l->end_time_system))
                                    @php($show_button_start_work=false)
                                    @php($show_text=true)
                                    @break
                                @endif
                            @endif
                        @endforeach
                        @if($current_user->is_staff==1)
                            @if($show_button_start_work == true)
                                <button type="button" class="btn btn-asa btn btn-glow "
                                        id="btn_start_work"><i
                                            class="ft-clock"></i> {{trans("mb.startWork")}}
                                </button>
                            @else
                                <button type="button" class="btn btn-asa btn btn-glow " id="btn_end_work">
                                    <i
                                            class="ft-clock"></i> {{trans("mb.endWork")}}
                                </button>
                            @endif
                        @endif
                        @if($current_user->is_staff==1)
                            <button type="button" class="btn btn-asa btn btn-glow " id="btn_show_work_time">
                                <i class="fa fa-history"></i>
                                {{trans("mb.LogFile")}}
                            </button>
                        @endif
                        <a href="{{url("print/".$current_ticket->generate_ticket_id()."/tickets")}}"
                           class="btn btn-asa btn btn-glow  white" target="_blank"><i class="ft-printer"></i></a>

                    </div>
                    <div class="col-12">
                        @if(isset($show_text) && $show_text == true)
                            <h6 class="red mt-1 mb-1">
                                <i class="ficon ft-bell bell-shake"></i>
                                {{trans('mb.ticketInProccessing',['user_name'=>$ticket_time_log[0]->user_full_name,'date'=>date_sh($ticket_time_log[0]->start_time_system)])}}
                            </h6>
                        @endif
                    </div>
                </div>
                {{--END BUTTON--}}
            @endif
        </div>
    </div>
    @if($authorise==true)
        <div class="dv_extra display_none" id="dv_replay">
            @include('forms.formReplay',["ticket"=>$current_ticket,"submitText"=>trans("mb.send")])
        </div>
        <div class="dv_extra {{(isset($return_back) && $return_back=="change_status")?"":"display_none"}}"
             id="dv_change_status">
            @include('forms.formChangeStatus',["ticket"=>$current_ticket,"submitText"=>trans("mb.changeStatus")])
        </div>
        @if($allowed_refferal)
            <div class="dv_extra {{(isset($return_back) && $return_back=="reffral")?"":"display_none"}}"
                 id="dv_reffral">
                @include('forms.formReffral',["ticket"=>$current_ticket,"submitText"=>trans("mb.reffral")])
            </div>
        @endif
        <div class="dv_extra {{(isset($return_back) && $return_back=="workTime")?"":"display_none"}}"
             id="dv_show_work_time">
            @include('ticket.show_workTime');
        </div>
        @if($set_times)
            <div class="dv_extra {{(isset($return_back) && $return_back=="set_times")?"":"display_none"}}"
                 id="dv_set_times">
                @include('forms.formSetTimes',["ticket"=>$current_ticket,"submitText"=>trans("mb.setTimes")]);
            </div>
        @endif
    @endif
@endsection
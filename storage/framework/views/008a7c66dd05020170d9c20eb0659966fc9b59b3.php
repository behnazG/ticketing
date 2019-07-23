
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("app-assets/css-rtl/pages/chat-application.css")); ?>">
    <link href="<?php echo e(asset("vendor/jalaliDatePick/jquery.md.bootstrap.datetimepicker.style.css")); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset("/app-assets/js/scripts/pages/chat-application.js")); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor/unisharp/laravel-ckeditor/adapters/jquery.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor/jalaliDatePick/jquery.md.bootstrap.datetimepicker.js")); ?>"></script>
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
                    url: '/tickets/startWorkTime/<?php echo e($current_ticket->generate_ticket_id()); ?>',
                    success: function (result) {
                        location.reload();
                    }

                });
            });
            $("#btn_end_work").on('click', function () {
                $.ajax({
                    type: 'GET',
                    url: '/tickets/endWorkTime/<?php echo e($current_ticket->generate_ticket_id()); ?>',
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="email-app-title card-body">
        <div class="row">
            <div class="col-12"> <?php echo $__env->make("fragments.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>

            <div class="col-lg-9 col-12 text-left ">
                <h3 class="list-group-item-heading"><?php echo e($current_ticket->subject); ?></h3>
            </div>

            <p class="col-3 text-right">
                        <span class="<?php echo e($status_list[$current_ticket->status][1]); ?>"><i
                                    class="font-medium-1 <?php echo e($status_list[$current_ticket->status][2]); ?>"></i> <?php echo e($status_list[$current_ticket->status][0]); ?></span>
            </p>
        </div>
        <div class="row mt-3">
            <p class="col-3 gray-asa"><i
                        class="ft-info "></i><?php echo e(trans('mb.category').':'.$current_ticket->category->name); ?> </p>
            <p class="col-3 gray-asa"><i
                        class="ft-calendar"></i> <?php echo e(trans('mb.time').':'.date_sh($current_ticket->created_at)); ?></p>
            <p class="col-3 gray-asa"><i
                        class="ft-calendar"></i> <?php echo e(trans('mb.expireDateTicket').':'.date_sh($current_ticket->expire_date)); ?>

            </p>
            <p class="col-3 gray-asa"><i
                        class="ft-tag"></i> <?php echo e(trans("mb.ticketNumber").': '.$current_ticket->ticket_id); ?></p>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <p class="col-12 gray-asa">
                        <i class="fas fa-paper-plane"></i> <?php echo e(trans("mb.sender").':  '.$current_ticket->sender->name ." ".trans("mb.user")." ". trans('mb.hotel')." ".$current_ticket->hotel->name); ?>

                    </p>
                    <p class="col-12 gray-asa">
                        <i class="fas fa-headphones-alt"></i> <?php echo e(trans("mb.trackBy").':  '.$current_ticket->receiver->name); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="media-list">
        <div class="card-body chat-application">
            <div class="chats ps-container ps-theme-dark ps-active-y">
                <div class="chats ps-container ps-theme-dark">
                    <?php $__currentLoopData = $chains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $self_sender = ($ticket->sender_id == $current_user->id) ? true : false;
                        $sender_user_image = ($ticket->sender == false) ? get_icon_url() : $ticket->sender->get_image_url();
                        $sender_user_name = ($ticket->sender == false) ? trans("mb.unknown") : $ticket->sender->name;
                        $is_staff = $ticket->sender->is_staff;
                        ?>
                        <div class="chat <?php echo e(($is_staff)?"chat-left":""); ?>">
                            <div class="chat-avatar">
                                <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title=""
                                   data-original-title="">
                                    <img src="<?php echo e($self_sender?$current_user->get_image_url():$sender_user_image); ?>"
                                         alt="avatar">
                                </a>
                            </div>
                            <div class="chat-body">
                                <div class="chat-content text-left">
                                    <p class="row">
                                        <span class="col-6 float-right"><?php echo e($self_sender?$current_user->name:$sender_user_name); ?></span>
                                        <span class="col-6 float-left text-right"><?php echo e(date_sh($ticket->created_at)); ?></span>
                                    </p>
                                    <p class="mt-1"><?=$ticket->text?></p>
                                    <p class="mt-1">
                                        <?php if($a=$ticket->download_attach_file('file_1')): ?>
                                            <a target="_blank" class="<?php echo e($is_staff?"":"white"); ?>"
                                               href="<?php echo e($a); ?>"><i
                                                        class="ft-paperclip font-medium-5 pl-1"></i> <?php echo e(trans("mb.file1")); ?>

                                            </a>
                                        <?php endif; ?>
                                        <?php if($a=$ticket->download_attach_file('file_2')): ?>
                                            <a target="_blank" class="<?php echo e($is_staff?"":"white"); ?>"
                                               href="<?php echo e($a); ?>"><i
                                                        class="ft-paperclip font-medium-5 pl-1"></i> <?php echo e(trans("mb.file2")); ?>

                                            </a>
                                        <?php endif; ?>
                                        <?php if($a=$ticket->download_attach_file('file_3')): ?>
                                            <a target="_blank" class="<?php echo e($is_staff?"":"white"); ?>"
                                               href="<?php echo e($a); ?>"><i
                                                        class="ft-paperclip font-medium-5 pl-1"></i> <?php echo e(trans("mb.file3")); ?>

                                            </a>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

            
            <?php if($current_user->is_staff == 1): ?>
                <?php $__currentLoopData = $ticket_time_log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($t_l->type == 1): ?>
                        <?php echo $__env->make('fragments.alertMessage',['alert_class'=>'info','message'=>trans('mb.reffralFrom').': '.$t_l->user_full_name.'<br />'.$t_l->comment], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <div class="row mt-1">
            </div>
            
            <?php if($authorise==true): ?>
                
                <div class="row mt-1 text-left">
                    <div class="col-12">
                        <?php if($allowed_refferal): ?>
                            <button type="button" class="btn btn-asa btn btn-glow " id="btn_reffral"><i
                                        class="fas fa-arrow-right"></i> <?php echo e(trans("mb.reffral")); ?>

                            </button>
                        <?php endif; ?>
                        <?php if($set_times): ?>
                            <button type="button" class="btn btn-asa btn btn-glow " id="btn_set_times"><i
                                        class="fas fa-calendar"></i> <?php echo e(trans("mb.setTimes")); ?>

                            </button>
                        <?php endif; ?>
                        <button type="button" class="btn btn-asa btn btn-glow " id="btn_replay">
                            <i class="fas fa-reply"></i> <?php echo e(trans("mb.replay")); ?>

                        </button>
                        <button type="button" class="btn btn-asa btn btn-glow " id="btn_change_status"><i
                                    class="fas fa-reply"></i> <?php echo e(trans("mb.changeStatus")); ?>

                        </button>
                        <?php ($show_button_start_work=true); ?>
                        <?php $__currentLoopData = $ticket_time_log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($t_l->type==2): ?>
                                <?php if(is_null($t_l->end_time_system)): ?>
                                    <?php ($show_button_start_work=false); ?>
                                    <?php ($show_text=true); ?>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($current_user->is_staff==1): ?>
                            <?php if($show_button_start_work == true): ?>
                                <button type="button" class="btn btn-asa btn btn-glow "
                                        id="btn_start_work"><i
                                            class="ft-clock"></i> <?php echo e(trans("mb.startWork")); ?>

                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-asa btn btn-glow " id="btn_end_work">
                                    <i
                                            class="ft-clock"></i> <?php echo e(trans("mb.endWork")); ?>

                                </button>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($current_user->is_staff==1): ?>
                            <button type="button" class="btn btn-asa btn btn-glow " id="btn_show_work_time">
                                <i class="fa fa-history"></i>
                                <?php echo e(trans("mb.LogFile")); ?>

                            </button>
                        <?php endif; ?>
                        <a href="<?php echo e(url("print/".$current_ticket->generate_ticket_id()."/tickets")); ?>"
                           class="btn btn-asa btn btn-glow  white" target="_blank"><i class="ft-printer"></i></a>

                    </div>
                    <div class="col-12">
                        <?php if(isset($show_text) && $show_text == true): ?>
                            <h6 class="red mt-1 mb-1">
                                <i class="ficon ft-bell bell-shake"></i>
                                <?php echo e(trans('mb.ticketInProccessing',['user_name'=>$ticket_time_log[0]->user_full_name,'date'=>date_sh($ticket_time_log[0]->start_time_system)])); ?>

                            </h6>
                        <?php endif; ?>
                    </div>
                </div>
                
            <?php endif; ?>
        </div>
    </div>
    <?php if($authorise==true): ?>
        <div class="dv_extra display_none" id="dv_replay">
            <?php echo $__env->make('forms.formReplay',["ticket"=>$current_ticket,"submitText"=>trans("mb.send")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="dv_extra <?php echo e((isset($return_back) && $return_back=="change_status")?"":"display_none"); ?>"
             id="dv_change_status">
            <?php echo $__env->make('forms.formChangeStatus',["ticket"=>$current_ticket,"submitText"=>trans("mb.changeStatus")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php if($allowed_refferal): ?>
            <div class="dv_extra <?php echo e((isset($return_back) && $return_back=="reffral")?"":"display_none"); ?>"
                 id="dv_reffral">
                <?php echo $__env->make('forms.formReffral',["ticket"=>$current_ticket,"submitText"=>trans("mb.reffral")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
        <div class="dv_extra <?php echo e((isset($return_back) && $return_back=="workTime")?"":"display_none"); ?>"
             id="dv_show_work_time">
            <?php echo $__env->make('ticket.show_workTime', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        </div>
        <?php if($set_times): ?>
            <div class="dv_extra <?php echo e((isset($return_back) && $return_back=="set_times")?"":"display_none"); ?>"
                 id="dv_set_times">
                <?php echo $__env->make('forms.formSetTimes',["ticket"=>$current_ticket,"submitText"=>trans("mb.setTimes")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.bmail", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/ticket/show.blade.php ENDPATH**/ ?>
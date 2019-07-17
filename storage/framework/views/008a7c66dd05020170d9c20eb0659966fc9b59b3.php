<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("app-assets/css-rtl/pages/chat-application.css")); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset("/app-assets/js/scripts/pages/chat-application.js")); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor/unisharp/laravel-ckeditor/adapters/jquery.js")); ?>"></script>
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
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="email-app-title card-body">
        <div class="row">
            <div class="col-12">
                <label class="label-control mr-1"> <?php echo e($current_ticket->category->name); ?> </label> /
                <label class="label-control ml-1"> <?php echo e(date_sh($current_ticket->created_at)); ?> </label>
                <label class="col-form-label ml-3"><?php echo e(trans("mb.ticketNumber").': '.$current_ticket->ticket_id); ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-12 text-left ">
                <h3 class="list-group-item-heading"><?php echo e($current_ticket->subject); ?></h3>
            </div>
            <div class="col-lg-3 col-12 text-right">
                <p class="<?php echo e($status_list[$current_ticket->status][1]); ?>"><i
                            class="font-medium-1 <?php echo e($status_list[$current_ticket->status][2]); ?> font-medium-5"></i> <?php echo e($status_list[$current_ticket->status][0]); ?>

                </p>
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
                        $front_user_image = ($ticket->front_user == false) ? get_icon_url() : $ticket->front_user->get_image_url();
                        $front_user_name = ($ticket->front_user == false) ? trans("mb.unknown") : $ticket->front_user->name;
                        $is_staff = $ticket->front_user->is_staff;
                        ?>
                        <div class="chat <?php echo e(($self_sender)?"chat-left":""); ?>">
                            <div class="chat-avatar">
                                <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title=""
                                   data-original-title="">
                                    <img src="<?php echo e($self_sender?$current_user->get_image_url():$front_user_image); ?>"
                                         alt="avatar">
                                </a>
                            </div>
                            <div class="chat-body">
                                <div class="chat-content text-left">
                                    <p class="row">
                                        <span class="col-6 float-right"><?php echo e($self_sender?$current_user->name:$front_user_name); ?></span>
                                        <span class="col-6 float-left text-right"><?php echo e(date_sh($ticket->created_at)); ?></span>
                                    </p>
                                    <p class="mt-1"><?=$ticket->text?></p>
                                    <p class="mt-1">
                                        <?php if($a=$ticket->download_attach_file('file_1')): ?>
                                            <a target="_blank" class="<?php echo e($self_sender?"":"white"); ?>" href="<?php echo e($a); ?>"><i
                                                        class="ft-paperclip font-medium-5 pl-1"></i> <?php echo e(trans("mb.file1")); ?>

                                            </a>
                                        <?php endif; ?>
                                        <?php if($a=$ticket->download_attach_file('file_2')): ?>
                                            <a target="_blank" class="<?php echo e($self_sender?"":"white"); ?>" href="<?php echo e($a); ?>"><i
                                                        class="ft-paperclip font-medium-5 pl-1"></i> <?php echo e(trans("mb.file2")); ?>

                                            </a>
                                        <?php endif; ?>
                                        <?php if($a=$ticket->download_attach_file('file_3')): ?>
                                            <a target="_blank" class="<?php echo e($self_sender?"":"white"); ?>" href="<?php echo e($a); ?>"><i
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
            <?php if($authorise==true): ?>
                
                <div class="row mt-1 text-left">
                    <div class="col-12">
                        <?php if($allowed_refferal): ?>
                            <button type="button" class="btn btn-danger btn-sm btn-glow mr-1" id="btn_reffral"><i
                                        class="fas fa-arrow-right"></i> <?php echo e(trans("mb.reffral")); ?>

                            </button>
                        <?php endif; ?>
                        <?php if($set_times): ?>
                            <button type="button" class="btn btn-danger btn-sm btn-glow mr-1" id="btn_set_times"><i
                                        class="fas fa-calendar"></i> <?php echo e(trans("mb.setTimes")); ?>

                            </button>
                        <?php endif; ?>
                        <button type="button" class="btn btn-danger btn-sm btn-glow mr-1" id="btn_replay">
                            <i class="fas fa-reply"></i> <?php echo e(trans("mb.replay")); ?>

                        </button>
                        <button type="button" class="btn btn-danger btn-sm btn-glow mr-1" id="btn_change_status"><i
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
                                <button type="button" class="btn btn-danger btn-sm btn-glow mr-1"
                                        id="btn_start_work"><i
                                            class="ft-clock"></i> <?php echo e(trans("mb.startWork")); ?>

                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-danger btn-sm btn-glow mr-1" id="btn_end_work">
                                    <i
                                            class="ft-clock"></i> <?php echo e(trans("mb.endWork")); ?>

                                </button>
                            <?php endif; ?>
                        <?php endif; ?>
                        <button type="button" class="btn btn-danger btn-sm btn-glow mr-1" id="btn_show_work_time">
                            <i class="fa fa-history"></i>
                            <?php echo e(trans("mb.LogFile")); ?>

                        </button>

                        <?php if(isset($show_text) && $show_text == true): ?>
                            <p class="float-right red">
                                <i class="ficon ft-bell bell-shake"></i>
                                <?php echo e(trans('mb.ticketInProccessing',['user_name'=>$ticket_time_log[0]->user_full_name,'date'=>date_sh($ticket_time_log[0]->start_time_system)])); ?>

                            </p>
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
<div class="card-content collpase show">
    <div class="card-body">
        <div class="card-text">
            <?php echo $__env->make('fragments.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <form class="form form-horizontal" action="<?php echo e(url("/tickets/changeStatus/$ticket->id")); ?>" method="post"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($ticket->id)): ?>
                <?php echo e(method_field('PUT')); ?>

            <?php endif; ?>
            <div class="col-8 m-auto text-center">
                <p class="<?php echo e($status_list[$current_ticket->status][1]); ?>"><?php echo e(trans("mb.currentStatus")); ?>: <?php echo e($status_list[$current_ticket->status][0]); ?>

                </p>
            </div>
            <div class="col-8 m-auto">
                <div class="row form-group skin skin-line">
                    <?php $__currentLoopData = $status_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(($current_user->is_staff == 1 && in_array($index,[1,2]))
                        ||($current_user->is_staff == 0 && in_array($index,[3,4,5]))): ?>
                            <div class="<?php echo e($current_user->is_staff == 1?"col-6":"col-4"); ?> p-1">
                                <fieldset>
                                    <input type="radio" id="status" name="status"
                                           value="<?php echo e($index); ?>" <?php echo e((old('status')==$index) || (!old("status") && $ticket->status==$index) ?'checked':''); ?>>
                                    <label for="status"><?php echo e($value[0]); ?></label>
                                </fieldset>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php if($current_user->is_staff==1): ?>
                <div class="col-8 m-auto">
                    <div id="show_time">
                        <div class="row form-group">
                            <label class="col-4 label-control"><?php echo e(trans("mb.workTime").' '.trans("mb.user")); ?></label>
                            <input name="minut" id="minut" type="number" class="form-control col-md-2"
                                   placeholder="<?php echo e(trans("mb.minut")); ?>"
                                   value="<?php echo e(isset($ticket_time_log->time_user)?explode(':',$ticket_time_log->time_user)[1]:""); ?>">
                            <h1>:</h1>
                            <input name="hour" id="hour" type="number" class="form-control col-md-2"
                                   placeholder="<?php echo e(trans("mb.hour")); ?>"
                                   value="<?php echo e(isset($ticket_time_log->time_user)?explode(':',$ticket_time_log->time_user)[0]:""); ?>">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php echo $__env->make('fragments.submitPart',['submitText'=>trans("mb.changeStatus"),'giveUpUrl'=>'/tickets'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/forms/formChangeStatus.blade.php ENDPATH**/ ?>
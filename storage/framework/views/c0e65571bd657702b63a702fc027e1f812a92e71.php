<div class="card-content collpase show">
    <div class="card-body">
        <div class="card-text">
            <?php echo $__env->make('fragments.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <form class="form form-horizontal" action="<?php echo e(url("/tickets/setTimes/$ticket->id")); ?>" method="post"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($ticket->id)): ?>
                <?php echo e(method_field('PUT')); ?>

            <?php endif; ?>
            <div class="col-8 m-auto text-center">
            </div>
            <div class="col-8 m-auto">
                <div id="show_time">
                    <div class="row form-group">
                        <label class="col-4 label-control"><?php echo e(trans("mb.expireDateTicket")); ?></label>
                        <input name="expire_date_hour" id="expire_date_hour" type="number" class="form-control col-2"
                               placeholder="<?php echo e(trans("mb.hour")); ?>" min="0">
                        <h1>,</h1>
                        <input name="expire_date_day" id="expire_date_day" type="number" class="form-control col-2"
                               placeholder="<?php echo e(trans("mb.day")); ?>" min="0">

                        <p class="col-3 label-control"><?php echo e(date_sh($ticket->expire_date)); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-8 m-auto">
                <div id="show_time">
                    <div class="row form-group">
                        <label class="col-4 label-control"><?php echo e(trans("mb.timeTable")); ?></label>
                        <input name="time_table_hour" id="time_table_hour" type="number" class="form-control col-2"
                               placeholder="<?php echo e(trans("mb.hour")); ?>" min="0">
                        <h1>,</h1>
                        <input name="time_table_day" id="time_table_day" type="number" class="form-control col-2"
                               placeholder="<?php echo e(trans("mb.day")); ?>" min="0">

                        <p class="col-3 label-control"><?php echo e(date_sh($ticket->time_table)); ?></p>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/forms/formSetTimes.blade.php ENDPATH**/ ?>
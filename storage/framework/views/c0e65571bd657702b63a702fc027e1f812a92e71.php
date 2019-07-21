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
                        <label class="col-2 label-control" for="expire_date_fa"><?php echo e(trans('mb.expireDateTicket')); ?></label>
                        <div class="col-6">
                            <input type="text" id="expire_date_fa" class="form-control"
                                   placeholder="<?php echo e(trans('mb.expireDate')); ?>"
                                   name="expire_date_fa"
                                   value="<?php echo e($ticket->expire_date_fa??old('expire_date_fa')); ?>">
                            <input type="hidden" name="expire_date" id="expire_date"
                                   value="<?php echo e($ticket->expire_date ?? old("expire_date")); ?>">
                        </div>

                        <p class="col-3 label-control m-1"><?php echo e((is_null($ticket->expire_date))?trans("mb.unknown"):date_shamsi($ticket->expire_date,"Y-m-d")); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-8 m-auto">
                <div id="show_time">
                    <div class="row form-group">
                        <label class="col-2 label-control"><?php echo e(trans("mb.timeTable")); ?></label>
                        <input name="duration_hour" id="duration_hour" type="number" class="form-control col-2 ml-1"
                               placeholder="<?php echo e(trans("mb.hour")); ?>" min="0"
                               value="<?php echo e($ticket->duration_hour ?? old("duration_hour")); ?>">
                        <span class="m-1">ساعت</span>
                        <input name="duration_day" id="duration_day" type="number" class="form-control col-2"
                               placeholder="<?php echo e(trans("mb.day")); ?>" min="0"
                               value="<?php echo e($ticket->duration_day ?? old("duration_day")); ?>">
                        <span class="m-1">روز</span>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/forms/formSetTimes.blade.php ENDPATH**/ ?>
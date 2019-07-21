<div class="col-10 offset-1">
    <div class="card-content collpase show">
        <div class="card-body">
            <div class="card-text">
                <?php echo $__env->make('fragments.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <form class="form form-horizontal" action="<?php echo e(url("/tickets/reffral/$ticket->id")); ?>" method="post"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php if(isset($ticket->id)): ?>
                    <?php echo e(method_field('PUT')); ?>

                <?php endif; ?>
                <input type="hidden" name="user_id" id="user_id" value="<?php echo e(auth::user()->id); ?>">
                <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo e($ticket->ticket_id); ?>">
                <div class="form-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                                    <textarea name="comment" id="comment" class="form-control">
                                       <?php echo e(old('comment')); ?>

                                    </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 label-control"><?php echo e(trans("mb.user")); ?></label>
                        <div class="col-md-6">
                            <select class="form-control" name="receiver_id" id="receiver_id">
                                <option></option>
                                <?php $__currentLoopData = $authorise_user_reffral; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($current_user->id != $user->id): ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
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
                    <div class="form-group row">
                        <label class="col-2 label-control"><?php echo e(trans("mb.timeTable")); ?></label>
                        <input name="duration_hour" id="duration_hour" type="number" class="form-control col-2 ml-1"
                               placeholder="<?php echo e(trans("mb.hour")); ?>" min="0"
                               value="<?php echo e($ticket->duration_hour ?? old("duration_hour")); ?>">
                        <span class="m-1">ساعت</span>
                        <input name="duration_day" id="duration_day" type="number" class="form-control col-2"
                               placeholder="<?php echo e(trans("mb.day")); ?>" min="0"
                               value="<?php echo e($ticket->duration_day ?? old("duration_day")); ?>">
                        <span class="m-1">روز</span>

                        <p class="col-3 label-control m-1"><?php echo e(date_shamsi($ticket->duration)); ?></p>
                    </div>

                </div>
                <?php echo $__env->make('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/forms/formReffral.blade.php ENDPATH**/ ?>
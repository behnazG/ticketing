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

                </div>
                <?php echo $__env->make('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/forms/formReffral.blade.php ENDPATH**/ ?>
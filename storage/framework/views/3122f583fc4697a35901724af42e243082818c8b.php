<?php if($errors->any()): ?>
    <div class="alert alert-asa">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="white" aria-hidden="true">×</span>
        </button>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li> <?php echo e($error); ?> </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/fragments/error.blade.php ENDPATH**/ ?>
<?php
$genderList=[
    0=>trans('mb.unknown'),
    1=>trans('mb.man'),
    2=>trans('mb.woman')
]
?>
<label class="col-md-2 col-sm-3 label-control" for="gender"><?php echo e(trans('mb.gender')); ?></label>
<div class="col-md-4">
    <div class="row skin skin-square">
        <?php $__currentLoopData = $genderList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <fieldset>
                    <input type="radio" id="gender" name="gender"
                           value="<?php echo e($index); ?>" <?php echo e(old('type')==$index ?'checked':''); ?>>
                    <label for="gender"><?php echo e($value); ?></label>
                </fieldset>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/fragments/gender.blade.php ENDPATH**/ ?>
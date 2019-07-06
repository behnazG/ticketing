<?php
$list_categories = [];
foreach ($categories as $category) {
    $index = $category->id;
    $value = $category->name;
    if ($category->parent == 0)
        $list_categories[$index][0] = $value;
    else {
        $p = $category->parent;
        $list_categories[$p][$index] = $value;
    }
}
?>
<label class="col-md-2 label-control"
       for="category_id"><?php echo e(trans('mb.category')); ?></label>
<div class="col-md-4">
    <select id="category_id" name="category_id" class="select2 form-control">
        <?php $__currentLoopData = $list_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <optgroup label="<?php echo e($ll[0]); ?>">
                <?php $__currentLoopData = $ll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key !=0): ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(((old("category_id")==$key)||(!old("category_id") && $key==$model_categories->category_id))?"selected":""); ?> ><?php echo e($value); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </optgroup>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/fragments/categories.blade.php ENDPATH**/ ?>
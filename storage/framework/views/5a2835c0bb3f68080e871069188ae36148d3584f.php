<?php
$titlePage= trans('mb.edit').' '. $category["name"];
$breadcrumbs = [
    ['url' => '', 'name' => 'داشبورد'],
    ['url' => '/categories', 'name' => trans('mb.categories')],
    ['url' => '/categories/edit', 'name' => trans('mb.edit')],
    ['url' => '/categories/edit', 'name' =>  $category["name"]],
];
?>

<?php $__env->startSection('pageName',''); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('forms.formCategory',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'category_list'=>$category_list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blayout',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/category/edit.blade.php ENDPATH**/ ?>
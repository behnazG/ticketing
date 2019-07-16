<?php
$titlePage= trans('mb.edit').' '. $organizationChart["name"];
$breadcrumbs = [
    ['url' => '', 'name' => 'داشبورد'],
    ['url' => '/organizationCharts', 'name' => trans('mb.organizationCharts')],
    ['url' => '/organizationCharts/edit', 'name' => trans('mb.edit')],
    ['url' => '/organizationCharts/edit', 'name' =>  $organizationChart["name"]],
];
?>

<?php $__env->startSection('pageName',''); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('forms.formOrganizationChart',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'organizationChart'=>$organizationChart], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blayout',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/organizationChart/edit.blade.php ENDPATH**/ ?>
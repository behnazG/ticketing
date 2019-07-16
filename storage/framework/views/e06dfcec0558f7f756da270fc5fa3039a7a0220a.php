<?php
$titlePage = trans('mb.create', ['name' => trans('mb.hotel')]);
$breadcrumbs = [
    ['url' => '/', 'name' => 'داشبورد'],
    ['url' => '/hotel', 'name' => trans('mb.hotels')],
    ['url' => '/hotel/create', 'name' => $titlePage],
];
?>

<?php $__env->startSection('pageName',''); ?>
<?php echo $__env->make('forms.formHotel',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'hotel'=>$hotel], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.blayout',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/hotel/create.blade.php ENDPATH**/ ?>
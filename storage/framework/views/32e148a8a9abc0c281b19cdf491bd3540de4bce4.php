<?php
$titlePage = trans('mb.create', ['name' => trans('mb.user')]);
$breadcrumbs = [
    ['url' => '/', 'name' => 'داشبورد'],
    ['url' => '/user', 'name' => trans('mb.users')],
    ['url' => '/user/create', 'name' => $titlePage],
];
?>

<?php $__env->startSection('pageName',''); ?>
<?php echo $__env->make('forms.formUser',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'user'=>$user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.blayout',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/user/create.blade.php ENDPATH**/ ?>
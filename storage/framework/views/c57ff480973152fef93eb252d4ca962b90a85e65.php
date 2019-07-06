<?php
$titlePage = trans('mb.edit') . ' ' . $user["name"];
$breadcrumbs = [
    ['url' => '', 'name' => 'داشبورد'],
    ['url' => '/users', 'name' => trans('mb.users')],
    ['url' => '/users/edit', 'name' => trans('mb.edit')],
    ['url' => '/users/edit', 'name' => $user["name"]],
];
?>

<?php $__env->startSection('pageName',''); ?>
<?php echo $__env->make('forms.formUser',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'user'=>$user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.blayout',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/user/edit.blade.php ENDPATH**/ ?>
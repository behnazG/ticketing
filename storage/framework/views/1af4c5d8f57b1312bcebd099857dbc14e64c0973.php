<?php
$titlePage = trans('mb.edit') . ' ' . $hotel["name"];
$breadcrumbs = [
    ['url' => '', 'name' => 'داشبورد'],
    ['url' => '/hotels', 'name' => trans('mb.hotels')],
    ['url' => '/hotels/edit', 'name' => trans('mb.edit')],
    ['url' => '/hotels/edit', 'name' => $hotel["name"]],
];
?>

<?php $__env->startSection('pageName',''); ?>
<?php echo $__env->make('forms.formHotel',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'hotel'=>$hotel], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.blayout',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/hotel/edit.blade.php ENDPATH**/ ?>
<?php
$titlePage = trans('mb.create', ['name' => trans('mb.category')]);
$breadcrumbs = [
    ['url' => '/admin', 'name' => 'داشبورد'],
    ['url' => '/admin/category', 'name' => trans('mb.categories')],
    ['url' => '/admin/category/create', 'name' => $titlePage],
];
?>

<?php $__env->startSection('pageName',''); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function () {
            $('input').on('ifChanged', function (event) {
                var n = this.name;
                var t = this.type;
                var flag = $(this).is(":checked");
                if (t == "radio") {

                } else if (t == "checkbox") {
                    if (n == "valid" || n == "active") {
                        change_label(flag, n);
                    }
                }
            });
            function change_label(flag, inputName) {
                var l_n = "label_" + inputName;
                switch (inputName) {
                    case "valid":
                        if (flag == true)
                            $('#' + l_n).html("<?php echo e(trans('mb.valid')); ?>");
                        else
                            $('#' + l_n).html("<?php echo e(trans('mb.invalid')); ?>");
                        break;
                    case "active":
                        if (flag == true)
                            $('#' + l_n).html("<?php echo e(trans('mb.active')); ?>");
                        else
                            $('#' + l_n).html("<?php echo e(trans('mb.deactive')); ?>");
                        break;
                }
            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('forms.formCategory',['formTitle'=>$titlePage,'submitText'=>trans('mb.save'),'category'=>$category,'category_list'=>$category_list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blayout',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/category/create.blade.php ENDPATH**/ ?>
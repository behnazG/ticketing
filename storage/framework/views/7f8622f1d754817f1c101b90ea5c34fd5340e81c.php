<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor/unisharp/laravel-ckeditor/adapters/jquery.js")); ?>"></script>
    <script>
        $('textarea').ckeditor(
            {
                language: 'fa',
                // uiColor: '#9AB8F3'
                toolbarGroups: [
                    { name: 'document', groups: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },
                    { name: 'clipboard', groups: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                    { name: 'basicstyles', groups: [ 'Bold', 'Italic' ] },
                    { name: 'links', groups: [ 'Link', 'Unlink','Anchor'] },
                    { name: 'styles', groups: [ 'Styles', 'format'] },
                    '/',
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'align', 'bidi' ] },
                    { name: 'styles' },
                ],
                removeButtons: 'Anchor,blocks',

            }
        );
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <?php echo $__env->make('forms.formTicket',['formTitle'=>trans('mb.compose'),'submitText'=>trans('mb.send')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.bmail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/ticket/compose.blade.php ENDPATH**/ ?>
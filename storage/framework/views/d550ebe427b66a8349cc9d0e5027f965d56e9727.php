<?php if(Session::has('message')): ?>
    <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="white" aria-hidden="true">×</span>
        </button>
        <?php echo e(Session::get('message')); ?>

    </p>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/fragments/alert.blade.php ENDPATH**/ ?>
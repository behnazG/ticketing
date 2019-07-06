<?php if(Session::has('message')): ?>
    <?php if( Session::get('message')==1): ?>
        <div class="alert  bg-success alert-icon-left alert-dismissible mb-2" role="alert">
							<span class="alert-icon">
								<i class="ft-thumbs-up"></i>
							</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong><?php echo e(trans("mb.wellDone")); ?></strong> <?php echo e(trans('mb.success',["modelName"=>Session::get('modelName')])); ?>

            <a href="#" class="alert-link">important</a> alert message.
        </div>
    <?php elseif(Session::get('message')==0): ?>
        <div class="alert  bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
							<span class="alert-icon">
								<i class="ft-thumbs-down"></i>
							</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong><?php echo e(trans("mb.sorry")); ?></strong> <?php echo e(trans('mb.success',["modelName"=>Session::get('modelName')])); ?>

            <a href="#" class="alert-link">few things up</a> and submit again.
        </div>
    <?php else: ?>
        <div class="alert  alert-<?php echo e(Session::get('alert-class', 'info')); ?> alert-icon-left alert-dismissible mb-2"
             role="alert">
							<span class="alert-icon">
								<i class="ft-info"></i>
							</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <?php echo e(Session::get('message')); ?>

        </div>
    <?php endif; ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/fragments/message.blade.php ENDPATH**/ ?>
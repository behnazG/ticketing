<?php if(isset($showValidMessage)): ?>
    <?php if($showValidMessage==1): ?>
        <span class="success"><i class="ft-check-square"></i> <?php echo e(__('mb.valid')); ?></span>
    <?php else: ?>
        <span class="danger"><i class="ft-square"></i> <?php echo e(__('mb.invalid')); ?></span>
    <?php endif; ?>
<?php else: ?>
    <?php if(!isset($showLabel) || $showLabel==true): ?>
        <label class="col-md-2 label-control"><?php echo e(trans('mb.validStatus')); ?></label>
    <?php endif; ?>
    <div class="col-md-4">
        <div class="row skin skin-square">
            <div class="col-md-12 col-sm-12">
                <fieldset>
                    <input type="checkbox" name="valid"
                           id="valid" <?php echo e((old('valid')==1 ||(isset($isValid)&&$isValid==1)) ?'checked':''); ?> >
                    <label for="valid"
                           id="label_valid"><?php echo e((old('valid')==1||(isset($isValid)&&$isValid==1))?trans('mb.valid'):trans('mb.invalid')); ?></label>
                </fieldset>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\asa\resources\views/fragments/valid.blade.php ENDPATH**/ ?>
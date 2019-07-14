<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('password.email')); ?>">
            <?php echo csrf_field(); ?>


            <fieldset class="form-group position-relative has-icon-left">
                <input type="email"
                       class="form-control round  <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                       id="email" name="email"
                       placeholder="<?php echo e(__('mb.E-MailAddress')); ?>" value="<?php echo e(old('email')); ?>"
                       required autocomplete="email" autofocus>
                <div class="form-control-position">
                    <i class="ft-user"></i>
                </div>
                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </fieldset>
            <div class="form-group row">
                <div class="col-md-6 col-12 text-center text-sm-right">
                    <a class="card-link" href="<?php echo e(route('login')); ?>">
                        <?php echo e(__('mb.Login')); ?>

                    </a>

                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn round btn-block btn-glow btn-login col-12 mr-1 mb-1">
                    <?php echo e(__('mb.Send Password Reset Link')); ?>

                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>
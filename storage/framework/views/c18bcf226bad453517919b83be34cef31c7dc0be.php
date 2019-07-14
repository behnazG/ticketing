<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('login')); ?>" class="form-horizontal">
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
            <fieldset class="form-group position-relative has-icon-left">
                <input type="password"
                       class="form-control round  <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                       id="password"
                       placeholder="<?php echo e(__('mb.password')); ?>" name="password" required
                       autocomplete="current-password">
                <div class="form-control-position">
                    <i class="ft-lock"></i>
                </div>
                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </fieldset>
            <div class="form-group row">
                <div class="col-md-6 col-12 text-center text-sm-right">
                    <?php if(Route::has('password.request')): ?>
                        <a class="card-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('mb.ForgotYourPassword?')); ?>

                        </a>

                    <?php endif; ?>

                </div>
                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">

                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit"
                        class="btn round btn-block btn-glow btn-login col-12 mr-1 mb-1">
                    <?php echo e(__('mb.Login')); ?>

                </button>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/auth/login.blade.php ENDPATH**/ ?>
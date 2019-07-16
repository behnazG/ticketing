<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset("vendor/jalaliDatePick/jquery.md.bootstrap.datetimepicker.style.css")); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
    <script src="<?php echo e(asset("vendor/jalaliDatePick/jquery.md.bootstrap.datetimepicker.js")); ?>"></script>
<?php $__env->stopSection(); ?>
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

            $('#expire_date_fa').MdPersianDateTimePicker({
                targetTextSelector: '#expire_date_fa',
                targetDateSelector: '#expire_date',
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-md-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-card-center"><?php echo e($formTitle); ?></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text">
                            <?php echo $__env->make('fragments.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <form class="form form-horizontal" action="<?php echo e(url("/hotels/$hotel->id")); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($hotel->id)): ?>
                                <?php echo e(method_field('PUT')); ?>

                            <?php endif; ?>
                            <div class="form-body">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ln): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ($nm = 'name_'. $ln->short_name); ?>
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control"
                                               for="name_<?php echo e($ln->short_name); ?>"><?php echo e(trans('mb.name').' '.$ln->name); ?></label>
                                        <div class="col-md-4">
                                            <input type="text" id="name_<?php echo e($ln->short_name); ?>" class="form-control"
                                                   placeholder="<?php echo e(trans('mb.name').' '.$ln->name); ?>"
                                                   name="name_<?php echo e($ln->short_name); ?>"
                                                   value="<?php echo e(isset($names[$nm])? $names[$nm]:old('name_'.$ln->short_name)); ?>">
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control"
                                           for="province_id"><?php echo e(trans('mb.province')); ?></label>
                                    <div class="col-md-4">
                                        <select id="province_id" class="form-control select2" name="province_id">
                                            <option></option>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($provice->id); ?>"
                                                        <?php echo e(old('province_id')==$provice->id || (!old('province_id')&& $hotel->province_id==$provice->id)?'selected':''); ?>

                                                ><?php echo e($provice->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <label class="col-md-2 label-control" for="city_id"><?php echo e(trans('mb.city')); ?></label>
                                    <div class="col-md-4">
                                        <select id="city_id" class="form-control select2" name="city_id">
                                            <option></option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($city->id); ?>"
                                                        <?php echo e(old('city_id')==$city->id || (!old('city_id')&& $hotel->city_id==$city->id)?'selected':''); ?>

                                                ><?php echo e($city->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="email"><?php echo e(trans('mb.email')); ?></label>
                                    <div class="col-md-4">
                                        <input type="email" id="email" class="form-control"
                                               placeholder="<?php echo e(trans('mb.email')); ?>"
                                               name="email" value="<?php echo e($hotel->email??old('email')); ?>">
                                    </div>
                                    <label class="col-md-2 label-control"
                                           for="sms_receiver_num"><?php echo e(trans('mb.smsReceiverNum')); ?></label>
                                    <div class="col-md-4">
                                        <input type="text" id="sms_receiver_num" class="form-control"
                                               placeholder="<?php echo e(trans('mb.smsReceiverNum')); ?>"
                                               name="sms_receiver_num"
                                               value="<?php echo e($hotel->sms_receiver_num??old('sms_receiver_num')); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="phone"><?php echo e(trans('mb.phone')); ?></label>
                                    <div class="col-md-4">
                                        <input type="text" id="phone" class="form-control"
                                               placeholder="<?php echo e(trans('mb.phone')); ?>"
                                               name="phone" value="<?php echo e($hotel->phone??old('phone')); ?>">
                                    </div>
                                </div>
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ($nm = 'address_'. $lang->short_name); ?>
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control"
                                               for="address_<?php echo e($lang->short_name); ?>"><?php echo e(trans('mb.address').' '.$lang->name); ?></label>
                                        <div class="col-md-10">
                                            <input type="text" id="address_<?php echo e($lang->short_name); ?>" class="form-control"
                                                   placeholder="<?php echo e(trans('mb.address').' '.$lang->name); ?>"
                                                   name="address_<?php echo e($lang->short_name); ?>"
                                                   value="<?php echo e(isset($address[$nm])? $address[$nm]:old('address_'.$ln->short_name)); ?>">
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control"
                                           for="expire_date_fa"><?php echo e(trans('mb.expireDate')); ?></label>
                                    <div class="col-md-4">
                                        <input type="text" id="expire_date_fa" class="form-control"
                                               placeholder="<?php echo e(trans('mb.expireDate')); ?>"
                                               name="expire_date_fa"
                                               value="<?php echo e($hotel->expire_date_fa??old('expire_date_fa')); ?>">
                                        <input type="hidden" name="expire_date" id="expire_date">
                                    </div>
                                    <?php echo $__env->make('fragments.valid',['isValid'=>$hotel->valid], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <?php echo $__env->make('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/hotels'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/forms/formHotel.blade.php ENDPATH**/ ?>
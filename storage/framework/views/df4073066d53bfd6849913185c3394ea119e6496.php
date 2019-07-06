<?php
$titlePage = trans("mb.authoriseTo", ["name" => $user["name"]]);
$breadcrumbs = [
    ['url' => '/', 'name' => 'داشبورد'],
    ['url' => '/users/staffs', 'name' => trans('mb.users')],
    ['url' => '/users/' . $user->id . '/authorise', 'name' => trans("mb.authoriseTo", ["name" => $user["name"]])],
];
?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript"
            src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/scripts/tables/datatables/datatable-basic.min.js')); ?>"
            type="text/javascript"></script>
    <script src="<?php echo e(asset("app-assets/js/scripts/navs/navs.min.js")); ?>" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $(".select_all").on('click', function () {
                var class_name = $(this).data('class');
                $("." + class_name).iCheck('check');
            })
            $(".unselect_all").on('click', function () {
                var class_name = $(this).data('class');
                $("." + class_name).iCheck('uncheck');
            })
        });
    </script>
    <?php echo $__env->make('fragments.js.delete',["title"=>trans('mb.user'),"url"=>"users"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-md-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e($user->name); ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1"
                                   href="#tab1" aria-expanded="true"><i class="fa fa-hotel"></i>
                                    &nbsp;<?php echo e(' '.trans("mb.hotels")); ?> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
                                   aria-expanded="false"><i class="ft-layers"></i> &nbsp;<?php echo e(trans("mb.categories")); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3"
                                   aria-expanded="false"><i class="ft-more-horizontal"></i> &nbsp;<?php echo e(trans("mb.others")); ?>

                                </a>
                            </li>
                        </ul>
                        <form action="/authorises/<?php echo e($user->id); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('put')); ?>

                            <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
                                     aria-labelledby="base-tab1">
                                    <div class="col-12">
                                        <div class="row form-group mt-3">
                                            <div class="col-12 row">
                                                <div class="col-6">
                                                    
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button type="button" class="btn btn-outline-light select_all"
                                                            data-class="checkbox_hotel">
                                                        <i class="ft-check-square"></i> <?php echo e(trans('mb.selectAll')); ?>

                                                    </button>&nbsp;
                                                    <button type="button" class="btn btn-outline-light unselect_all"
                                                            data-class="checkbox_hotel">
                                                        <i class="ft-square"></i> <?php echo e(trans('mb.unSelectAll')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-4">
                                                    <div class="row skin skin-square">
                                                        <div class="col-md-12 col-sm-12">
                                                            <fieldset>
                                                                <input type="checkbox" name="hotel_<?php echo e($hotel->id); ?>"
                                                                       class="checkbox_hotel"
                                                                       <?php echo e(old("hotel_".$hotel->id) || (!old("hotel_".$hotel->id) && in_array($hotel->id,$old_hotels))?'checked':''); ?>

                                                                       id="hotel_<?php echo e($hotel->id); ?>">
                                                                <label for="hotel_<?php echo e($hotel->id); ?>"
                                                                       id="label_hotel_<?php echo e($hotel->id); ?>"><span
                                                                            class=""><?php echo e($hotel->name); ?></span><?php echo e(' - '.$hotel->province_name.' - '.$hotel->city_name.''); ?>

                                                                </label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                    <div class="col-12">
                                        <div class="row form-group mt-3">
                                            <div class="col-12 row">
                                                <div class="col-6">
                                                    
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button type="button" class="btn btn-outline-light select_all"
                                                            data-class="checkbox_category">
                                                        <i class="ft-check-square"></i> <?php echo e(trans('mb.selectAll')); ?>

                                                    </button>&nbsp;
                                                    <button type="button" class="btn btn-outline-light unselect_all"
                                                            data-class="checkbox_category">
                                                        <i class="ft-square"></i> <?php echo e(trans('mb.unSelectAll')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">

                                        </div>
                                        <div class="row form-group">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-4">
                                                    <div class="row skin skin-square">
                                                        <div class="col-md-12 col-sm-12">
                                                            <fieldset>
                                                                <input type="checkbox" name="category_<?php echo e($category->id); ?>"
                                                                       id="category_<?php echo e($category->id); ?>"
                                                                       <?php echo e(old("category_".$category->id) || (!old("category_".$category->id) && in_array($category->id,$old_categories))?'checked':''); ?>

                                                                       class="checkbox_category">
                                                                <label for="category_<?php echo e($category->id); ?>"
                                                                       id="label_category_<?php echo e($category->id); ?>"><span
                                                                            class=""><?php echo e($category->name); ?></span></label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                                    <div class="row form-group mt-3">
                                        <div class="col-12">
                                            <div class="row skin skin-square">
                                                <div class="col-12">
                                                    <fieldset>
                                                        <input type="checkbox" name="allow_referral"
                                                               <?php echo e(old("allow_referral") || (!old("allow_referral") && $old_allow_referral==1)?'checked':''); ?>

                                                               class="checkbox_hotel" id="allow_referral">
                                                        <label for="allow_referral"
                                                               id="allow_referral"><span
                                                                    class=""><?php echo e(trans('mb.allowReferrals')); ?></span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12">
                                                    <fieldset>
                                                        <input type="checkbox" name="view_pending_ticket"
                                                               <?php echo e(old("view_pending_ticket") || (!old("view_pending_ticket") && $old_view_pending_ticket==1)?'checked':''); ?>

                                                               class="checkbox_hotel" id="view_pending_ticket">
                                                        <label for="view_pending_ticket"
                                                               id=""><span
                                                                    class=""><?php echo e(trans('mb.viewPendingTicket')); ?></span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12">
                                                    <fieldset>
                                                        <input type="checkbox" name="view_in_progress_ticket"
                                                               <?php echo e(old("view_in_progress_ticket") || (!old("view_in_progress_ticket") && $old_view_in_progress_ticket==1)?'checked':''); ?>

                                                               class="checkbox_hotel" id="view_in_progress_ticket">
                                                        <label for="view_in_progress_ticket"
                                                               id=""><span
                                                                    class=""><?php echo e(trans('mb.viewInProgressTicket')); ?></span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12">
                                                    <fieldset>
                                                        <input type="checkbox" name="view_closed"
                                                               <?php echo e(old("view_closed") || (!old("view_closed") && $old_view_closed==1)?'checked':''); ?>

                                                               class="checkbox_hotel" id="view_closed">
                                                        <label for="view_closed"
                                                               id=""><span
                                                                    class=""><?php echo e(trans('mb.viewClosedTicket')); ?></span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12">
                                                    <fieldset>
                                                        <input type="checkbox" name="set_times"
                                                               <?php echo e(old("set_times") || (!old("set_times") && $old_set_times==1)?'checked':''); ?>

                                                               class="checkbox_hotel" id="set_times">
                                                        <label for="set_times"
                                                               id=""><span
                                                                    class=""><?php echo e(trans('mb.setExpireDateAndTimeTable')); ?></span>
                                                        </label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $__env->make('fragments.submitPart',["submitText"=>trans('mb.authorise'),"giveUpUrl"=>"/users/staffs"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/user/authorise.blade.php ENDPATH**/ ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript"
            src="<?php echo e(asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/scripts/tables/datatables/datatable-basic.min.js')); ?>"
            type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable(
                {
                    "paging": false,
                    "ordering": false,
                    "info": false,
                    "searching": false
                }
            );
        });
    </script>
    <?php echo $__env->make('fragments.js.delete',["title"=>trans('mb.hotel'),"url"=>"hotels"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-md-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-card-center"><?php echo e(trans('mb.hotels')); ?></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="row ">
                            <div class="form-group col-12">
                                <a class="btn  btn-asa box-shadow-2  btn-min-width pull-right"
                                   href="<?php echo e(url("hotels/create")); ?>">
                                    <i class="ft-plus-square"></i> <?php echo e(trans("mb.add",["name"=>trans('mb.hotel')])); ?>

                                </a>
                            </div>
                        </div>
                        <div class="card-text">
                            <?php echo $__env->make('fragments.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap mt-2">
                            <thead>
                            <tr>
                                <th class="col-md-7"><?php echo e(trans('mb.name')); ?></th>
                                <th class="col-md-7"><?php echo e(trans('mb.province')); ?></th>
                                <th class="col-md-7"><?php echo e(trans('mb.city')); ?></th>
                                <th class="col-md-2"><?php echo e(trans('mb.valid')); ?></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="row_<?php echo e($hotel->id); ?>">
                                    <td><?php echo e($hotel->name); ?></td>
                                    <td><?php echo e($hotel->province_name); ?></td>
                                    <td><?php echo e($hotel->city_name); ?></td>
                                    <td><?php echo $__env->make('fragments.valid',['showValidMessage'=>$hotel->valid], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                                    <td><?php echo $__env->make('fragments.edit',['id'=>$hotel->id,'url'=>'hotels'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                                    <td><?php echo $__env->make('fragments.delete',['id'=>$hotel->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($hotels->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/hotel/index.blade.php ENDPATH**/ ?>
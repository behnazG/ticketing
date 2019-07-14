<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-1"><?php echo e(trans("mb.newTicket")); ?></span>
                                        <h1 class="success mb-0"><?php echo e($count_ticket); ?></h1>
                                    </div>
                                    <div class="align-self-top">
                                        <i class="ft-tag icon-opacity success font-large-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header p-1">
                    <h4 class="card-title float-left"><?php echo e(trans("mb.myTicket")); ?></h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-footer text-center p-1">
                        <div class="row">
                            <?php $__currentLoopData = $ticket_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-2 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                    <a href="<?php echo e(url('tickets/inbox/'.$index)); ?>">
                                        <p class="blue-grey lighten-2 mb-0">
                                            <i class="<?php echo e($status[2]); ?>   <?php echo e($status[1]); ?> font-large-1"></i>
                                            <span
                                                    class="d-block mb-1 mt-1"><?php echo e($status[0]); ?></span>
                                        </p>
                                    </a>
                                    <p class="font-medium-5 text-bold-400"><?php echo e($ticket_status_user[$index]); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <hr>
                        <span class="text-muted"><a class="success " href="<?php echo e(url('tickets/inbox/')); ?>"><i
                                        class="ft-tag icon-opacity"></i><u><?php echo e(trans("mb.allTickets")); ?></u></a></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header p-1">
                    <h4 class="card-title float-left"><?php echo e(trans("mb.lastUpdate")); ?></h4>
                </div>
                <div class="card-content collapse show">
                    <div id="accordion">
                        <?php $__currentLoopData = $last_updates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$last_update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapse<?php echo e($i); ?>"
                                                aria-expanded="true" aria-controls="collapse<?php echo e($i); ?>">
                                         <?php echo e($last_update->subject); ?>

                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse<?php echo e($i); ?>" class="collapse" aria-labelledby="heading<?php echo e($i); ?>"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                       <?php echo e($last_update->description); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.blayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/welcome.blade.php ENDPATH**/ ?>
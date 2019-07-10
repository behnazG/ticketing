<?php $__env->startSection('content'); ?>
    <div class="card" style="">
        <div class="card-content">
            <div id="recent-projects" class="media-list position-relative">
                <div class="table-responsive">
                    <table class="table table-padded table-xl mb-0" id="recent-project-table">
                        <thead>
                        <tr>
                            <th class="border-top-0"></th>
                            <th class="border-top-0"></th>
                            <th class="border-top-0"></th>
                            <th class="border-top-0"></th>
                            <?php if($user->is_staff!=1): ?>
                                <th class="border-top-0"><?php echo e(trans("mb.hotel")); ?></th>
                            <?php endif; ?>
                            <th class="border-top-0"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($ticket->category->name); ?></td>
                                <td class="border-top-0 <?php echo e($ticket_status[$ticket->status][1]); ?>"><i class="<?php echo e($ticket_status[$ticket->status][2]); ?>"></i> <?php echo e($ticket_status[$ticket->status][0]); ?></td>
                                <td class="border-top-0"><?php echo e(($ticket->front_user==false)?trans("mb.unknown"):$ticket->front_user->name); ?></td>
                                <td class="border-top-0"><a href="<?php echo e(url("/tickets/".$ticket->generate_ticket_id())); ?>"><?php echo e($ticket->subject); ?></a></td>
                                <?php if($user->is_staff!=1): ?>
                                    <td class="border-top-0"><?php echo e(trans("mb.hotel")); ?></td>
                                <?php endif; ?>
                                <td class="border-top-0"><?php echo e(date_sh($ticket->created_at)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.bmail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/ticket/index.blade.php ENDPATH**/ ?>
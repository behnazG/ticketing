<?php $__env->startSection('content'); ?>
    <?php echo $__env->make("fragments.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card" style="">
        <div class="card-content">
            <div id="recent-projects" class="media-list position-relative">
                <div class="table-responsive">
                    <table class="table table-padded table-xl mb-0" id="recent-project-table">
                        <thead>
                        <tr class="text-center">
                            <th class="border-top-0"><?php echo e(trans("mb.ticketNumber")); ?></th>
                            <th class="border-top-0"><?php echo e(trans("mb.category")); ?></th>
                            <th class="border-top-0"><?php echo e(trans("mb.from")); ?></th>
                            <th class="border-top-0"><?php echo e(trans("mb.subject")); ?></th>
                            <th class="border-top-0"><?php echo e(trans('mb.time')); ?></th>
                            <th class="border-top-0"><?php echo e(trans('mb.expireDateTicket')); ?></th>
                            <th class="border-top-0"><?php echo e(trans("mb.status")); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <th class="border-top-0"><a
                                            href="<?php echo e(url("/tickets/".$ticket->generate_ticket_id())); ?>"><?php echo e($ticket->id); ?></a>
                                </th>
                                <td><?php echo e($ticket->category->name); ?></td>
                                <td class="border-top-0">
                                    <?php echo e(($ticket->sender==false)?trans("mb.unknown"):$ticket->sender->name); ?><br/>
                                    <?php echo e(trans('mb.hotel').' '); ?>

                                    <?php echo e(is_null($ticket->hotel)?trans('mb.unknown'):$ticket->hotel->name); ?>

                                </td>
                                <td class="border-top-0"><a
                                            href="<?php echo e(url("/tickets/".$ticket->generate_ticket_id())); ?>"><?php echo e($ticket->subject); ?></a>
                                </td>
                                <td class="border-top-0"><?php echo e(date_sh($ticket->created_at)); ?>

                                    <br/><?php echo e(date_shamsi($ticket->created_at)); ?></td>
                                <td class="border-top-0"><?php echo e(date_sh($ticket->expire_date)); ?>

                                    <br/><?php echo e(date_shamsi($ticket->expire_date,"Y-m-d")); ?></td>
                                <td class="border-top-0 <?php echo e($ticket_status[$ticket->status][1]); ?>"><i
                                            class="<?php echo e($ticket_status[$ticket->status][2]); ?>"></i> <?php echo e($ticket_status[$ticket->status][0]); ?>

                                </td>
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
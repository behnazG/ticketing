<?php $__env->startSection('content'); ?>
    <h4><?php echo e($ticket->subject); ?></h4>
    <h5><?php echo e(trans('mb.ticketStatus').': '.\App\Ticket::STATUS_LIST($ticket->status)[0]); ?></h5>
    <?php $__currentLoopData = $chains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <h6><?php echo e(trans('mb.from').' '.$t->sender->name .' '.trans('mb.date').' '.date_shamsi($t->created_at,"Y-m-d")); ?></h6>
       <?=$t->text?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\asa\resources\views/ticket/print.blade.php ENDPATH**/ ?>
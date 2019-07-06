<div class="col-10 offset-1">
    <div class="card-content collpase show">
        <div class="card-body">
            <div class="card-text">
                <table class="table table-striped bg-dark mb-0 white">
                    <thead>
                    <tr>
                        <th><?php echo e(trans("mb.type")); ?></th>
                        <th><?php echo e(trans("mb.user")); ?></th>
                        <th><?php echo e(trans("mb.more")); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!$ticket_time_log->isEmpty()): ?>
                        <?php $__currentLoopData = $ticket_time_log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($t_l->type_name); ?></td>
                                <td><?php echo e($t_l->user_full_name); ?></td>
                                <td>
                                    <?php if($t_l->type == 1): ?>
                                        <p>

                                            <?php echo e(trans("mb.sentTo")." ".$t_l->receiver_full_name); ?>

                                        </p>
                                        <p>
                                            <?=$t_l->comment?>
                                        </p>
                                        <p>
                                            <?php echo e(trans("mb.status").": ".$status_list[$t_l->ticket_status][0]); ?>

                                        </p>
                                    <?php elseif($t_l->type==2): ?>
                                        <p>
                                            <?php echo e(trans("mb.startWork").": "); ?>

                                            <?php if(!is_null($t_l->start_time_system)): ?>
                                                <?php echo e(date_shamsi($t_l->start_time_system)); ?>

                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php echo e(trans("mb.endWork").": "); ?>

                                            <?php if(!is_null($t_l->end_time_system)): ?>
                                                <?php echo e(date_shamsi($t_l->end_time_system)); ?>

                                            <?php endif; ?>
                                        </p>
                                    <?php elseif($t_l->type==4): ?>
                                        <p>
                                            <?php echo e(trans("mb.userTime").": "); ?>

                                            <?php if(!is_null($t_l->time_user)): ?>
                                                <?php echo e($t_l->time_user); ?>

                                            <?php endif; ?>
                                        </p>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/ticket/show_workTime.blade.php ENDPATH**/ ?>
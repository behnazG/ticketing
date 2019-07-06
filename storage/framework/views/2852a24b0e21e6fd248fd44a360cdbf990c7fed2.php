<div class="card-content collpase show">
    <div class="card-body">
        <div class="card-text">
            <?php echo $__env->make('fragments.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <form class="form form-horizontal" action="<?php echo e(url("/tickets/replay/$ticket->id")); ?>" method="post"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($ticket->id)): ?>
                <?php echo e(method_field('PUT')); ?>

            <?php endif; ?>
            <input type="hidden" name="sender_id" id="sender_id" value="<?php echo e(auth::user()->id); ?>">
            <input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo e($current_user->is_staff?$current_ticket->sender_id:$current_ticket->receiver_id); ?>">
            <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo e($ticket->generate_ticket_id()); ?>">
            <div class="form-body">
                <div class="form-group row">
                    <div class="col-md-12">
                                    <textarea name="text" id="text" class="form-control">
                                       <?php echo e($ticket->text??old('text')); ?>

                                    </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 form-group">
                        <blockquote class="blockquote pl-1 border-left-red border-left-3 mt-1">
                            <ul>
                                <li> سایز فایل ها حداکثر 200 کیلوبایت باید باشد.</li>
                                <li> نوع فایل ها باید xls, xlm, xla, xlc, xlt, xlw, xlam, xlsb, xlsm, xltm, xlsx,
                                    doc, csv, docx, ppt, txt, text, bmp, gif, jpeg, jpg, jpe, png, rtf باشد
                                </li>
                            </ul>
                        </blockquote>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4 col-md-6 col-12"><?php echo $__env->make('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_1"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                    <div class="col-lg-4 col-md-6 col-12"><?php echo $__env->make('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_2"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                    <div class="col-lg-4 col-md-6 col-12"><?php echo $__env->make('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_3"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                </div>

            </div>
            <?php echo $__env->make('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </form>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/forms/formReplay.blade.php ENDPATH**/ ?>
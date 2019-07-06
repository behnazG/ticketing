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
                    <form class="form form-horizontal" action="<?php echo e(url("/tickets/$ticket->id")); ?>" method="post"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($ticket->id)): ?>
                            <?php echo e(method_field('PUT')); ?>

                        <?php endif; ?>
                        <input type="hidden" name="sender_id" id="sender_id" value="<?php echo e(auth::user()->id); ?>">
                        <input type="hidden" name="valid" id="valid" value="1">
                        <input type="hidden" name="status" id="status" value="0">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-2 label-control"
                                       for="organizational_chart_id"><?php echo e(trans('mb.organizationChart')); ?></label>
                                <div class="col-md-4">
                                    <select class="form-control select2" name="organizational_chart_id"
                                            id="organizational_chart_id">
                                        <option></option>
                                        <?php $__currentLoopData = $organizational_charts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization_chart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($organization_chart->id); ?>"
                                                    <?php echo e((old("organizational_chart_id")==$organization_chart->id ||(!old('organizational_chart_id') && $ticket->organizational_chart_id && $ticket->organizational_chart_id==$organization_chart->id)) ?"selected":""); ?>

                                            ><?php echo e($organization_chart->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php echo $__env->make('fragments.categories',['model_categories'=>$ticket], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="subject"><?php echo e(trans('mb.subject')); ?></label>
                                <div class="col-md-8">
                                    <input type="text" id="subject" class="form-control"
                                           placeholder="<?php echo e(trans('mb.subject')); ?>"
                                           name="subject" value="<?php echo e($ticket->subject??old('subject')); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="text"><?php echo e(trans('mb.text')); ?></label>
                                <div class="col-md-10">
                                    <textarea name="text" id="text" class="form-control">
                                       <?php echo e($ticket->text??old('text')); ?>

                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 label-control" for="text"><?php echo e(trans('mb.fileUpload')); ?></label>
                                <div class="col-lg-10 col-12 row">
                                    <div class="col-12 form-group">
                                        <blockquote class="blockquote pl-1 border-left-red border-left-3 mt-1">
                                          <ul>
                                              <li> سایز فایل ها حداکثر 200 کیلوبایت باید باشد.</li>
                                              <li> نوع فایل ها باید xls, xlm, xla, xlc, xlt, xlw, xlam, xlsb, xlsm, xltm, xlsx, doc, csv, docx, ppt, txt, text, bmp, gif, jpeg, jpg, jpe, png, rtf باشد</li>
                                          </ul>
                                        </blockquote>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12"><?php echo $__env->make('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_1"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                                    <div class="col-lg-4 col-md-6 col-12"><?php echo $__env->make('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_2"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                                    <div class="col-lg-4 col-md-6 col-12"><?php echo $__env->make('fragments.uploadFile',["showLabel"=>false,"field_name"=>"file_3"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                            </div>

                        </div>
                        <?php echo $__env->make('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/tickets'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/forms/formTicket.blade.php ENDPATH**/ ?>
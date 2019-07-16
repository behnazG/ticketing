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
                    <form class="form form-horizontal" action="<?php echo e(url("/categories/$category->id")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($category->id)): ?>
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
                                <label class="col-md-2 label-control" for="parent"><?php echo e(trans('mb.parent')); ?></label>
                                <div class="col-md-4">
                                    <select id="parent" name="parent" class="form-control">
                                        <option value="0" <?php echo e(old('parent')==0 ?'selected':''); ?> ></option>
                                        <?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->id); ?>" <?php echo e((old('parent')==$c->id||$category->parent==$c->id) ?'selected':''); ?> ><?php echo e($c->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php echo $__env->make('fragments.valid',['isValid'=>$category->valid], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <?php echo $__env->make('fragments.submitPart',['submitText'=>$submitText,'giveUpUrl'=>'/categories'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\asa\resources\views/forms/formCategory.blade.php ENDPATH**/ ?>
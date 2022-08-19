<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

    <link href="<?php echo e(URL::asset('/assets/libs/admin-resources/admin-resources.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('translation.Dashboards'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('translation.tenantsCategory'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    
    <?php echo $__env->make('tenantsCategory.inc.Add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <?php if(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong><?php echo e(session()->get('error')); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>




    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong><?php echo e($error); ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if(! $category->isEmpty()): ?>
        <div class="row">
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tenants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(app()->getLocale() == 'en'): ?>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom text-uppercase">
                                <div class="row">
                                    <div class="col"><?php echo e($tenants->tenants_category_name_en); ?></div>
                                    <div class="col">
                                        <a href="#" class="text-danger"> <i class=" far fa-trash-alt fa-lg" style="float: right"></i></a>
                                        <a href="#" class="text-primary"> <i class="far fa-edit fa-lg" style="float: right;padding-right: 6px"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo e($tenants->tenants_category_desc_en); ?>

                                </p>
                                <a href="javascript: void(0);"
                                   class="btn btn-primary waves-effect waves-light"><?php echo app('translator')->get('translation.Go To'); ?> <?php echo e($tenants->tenants_category_name_en); ?></a>
                            </div>
                            <div class="card-footer bg-transparent border-top text-muted">
                                <?php if($tenants->tenants_category_status): ?>
                                    <a href="#" class="badge badge-success bg-success"><?php echo app('translator')->get('translation.Active'); ?></a>
                                <?php else: ?>
                                    <a href="#" class="badge badge-danger bg-danger"><?php echo app('translator')->get('translation.Deactivate'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom text-uppercase">
                                <?php echo e($tenants->tenants_category_name_ar); ?>

                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo e($tenants->tenants_category_desc_ar); ?>

                                </p>
                                <a href="javascript: void(0);"
                                   class="btn btn-primary waves-effect waves-light"><?php echo app('translator')->get('translation.Go To'); ?> <?php echo e($tenants->tenants_category_name_ar); ?></a>
                            </div>
                            <div class="card-footer bg-transparent border-top text-muted">
                                <?php if($tenants->tenants_category_status): ?>
                                    <a href="#" class="badge badge-success bg-success"><?php echo app('translator')->get('translation.Active'); ?></a>
                                <?php else: ?>
                                    <a href="#" class="badge badge-danger bg-danger"><?php echo app('translator')->get('translation.Deactivate'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php echo app('translator')->get('translation.empty_category_message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/admin-resources/admin-resources.min.js')); ?>"></script>

    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/dashboard.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

    <script>
        const switcherButton = document.querySelector('#customSwitchsizemd')
        const selecterDiv = document.querySelector('#category_select')

        switcherButton.addEventListener('click', function(){
            if(switcherButton.checked === true){
                selecterDiv.style.display = "block";
            } else{
                selecterDiv.style.display = "none";
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/tenantsCategory/index.blade.php ENDPATH**/ ?>
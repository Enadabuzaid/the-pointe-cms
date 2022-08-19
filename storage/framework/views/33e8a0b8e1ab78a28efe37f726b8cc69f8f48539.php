<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Data_Tables'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Tenants <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Add Tenant <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Tenant Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Images </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block">SEO</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Tenant Banner</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <p class="mb-0">
                                    <form id="pristine-valid-example" novalidate method="post">
                                    <input type="hidden"/>
                                    <div class="row">

                                        <div class="col-xl-4 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <input type="text" required data-pristine-required-message="Please Enter a Tenant Name " class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <input type="text" required data-pristine-required-message="Please Enter a Tenant Name " class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <select type="text" required data-pristine-required-message="Please Enter a Tenant Name " class="form-control" >
                                                    <?php $__currentLoopData = $tenants_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option id="<?php echo e($category->tenant_category_id); ?>"><?php echo e($category->tenants_category_name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-12">
                                            <div class="form-group mb-3">
                                                <label>Description</label>
                                                <textarea name="tenant_description" required data-pristine-required-message="Please Enter a Description" class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                    <div class="form-group">
                                        <button  type="submit" class="btn btn-primary">Submit form</button>
                                    </div>
                                </form>
                                </p>
                            </div>
                            <div class="tab-pane" id="profile1" role="tabpanel">
                                <p class="mb-0">
                                     <div action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                        </div>

                                        <h5>Drop files here or click to upload.</h5>
                                    </div>
                                </div>
                                </p>
                            </div>
                            <div class="tab-pane" id="messages1" role="tabpanel">
                                <p class="mb-0">

                                </p>
                            </div>
                            <div class="tab-pane" id="settings1" role="tabpanel">
                                <p class="mb-0">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/pristinejs/pristinejs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/form-validation.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/tenants/create.blade.php ENDPATH**/ ?>
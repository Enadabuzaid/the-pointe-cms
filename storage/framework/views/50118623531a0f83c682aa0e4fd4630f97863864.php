<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Form_Editors'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Forms <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Form Editors <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ckeditor Classic editor</h4>
                <p class="card-title-desc">Example of Ckeditor Classic editor</p>
            </div>
            <div class="card-body">
                <div id="ckeditor-classic"></div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/@ckeditor/@ckeditor.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/form-editor.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/enad/Downloads/WORK/nakheel-cms/resources/views/form-editors.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

    <link href="<?php echo e(URL::asset('/assets/libs/admin-resources/admin-resources.min.css')); ?>" rel="stylesheet">
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('translation.Dashboards'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('translation.tenantsSubCategory'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('tenants.tenants-categories', [])->html();
} elseif ($_instance->childHasBeenRendered('5T8hlRt')) {
    $componentId = $_instance->getRenderedChildComponentId('5T8hlRt');
    $componentTag = $_instance->getRenderedChildComponentTagName('5T8hlRt');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5T8hlRt');
} else {
    $response = \Livewire\Livewire::mount('tenants.tenants-categories', []);
    $html = $response->html();
    $_instance->logRenderedChild('5T8hlRt', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>







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

    <?php echo \Livewire\Livewire::scripts(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/tenantsSubCategory/index.blade.php ENDPATH**/ ?>
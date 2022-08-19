<button type="button" class="btn btn-primary waves-effect waves-light pull-right mb-3" data-bs-toggle="modal" data-bs-target="#AddCategoryTenant"
        data-bs-whatever="@getbootstrap"><?php echo app('translator')->get('translation.Add Tenant Category'); ?>
</button>

<div class="modal fade" id="AddCategoryTenant" tabindex="-1" aria-labelledby="AddCategoryTenantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title mb-0 flex-grow-1"><?php echo app('translator')->get('translation.Add Tenant Category'); ?></h4>
                <div class="flex-shrink-0">
                    <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home2" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block"><?php echo app('translator')->get('translation.english'); ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block"><?php echo app('translator')->get('translation.arabic'); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('tenants-category.store')); ?>" method="POST" id="AddCategoryTenants">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="home2" role="tabpanel">
                            <p class="mb-0">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('translation.categoryname'); ?></label>
                                <input type="text" class="form-control" id="recipient-name" name="category_name_en">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label"><?php echo app('translator')->get('translation.categorydescription'); ?></label>
                                <textarea class="form-control" id="message-text" name="category_desc_en"></textarea>
                            </div>
                            </p>
                        </div>
                        <div class="tab-pane" id="profile2" role="tabpanel">
                            <p class="mb-0">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('translation.categorynamear'); ?></label>
                                <input type="text" class="form-control" id="recipient-name" name="category_name_ar">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label"><?php echo app('translator')->get('translation.categorydescriptionar'); ?></label>
                                <textarea class="form-control" id="message-text" name="category_desc_ar"></textarea>
                            </div>
                            </p>
                        </div>

                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('translation.close'); ?></button>
                <button type="submit" class="btn btn-primary" form="AddCategoryTenants"><?php echo app('translator')->get('translation.Add'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/tenants/inc/Add_modal.blade.php ENDPATH**/ ?>
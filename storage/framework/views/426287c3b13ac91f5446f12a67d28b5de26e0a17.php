<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>

                <li>
                    <a href="index">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                        <span data-key="t-dashboard"><?php echo app('translator')->get('translation.Dashboards'); ?></span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-menu"><?php echo app('translator')->get('translation.tenantsCategory'); ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-bag"></i>
                        <span data-key="t-dashboard"><?php echo app('translator')->get('translation.tenantsCategory'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">


                        <li><a href="<?php echo e(url('tenants-sub-category')); ?>" data-key="t-level-1-1"><?php echo app('translator')->get('translation.tenantsCategory'); ?></a></li>
                        









                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-bag"></i>
                        <span data-key="t-dashboard"><?php echo app('translator')->get('translation.tenants'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?php echo e(url('tenants')); ?>" data-key="t-level-1-1"><?php echo app('translator')->get('translation.tenantsList'); ?></a></li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH /var/www/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>
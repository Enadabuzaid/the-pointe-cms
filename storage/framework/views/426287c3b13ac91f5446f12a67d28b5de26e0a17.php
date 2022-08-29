<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">main</li>

                <li>
                    <a href="<?php echo e(url('/admin')); ?>">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                        <span data-key="t-dashboard"><?php echo app('translator')->get('translation.Dashboards'); ?></span>
                    </a>
                </li>


                <li class="menu-title" data-key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="menu"></i>
                        <span data-key="t-dashboard">Menu </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><li><a href="<?php echo e(route('menu')); ?>" data-key="t-level-1-1">main menu</a></li></li>
                    </ul>
                </li>





























                <li class="menu-title" data-key="t-menu">SEO</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="link"></i>
                        <span data-key="t-dashboard">links </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><li><a href="<?php echo e(route('redirect')); ?>" data-key="t-level-1-1">redirect</a></li></li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH /var/www/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>
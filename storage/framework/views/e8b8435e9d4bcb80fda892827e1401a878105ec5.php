<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Data_Tables'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> SEO <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Redirects <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <button type="button" class="btn btn-primary waves-effect waves-light mb-4" data-bs-toggle="modal" data-bs-target="#myModal">Add New Redirect</button>

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
        <div class="modal-dialog">
            <form action="<?php echo e(route('redirect.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="example-text-input" class="form-label">Link To</label>
                        <input class="form-control" name="from_link" type="url" placeholder="redirect from" id="example-text-input">
                    </div>

                    <div class="mb-3">
                        <label for="example-text-input" class="form-label">Link From</label>
                        <input class="form-control" name="to_link" type="url" placeholder="redirect to" id="example-text-input">
                    </div>

                    <div class="mb-3">
                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Redirect Type</label>
                        <select class="form-control" data-trigger name="type_link"
                                id="choices-single-default"
                                placeholder="Enter redirect type">
                            <option value="301">301</option>
                            <option value="302">302</option>
                            <option value="307">307</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php if($errors->any()): ?>
        <div class="alert alert-danger mg-b-0 alert-dismissible fade show mb-4" role="alert">
            <strong>Opps !</strong> Something went wrong.
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $redirects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $redirect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($redirect->id); ?></td>
                            <td><?php echo e($redirect->url_from); ?></td>
                            <td><?php echo e($redirect->url_to); ?></td>
                            <td><?php echo e($redirect->type); ?></td>
                            <td>
                                <?php if($redirect->status): ?>
                                    <span class="badge bg-success me-1 my-2">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger me-1 my-2">Deactivate</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a title="delete" type="button" class="text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo e($redirect->id); ?>" data-bs-whatever="@mdo">
                                    <i data-feather="trash-2"></i>
                                </a>

                                <a title="switch status" type="button" class="text-secondary" data-bs-toggle="modal" data-bs-target="#switch<?php echo e($redirect->id); ?>" data-bs-whatever="@mdo">
                                    <i data-feather="refresh-ccw"></i>
                                </a>

                                <a title="Edit" type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo e($redirect->id); ?>" data-bs-whatever="@mdo">
                                    <i data-feather="edit"></i>
                                </a>

                            </td>
                        </tr>

                        <div class="modal fade" id="exampleModal_<?php echo e($redirect->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <p>Are you sure want To Delete this ?!</p>
                                        <form action="<?php echo e(route('redirect.destroy')); ?>" method="post" id="delteForm">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" name="id" value="<?php echo e($redirect->id); ?>" id="recipient-name">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" form="delteForm" class="btn btn-primary">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="switch<?php echo e($redirect->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Switch status</h5>
                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <?php if($redirect->status): ?>
                                            <?php
                                                $type = 0;
                                                $color = 'danger';
                                                $text = 'Deactivate'
                                            ?>
                                        <?php else: ?>
                                            <?php
                                                $type = 1;
                                                $color = 'success';
                                                $text = 'Active'
                                            ?>
                                        <?php endif; ?>
                                            <p>Are you sure want To Switch to <span class="text-<?php echo e($color); ?>"><?php echo e($text); ?></span> ?!</p>
                                            <form action="<?php echo e(route('redirect.switch')); ?>" method="post" id="swichForm">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" name="id" value="<?php echo e($redirect->id); ?>" id="recipient-name">
                                                <input type="hidden" class="form-control" name="type" value="<?php echo e($type); ?>" id="recipient-name">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" form="swichForm" class="btn btn-<?php echo e($color); ?>"><?php echo e($text); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="edit<?php echo e($redirect->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="<?php echo e(route('redirect.update')); ?>" method="post" id="editForm">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="hidden" class="form-control" name="id" value="<?php echo e($redirect->id); ?>" id="recipient-name">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Edit Link</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Link To <span class="text-danger">*</span></label>
                                                <input class="form-control" value="<?php echo e($redirect->url_from); ?>" name="from_link" type="url" placeholder="redirect from" id="example-text-input">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Link From <span class="text-danger">*</span></label>
                                                <input class="form-control" value="<?php echo e($redirect->url_to); ?>" name="to_link" type="url" placeholder="redirect to" id="example-text-input">
                                            </div>

                                            <div class="mb-3">
                                                <label for="choices-single-default" class="form-label font-size-13 text-muted">Redirect Type <span class="text-danger">*</span></label>
                                                <select class="form-control" data-trigger name="type_link"
                                                        id="choices-single-default"
                                                        placeholder="Enter redirect type">
                                                    <option value="<?php echo e($redirect->type); ?>"><?php echo e($redirect->type); ?></option>
                                                    <option value="301">301</option>
                                                    <option value="302">302</option>
                                                    <option value="307">307</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="example-text-input">Status <span class="text-danger">*</span></label>
                                                <select class="form-select" name="status">
                                                    <?php if($redirect->status): ?>
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactivate</option>
                                                    <?php else: ?>
                                                        <option value="0">Deactivate</option>
                                                        <option value="1">Active</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="editForm" class="btn btn-success waves-effect waves-light">Save changes</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </form>
                            </div>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->
    </div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net/datatables.net.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/datatables.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/sweetalert.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/app.min.js')); ?>"></script>

    <?php if(Session::has('success')): ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '<?php echo e(Session::get('success')); ?>',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php endif; ?>

    <?php if(Session::has('delete')): ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '<?php echo e(Session::get('delete')); ?>',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php endif; ?>

    <?php if(Session::has('switch')): ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: '<?php echo e(Session::get('switch')); ?>',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php endif; ?>

    <?php if(Session::has('update')): ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: '<?php echo e(Session::get('update')); ?>',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php endif; ?>

    <?php echo e(Session::forget('success')); ?>

    <?php echo e(Session::forget('delete')); ?>

    <?php echo e(Session::forget('switch')); ?>

    <?php echo e(Session::forget('update')); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/redirect/index.blade.php ENDPATH**/ ?>
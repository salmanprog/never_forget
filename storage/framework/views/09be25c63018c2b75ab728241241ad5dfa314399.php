<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } else {
        $layout = 'layouts.company.app';
    }
?>




<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('wishlist.index')); ?>">
    <section class="content-header">
        <div class="content-header-left">
            <h1>Wishlist / Favorites</h1>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-create')): ?>
            <div class="content-header-right">
                
            </div>
        <?php endif; ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="row" style="margin-bottom:10px">
                            <div class="d-flex col-sm-12">
                                <input type="text" id="search" class="form-control" placeholder="Search by Order No#">
                            </div>
                            <div class="d-flex col-sm-4" style="display: none">
                                <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                    <option value="All" selected>Search by status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <table id="" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="id-<?php echo e($wishlists->firstItem()+$key); ?>">
                                        <td><?php echo e($wishlist->product->name); ?></td>
                                        <td><?php echo e($wishlist->created_at->format('d-m-Y')); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('single-product', $wishlist->product->slug)); ?>"
                                                class="btn btn-primary btn-xs" target="_blank">
                                                <i class="fa-regular fa-eye"></i> <span class="ms-2">View</span>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-xs wishlist-btn"
                                                data-product-id="<?php echo e($wishlist->product_id); ?>">
                                                <i class="fa fa-trash"></i> <span class="ms-2">Remove</span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="7">
									Displying <?php echo e($wishlists->firstItem()); ?> to <?php echo e($wishlists->lastItem()); ?> of <?php echo e($wishlists->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $wishlists->links('pagination::bootstrap-4'); ?>

                                    </div>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <?php echo $__env->make('components.wishlist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget\resources\views/admin/wishlist/index.blade.php ENDPATH**/ ?>
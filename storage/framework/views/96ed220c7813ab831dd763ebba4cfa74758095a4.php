<section class="content-header">
    <div class="content-header-left"><h1><?php echo e($page_title); ?></h1></div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-create')): ?>
    <div class="content-header-right">
        <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a href="<?php echo e(route($createRoute)); ?>" class="btn btn-primary btn-sm"><?php echo e($page_title_add); ?></a>
    </div>
    <?php endif; ?>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('message')): ?>
                <div class="callout callout-success"><?php echo e(session('message')); ?></div>
            <?php endif; ?>
            <div class="box box-info">
                <div class="box-body">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="d-flex col-sm-8">
                            <input type="text" id="search" class="form-control" placeholder="Search by Title">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select id="status" class="form-control status">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th width="140">Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="id-<?php echo e($model->id); ?>">
                                        <td><?php echo e($models->firstItem() + $key); ?>.</td>
                                        <td>
                                            <?php if($model->{$imageField}): ?>
                                                <img src="<?php echo e(asset('/public/' . $model->{$imageField})); ?>" alt="<?php echo e($model->title); ?>" style="width: 60px; height: 60px; object-fit: cover;">
                                            <?php else: ?> — <?php endif; ?>
                                        </td>
                                        <td><?php echo e(\Illuminate\Support\Str::limit($model->title, 40)); ?></td>
                                        <td><?php echo e($model->sort_order ?? 0); ?></td>
                                        <td>
                                            <?php if($model->status ?? 1): ?>
                                                <span class="label label-success">Active</span>
                                            <?php else: ?>
                                                <span class="label label-danger">In-Active</span>
                                            <?php endif; ?>
                                        </td>
                                        <td width="250px">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-edit')): ?>
                                                <a href="<?php echo e(route($editRoute, $model->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-delete')): ?>
                                                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url($destroyPrefix, $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="6">
                                        Displaying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
                                        <div class="d-flex justify-content-center"><?php echo $models->links('pagination::bootstrap-4'); ?></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/admin/partials/outsource_category_index.blade.php ENDPATH**/ ?>
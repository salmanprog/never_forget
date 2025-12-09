<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr id="id-<?php echo e($model->id); ?>">
		<td><?php echo e($models->firstItem()+$key); ?>.</td>
		<td>
		<?php if($model->image): ?>
			<img src="<?php echo e(asset('public/admin/assets/posts/'.$model->image)); ?>" alt="" style="width:60px; height:60px; object-fit:cover;">
		<?php else: ?>
			<img src="<?php echo e(asset('public/admin/assets/img/no-photo1.jpg')); ?>" style="width:60px;">
		<?php endif; ?>
		</td>
		<td><?php echo \Illuminate\Support\Str::limit($model->title,40); ?></td>
		<td><?php echo \Illuminate\Support\Str::limit(strip_tags($model->description),60); ?></td>
		<td>
			<?php if($model->status): ?>
				<span class="badge badge-success">Active</span>
			<?php else: ?>
				<span class="badge badge-danger">In-Active</span>
			<?php endif; ?>
		</td>
		<td><?php echo e(date('d, F-Y H:i:s A', strtotime($model->created_at))); ?></td>
		<td width="250px">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-edit')): ?>
				<a href="<?php echo e(route('blog.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit blog" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
			<?php endif; ?>
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('blog', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
			<?php endif; ?>
		</td>
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
	<td colspan="7">
		Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
		<div class="d-flex justify-content-center">
			<?php echo $models->links('pagination::bootstrap-4'); ?>

		</div>
	</td>
</tr>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/blog/search.blade.php ENDPATH**/ ?>
<?php $__currentLoopData = $greetingsCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-4 col-md-6 product-item visible">
        <div class="gift-card-wrapper">
            <?php if($category->image): ?>
                <img src="<?php echo e(asset('/public/' . $category->image)); ?>" alt="<?php echo e($category->title); ?>">
            <?php endif; ?>
            <div class="product-info">
                <h3 class="product-title"><?php echo e($category->title); ?></h3>

                <?php if(in_array($category->id, $addedGreetingsCategoryIds ?? [])): ?>
                    <a href="<?php echo e(route('greetings-appreciation-items')); ?>" class="add-to-cart balloon-btn"
                        style="width:100%; text-align:center;">
                        View
                    </a>
                <?php else: ?>
                    <form class="greetings-appreciation-form" method="POST"
                        action="<?php echo e(route('create-greetings-appreciation-enquiry-item')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="greetings_appreciation_category_id" value="<?php echo e($category->id); ?>">
                        <button type="submit" class="add-to-cart balloon-btn" style="width: 100%">
                            Add
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\xamp-new\htdocs\neverforget-updated\resources\views/website/partials/_greetings_appreciation.blade.php ENDPATH**/ ?>
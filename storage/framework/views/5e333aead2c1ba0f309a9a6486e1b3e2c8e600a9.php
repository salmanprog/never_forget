
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', $page_title); ?>
<style>
    .cart-main {
            background: #298dff38; 
            /* box-shadow: 0 2px 16px rgb(0 0 0); */
            padding: 30px 0; 
        }
        .cart-table table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .cart-table th, .cart-table td {
            padding: 16px 12px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }
        .cart-table th {
            background: #0a2749;
            font-weight: 700;
            color: #ffffff;
        }
        .cart-table tr:last-child td {
            border-bottom: none;
        }
        .cart-table tbody tr:hover {
            background: #f9f9f9;
        }
        .product_name {
            font-size: 18px;
            color: #081e37;
            font-family: 'Lato', sans-serif;
            font-weight: 600;
            margin-bottom: 0;
        }
        .remove-btn {
            border-radius: 50%;
            width: 32px;
            height: 32px;
            background: #f8d7da;
            color: #721c24;
            border: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }
        .remove-btn:hover {
            background: #dc3545;
            color: #fff;
        }
        .edit-btn{
            border-radius: 50%;
            width: 32px;
            height: 32px;
            background: #f8d7da;
            color: #9fdba5ff;
            border: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }
        .edit-btn:hover {
            background: #034211ff;
            color: #fff;
        }
        .coupon_code, .apply_coupon {
            padding: 8px 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-right: 8px;
        }
        .apply_coupon {
            background: #0a2749;
            color: #fff;
            border: none;
            transition: background 0.2s;
        }
        .apply_coupon:hover {
            background: #cfa40c;
            color: #fff;
        }
        .golbal-btn-submit, .proceesd {
            background: #cfa40c;
            color: #fff;
            border: none;
            padding: 12px 32px;
            font-size: 17px;
            border-radius: 6px;
            transition: background 0.2s;
            margin-top: 10px;
            display: inline-block;
        }
        .golbal-btn-submit:hover, .proceesd:hover {
            background: #0a2749;
            color: #fff;
        }
        input[type='number'] {
            width: 60px;
            padding: 6px 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }
        .quantity_goods {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .quantity-btn {
            background: #cfa40c;
            border: none;
            border-radius: 4px;
            width: 28px;
            height: 28px;
            font-size: 18px;
            color: #333;
            cursor: pointer;
            transition: background 0.2s;
        }
        .quantity-btn:hover {
            background: #0a2749;
            color: #fff;
        }
</style>
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Balloons
            </h1>
        </div>
    </section>
</main>
<section class="cart-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-of-table cart-table">
                    <table class="table-responsive table table-striped dt-responsive nowrap">
                        <?php if(count($enquiries) > 0): ?>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <?php else: ?>
                        <div class="text-center">
                            <h4>No balloon enquiry items found</h4>
                        </div>
                        <?php endif; ?>

                        <tbody>
                            <?php
                                $item_ids = [];    
                            ?>
                            <?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                array_push($item_ids, $enquiry->balloon_id);
                            ?>
                            <tr id="">
                                <td>
                                    <?php if($enquiry->balloon->images): ?>
                                        <img src="<?php echo e(asset('/public/'.$enquiry->balloon->images)); ?>"
                                        alt="<?php echo e($enquiry->balloon->title); ?>" style="width: 100px; height: 100px;">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($enquiry->balloon->title); ?>

                                </td>
                                <td>
                                    <?php echo e($enquiry->quantity); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php if(count($enquiries) > 0): ?>
                    <form action="<?php echo e(route('balloon.enquiry')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="balloon_ids" value="<?php echo e(implode(',', $item_ids)); ?>">
                        <textarea name="message" placeholder="Message"></textarea>
                        <button type="submit" class="golbal-btn-submit">Submit Baloon Enquiry</button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/website/balloon-items.blade.php ENDPATH**/ ?>
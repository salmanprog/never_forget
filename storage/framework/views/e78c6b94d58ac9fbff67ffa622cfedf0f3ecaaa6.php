<?php $__env->startSection('content'); ?>
    <style>
        li {
            list-style: none;
        }

        td.price {
            display: table-cell;
            vertical-align: middle;
        }

        .mark,
        mark {
            padding: 0.2em;
            background-color: #c2ffbf;
        }
    </style>

    <!-- Inner Page Banner  -->
    <section class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-page-heading">
                        <h1>ORDER DETAILS</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Page Banner  -->
    <section style="background: #fff">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-table mt-5">
                        <h3 class="font-weight-bold">Order Details: <?php if(empty($order)): ?>
                                <span class="mb-0"style="font-size: 20px;">Order #<mark><?php echo e($orders->order_number); ?></mark>
                                    was placed on <mark><?php echo e($orders->order_date); ?></mark> and is
                                    currently<mark><?php echo e($orders->order_status); ?></mark> payment. </span>
                            <?php endif; ?>
                        </h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-top-0">Product</th>
                                    <th scope="col" class="border-top-0">Total</th>
                                </tr>
                            </thead>
                            <tbody class="border">
                                <?php ($counter = 0); ?>
                                <?php $__currentLoopData = $orders->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('single-product', $product->product_slug)); ?>"
                                                style="color: #7f032f;font-size: 18px;"><?php echo e($product->hasProduct->name); ?></a>
                                            -> Quantity: <strong><?php echo e($product->quantity); ?></strong>

                                            <p class="prod-title" style="margin-bottom: 0px;"><?php $variations = App\Models\Variations::where('id', $product->size_id)->first(); ?>
                                                <?php if($product->variation_id != null): ?>
                                                    <?php $Size = App\Models\Variations::where('id',$product->variation_id)->first(); ?>
                                                        Option:  <?php echo e($Size->hasSizes->sizes); ?>

                                                <?php endif; ?>
                                            </p>
                                            <p class="prod-title" style="margin-bottom: 0px;"><?php echo e($product->message); ?></p>
                                        </td>    
                                        <td class="price">$<?php echo e(number_format($product->sub_total, 2)); ?></td>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot class="border">
                                <tr>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" colspan="2">$<?php echo e(number_format($orders->total_amount, 2)); ?></th>
                                </tr>
                                <tr>
                                    <th scope="row">Payment method:</th>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>$<?php echo e(number_format($orders->total_amount, 2)); ?></td>
                                </tr>
                                <tr>
                                    <?php if(empty($orders)): ?>
                                        <th>Note:</th>
                                        <td><?php echo \Illuminate\Support\Str::limit($orders->order_note ?? 'N/A', 60); ?></td>
                                    <?php endif; ?>
                                    <?php if(!empty($orders)): ?>
                                        <th>Note:</th>
                                        <td><?php echo \Illuminate\Support\Str::limit($orders->order_note ?? 'N/A', 60); ?></td>
                                    <?php endif; ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px">
                <div class="col-md-12">
                    <h3 class="font-weight-bold">Billing address</h3>
                    <div class="class-address border rounded">
                        <address class="pl-3 pt-3" style="padding-left:10px;">
                            <?php if($address): ?>
                                <?php echo e($address->first_name); ?> <?php echo e($address->last_name); ?> <br> <?php echo e($address->company); ?><br>
                                <?php echo e($address->street); ?><br>
                                <?php echo e($address->street); ?><br><?php echo e($address->town); ?><br><?php echo e($address->country); ?>

                                <p class="m-0"> <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <?php echo e($address->phone); ?></p>
                                <p> <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> <?php echo e($address->email); ?>

                                </p>
                            <?php endif; ?>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\order-details.blade.php ENDPATH**/ ?>
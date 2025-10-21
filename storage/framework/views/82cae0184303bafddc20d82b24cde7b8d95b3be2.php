<!DOCTYPE html>
<html>

<head>
    <title>Never Forget Showing Appreciation Order has been created!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @media  screen {
            @font-face {
                font-family: '"Open Sans", sans-serif';
                font-style: normal;
                font-weight: 400;
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media  screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="background-color: #f7f7f7; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We're thrilled to have you here! Get ready to dive into your new account. </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#f7f7f7" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f7f7f7" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 10px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px; background-color: #0863d2;">
                            <h1 style="font-size: 28px; font-weight: 600; margin: 2; color: white;">New Order: #<?php echo e($details['body']->order_number); ?></h1>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f7f7f7" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 200; line-height: 25px;">
                            <br />
                            <p style="margin: 0;"><?php echo e($details['title']); ?>:</p><br />
                            <h2>[Order#<?php echo e($details['body']->order_number); ?>] (<?php echo e(date('F d, Y', strtotime($details['body']->created_at))); ?>)</h2>
                            <table border="2" cellpadding="5" cellspacing="5" width="100%" style="max-width: 600px;">
                                <tr>
                                    <th align="left">Product</th>
                                    <th align="left">Quantity</th>
                                    <th align="left">Price</th>
                                </tr>
                                <?php $__currentLoopData = $details['body']->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($product->hasProduct->name); ?><br />
                                            <?php $tickets = App\Models\Ticket::where('order_id', $product->order_id)->where('product_id', $product->hasProduct->id)->get(); ?>
                                            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <b>Ticket Number: <?php echo e($ticket->ticket_number); ?></b><br />
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td><?php echo e($product->quantity); ?></td>
                                        <td>$<?php echo e(number_format($product->price*$product->quantity,2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="2">
                                        <b>Subtotal</b>
                                    </td>
                                    <td>$<?php echo e(number_format($details['body']->total_amount,2)); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Payment Method</b></td>
                                    <td><?php echo e($details['body']->payment_method??'--'); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Total</b></td>
                                    <td>$<?php echo e(number_format($details['body']->total_amount,2)); ?></td>
                                </tr>
                            </table>
                            <br />
                            <h2>Billing Address</h2>
                            <table border="2" cellpadding="5" cellspacing="5" width="100%" style="max-width: 600px;">
                                <tr>
                                    <th align="left">First Name</th>
                                    <td><?php echo e($details['body']->hasBillingAddress->first_name); ?></td>
                                </tr>
                                <tr>
                                    <th align="left"> Last Name </th>
                                    <td><?php echo e($details['body']->hasBillingAddress->last_name); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Company</th>
                                    <td><?php echo e($details['body']->hasBillingAddress->company); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Country</th>
                                    <td><?php echo e($details['body']->hasBillingAddress->country); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Street</th>
                                    <td><?php echo e($details['body']->hasBillingAddress->street); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Town</th>
                                    <td><?php echo e($details['body']->hasBillingAddress->town); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Postcode</th>
                                    <td><?php echo e($details['body']->hasBillingAddress->postcode); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Phone</th>
                                    <td><?php echo e($details['body']->hasBillingAddress->phone); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Email</th>
                                    <td><?php echo e($details['body']->hasBillingAddress->email); ?></td>
                                </tr>
                            </table>    
                        </td>
                    </tr>
                    <tr>
                        
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 200; line-height: 25px;">
                            <p style="margin: 0;">Congratulation on the sale.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br /><br />
</body>

</html>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/emails/new-booking-admin-temp.blade.php ENDPATH**/ ?>
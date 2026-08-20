<script>
    $(document).on('click', '.wishlist-btn', function () {
    
        let btn = $(this);
        let productId = btn.data('product-id');
        let row = btn.closest('tr');
    
        $.ajax({
            url: "<?php echo e(route('wishlist.toggle')); ?>",
            type: 'POST',
            data: {
                product_id: productId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
    
                if (res.status === 'added') {
                    // frontend (heart toggle)
                    btn.addClass('active');
    
                } else if (res.status === 'removed') {
    
                    // frontend
                    btn.removeClass('active');
    
                    // dashboard (remove row smoothly)
                    if (row.length) {
                        row.fadeOut(300, function () {
                            $(this).remove();
    
                            // optional: empty state check
                            if ($('#body tr').length === 0) {
                                $('#body').html(
                                    `<tr>
                                        <td colspan="4" class="text-center">
                                            No wishlist items found
                                        </td>
                                    </tr>`
                                );
                            }
                        });
                    }
                }
            },
            error: function () {
                alert('Something went wrong');
            }
        });
    });
    </script><?php /**PATH D:\xamp-new\htdocs\neverforget-updated\resources\views/components/wishlist.blade.php ENDPATH**/ ?>
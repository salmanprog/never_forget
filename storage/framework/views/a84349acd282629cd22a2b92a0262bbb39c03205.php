<script>
    // Add a JavaScript translation function
    window.__ = function(key) {
        // You can load translations via AJAX or embed them in the page
        var translations = <?php echo json_encode(trans()->get('*'), 15, 512) ?>;
        return translations[key] || key;
    };
</script><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\layouts\website\app.blade.php ENDPATH**/ ?>
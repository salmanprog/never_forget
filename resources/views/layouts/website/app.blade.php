<script>
    // Add a JavaScript translation function
    window.__ = function(key) {
        // You can load translations via AJAX or embed them in the page
        var translations = @json(trans()->get('*'));
        return translations[key] || key;
    };
</script>
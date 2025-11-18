// Make sure this code is running after the DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Check if Bootstrap is available
    if (typeof bootstrap !== 'undefined') {
        // Initialize all dropdowns
        var dropdownElementList = document.querySelectorAll('.dropdown-toggle');
        dropdownElementList.forEach(function(element) {
            new bootstrap.Dropdown(element);
        });
    } else {
        console.error('Bootstrap JavaScript is not loaded');
        
        // Fallback manual implementation
        document.querySelectorAll('.dropdown-toggle').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                this.nextElementSibling.classList.toggle('show');
            });
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                    menu.classList.remove('show');
                });
            }
        });
    }
});

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
jQuery(document).ready(function($) {
    $('.navbar-nav .nav-item.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).slideDown(200);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).slideUp(200);
    });

    // Optional: Make dropdown functional on mobile
    $('.navbar-nav .nav-item.dropdown > a').on('click', function(e) {
        var $this = $(this);
        if (!$this.next('.dropdown-menu').hasClass('show')) {
            e.preventDefault();
        }
        $this.next('.dropdown-menu').toggleClass('show');
    });
});


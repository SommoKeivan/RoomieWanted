$(document).ready(function () {
    // Initialize custom scrollbar for sidebar and menuN elements
    $("#sidebar, #menuN").mCustomScrollbar({
        theme: "minimal" // Set the scrollbar theme to 'minimal'
    });

    // Event handler for dismissing the sidebar, menuN, and overlay
    $('#dismiss, #dismiss-not, .overlay').on('click', function () {
        $('#sidebar').removeClass('active'); // Remove active class from sidebar
        $('#menuN').removeClass('active'); // Remove active class from menuN
        $('.overlay').removeClass('active'); // Remove active class from overlay
    });

    // Event handler for collapsing the sidebar
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active'); // Add active class to sidebar
        $('.overlay').addClass('active'); // Add active class to overlay
        $('.collapse.in').toggleClass('in'); // Toggle collapse state of any open elements
        $('a[aria-expanded=true]').attr('aria-expanded', 'false'); // Set aria-expanded to false for open links
    });

    // Event handler for collapsing the menuN
    $('#menuNCollapse').on('click', function () {
        $('#menuN').addClass('active'); // Add active class to menuN
        $('.overlay').addClass('active'); // Add active class to overlay
        $('.collapse.in').toggleClass('in'); // Toggle collapse state of any open elements
        $('a[aria-expanded=true]').attr('aria-expanded', 'false'); // Set aria-expanded to false for open links
    });
});

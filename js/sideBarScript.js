$(document).ready(function () {
    $("#sidebar, #menuN").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, #dismiss-not, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('#menuN').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    $('#menuNCollapse').on('click', function () {
        $('#menuN').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});
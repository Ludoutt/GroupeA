$(".display-popup").click(function() {
    var popup = $(this).data('popup');
    $('.'+popup).fadeIn('fast')
});

$(".popup-background").click(function() {
    $('.popup').fadeOut('fast')
});
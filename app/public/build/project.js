$(".display-popup").click(function() {
    var popup = $(this).data('popup');
    $('.'+popup).fadeIn()
});

$(".popup").click(function() {
    $('.popup').fadeOut()
});
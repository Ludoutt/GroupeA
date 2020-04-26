$(".display-popup").click(function() {
    var popup = $(this).data('popup');
    $('.'+popup).fadeIn('fast')
});

$(".display-popup.feature").click(function() {
    var title = $(this).data('title');
    var sort = $(this).data('sort');
    var id = $(this).data('id');
    var job = $(this).data('job');
    var validation = $(this).data('validation');
    var description = $(this).data('description');
    console.log(validation);
    $('#feature_title').attr('value', title);
    $('#feature_id').attr('value', id);
    $('#feature_sortBy').attr('value', sort);
    $('#feature_jobValue').attr('value', job);
    $('#feature_acceptationValidation').value = validation;
    $('#feature_description').value = description;
});

$(".popup-background").click(function() {
    $('.popup').fadeOut('fast')
});

$(".feature-developp-button").click(function() {
    if ($(this).next('.feature-developp').hasClass('open')) {
        $(this).next('.feature-developp').removeClass('open');
        $(this).next('.feature-developp').slideUp();
    } else {
        $(this).next('.feature-developp').addClass('open');
        $(this).next('.feature-developp').slideDown();
    }
});
function initModal() {
    $('.js-modal-open').on('click', function (e) {
        e.preventDefault();
        var msrc = $(this).data('src');
        $('.js-modal').find('.video-container').html(msrc);
        $('.js-modal').fadeIn();
    });

    $('.js-modal-close, .js-modal-close-btn').on('click', function (e) {
        e.preventDefault();
        $('.js-modal').fadeOut(function () {
            $('.js-modal').find('.video-container').html('');
        });
    });
}
export {initModal};

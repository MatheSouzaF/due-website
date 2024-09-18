export function cardHover() {
  $(document).ready(function () {
    $('.card-empreendimentos').hover(
      function () {
        // Mouse enter
        const video = $(this).find('.video-empreendimento');
        if (video.length) {
          video.css('opacity', 1);
          video[0].play();
        }
        $(this).addClass('hover-card');
      },
      function () {
        // Mouse leave
        const video = $(this).find('.video-empreendimento');
        if (video.length) {
          video.css('opacity', 0);
          video[0].pause();
          video[0].currentTime = 0;
        }
        $(this).removeClass('hover-card');
      }
    );
  });
}
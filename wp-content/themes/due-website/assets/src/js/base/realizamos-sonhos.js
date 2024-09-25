function realizamoSonhos() {
  const logoSVG = document.querySelector('.svg-realizamos');
  const tituloRealizamos = document.querySelector('.box-titulo');
  const descricaoRealizamos = document.querySelector('.box-subtitulo');
  const linkRealizamos = document.querySelectorAll('.itens-list');
  const btnLinks = document.querySelector('.button-icon-play');
  const imgRealizamos = document.querySelector('.imagem-realizamos');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.realizamos-sonho',
      start: 'top-=450',
    },
  });

  TLFADE.fromTo(
    logoSVG,
    {autoAlpha: 0, y: 100},
    {
      duration: 0.6,
      autoAlpha: 1,
      y: 0,
    }
  )

    .fromTo(
      tituloRealizamos,
      {autoAlpha: 0, y: 100},
      {
        duration: 0.6,
        autoAlpha: 1,
        y: 0,
      },
      '-=0.5'
    )
    .fromTo(
      descricaoRealizamos,
      {autoAlpha: 0, y: 100},
      {
        duration: 0.6,
        autoAlpha: 1,
        y: 0,
      },
      '-=0.5'
    )
    .fromTo(
      linkRealizamos,
      {autoAlpha: 0, y: 100},
      {
        duration: 0.6,
        autoAlpha: 1,
        y: 0,
        stagger: 0.2,
      },
      '-=0.5'
    )
    .fromTo(
      btnLinks,
      {autoAlpha: 0, y: 100},
      {
        duration: 0.6,
        autoAlpha: 1,
        y: 0,
      },
      '-=1'
    )
    .from(
      imgRealizamos,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgRealizamos.classList.add('imgPath'),
      },
      '0'
    );
}
function initRealizamos() {
  realizamoSonhos();
}

export {initRealizamos};

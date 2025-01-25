function banner() {
  const tituloJeito = document.querySelector('.titulo-banner-inciativas');
  const descricaoJeito = document.querySelector('.descricao-banner-inciativas');
  const imgBannerSecodary = document.querySelector('.box-imagem-banner-iniciativas');
  const imgBanner = document.querySelector('.container-image');
  let TLFADE = gsap.timeline();

  TLFADE.to(tituloJeito, {
    duration: 1,
    opacity: 1,
    x: 0,
  });
  TLFADE.to(
    descricaoJeito,
    {
      duration: 1,
      opacity: 1,
      x: 0,
    },
    '-=.8'
  );

  TLFADE.from(
    imgBanner,
    {
      duration: 1.5,
      onStart: () => imgBanner.classList.add('imgPath'),
    },
    '-=1'
  );
  TLFADE.from(
    imgBannerSecodary,
    {
      duration: 1.5,
      onStart: () => imgBannerSecodary.classList.add('imgPath'),
    },
    '-=1.5'
  );
}

function animationNeymar() {
  const logoSVG = document.querySelector('.box-svg-instituto-neymar');
  const tituloEscola = document.querySelector('.titulo-instituto-neymar');
  const descricaoEscola = document.querySelector('.descricao-instituto-neymar');
  const linkEscola = document.querySelector('.link-instituto-neymar-desktop');
  const imgEscola = document.querySelector('.image-instituto-neymar');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.instituto-neymar',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-left'),
  })
    .from(
      tituloEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      descricaoEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      linkEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      imgEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgEscola.classList.add('imgPath'),
      },
      '0'
    );
}
function animationVila() {
  const logoSVG = document.querySelector('.box-svg-vila-alafia');
  const tituloAssociacao = document.querySelector('.titulo-vila-alafia');
  const descricaoAssociacao = document.querySelector('.descricao-vila-alafia');
  const linkAssociacao = document.querySelector('.link-vila-alafia-desktop');
  const imgAssociacao = document.querySelector('.box-conteudo-right-vila-alafia');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.vila-alafia',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-right'),
  })
    .from(
      tituloAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloAssociacao.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      descricaoAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoAssociacao.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      linkAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkAssociacao.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      imgAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgAssociacao.classList.add('imgPath'),
      },
      '0'
    );
}
function backgroundVila() {
  gsap.registerPlugin(ScrollTrigger);
  const btnAppears = document.querySelector('.instituto-neymar');

  function bgOpen() {
    if (btnAppears) {
      btnAppears.classList.add('background-open'); // Adiciona a classe 'background-open'
    }
  }

  function bgClose() {
    if (btnAppears) {
      btnAppears.classList.remove('background-open'); // Remove a classe 'background-open'
    }
  }

  gsap.from('.instituto-neymar', {
    scrollTrigger: {
      trigger: '.instituto-neymar',
      start: 'top-=300 center',
      scrub: true,
      onEnter: bgOpen,
      onLeaveBack: bgClose,
    },
  });
}
function animationInstitutoSuperacao() {
  const logoSVG = document.querySelector('.box-svg-instituto-padre-arlindo');
  const tituloEscola = document.querySelector('.titulo-instituto-padre-arlindo');
  const descricaoEscola = document.querySelector('.descricao-instituto-padre-arlindo');
  const linkEscola = document.querySelector('.link-instituto-padre-arlindo-desktop');
  const imgEscola = document.querySelector('.image-instituto-padre-arlindo');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.instituto-padre-arlindo',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-left'),
  })
    .from(
      tituloEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      descricaoEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      linkEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      imgEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgEscola.classList.add('imgPath'),
      },
      '0'
    );
}
function backgroundAssociacaoSuperacao() {
  gsap.registerPlugin(ScrollTrigger);
  const btnAppears = document.querySelector('.instituto-padre-arlindo');

  function bgOpen() {
    if (btnAppears) {
      btnAppears.classList.add('background-open'); // Adiciona a classe 'background-open'
    }
  }

  function bgClose() {
    if (btnAppears) {
      btnAppears.classList.remove('background-open'); // Remove a classe 'background-open'
    }
  }

  gsap.from('.instituto-padre-arlindo', {
    scrollTrigger: {
      trigger: '.instituto-padre-arlindo',
      start: 'top-=300 center',
      scrub: true,
      onEnter: bgOpen,
      onLeaveBack: bgClose,
    },
  });
}
function animationAssociacaoSuperacao() {
  const logoSVG = document.querySelector('.box-svg-associacao-superacao');
  const tituloAssociacao = document.querySelector('.titulo-associacao-superacao');
  const descricaoAssociacao = document.querySelector('.descricao-associacao-superacao');
  const linkAssociacao = document.querySelector('.link-associacao-superacao-desktop');
  const imgAssociacao = document.querySelector('.box-conteudo-right-associacao-superacao');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.associacao-superacao',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-right'),
  })
    .from(
      tituloAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloAssociacao.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      descricaoAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoAssociacao.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      linkAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkAssociacao.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      imgAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgAssociacao.classList.add('imgPath'),
      },
      '0'
    );
}

function animationEscola() {
  const logoSVG = document.querySelector('.box-svg-escola');
  const tituloEscola = document.querySelector('.titulo-escola-formacao-due');
  const descricaoEscola = document.querySelector('.descricao-escola-formacao-due');
  const linkEscola = document.querySelector('.link-escola-formacao-due-desktop');
  const imgEscola = document.querySelector('.image-escola-formacao-due');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.escola-formacao-due',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-left'),
  })
    .from(
      tituloEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      descricaoEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      linkEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      imgEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgEscola.classList.add('imgPath'),
      },
      '0'
    );
}

function animationIncentivo() {
  const logoSVG = document.querySelector('.box-svg-incentivo-empreendedorismo');
  const tituloAssociacao = document.querySelector('.titulo-incentivo-empreendedorismo');
  const descricaoAssociacao = document.querySelector('.descricao-incentivo-empreendedorismo');
  const linkAssociacao = document.querySelector('.link-incentivo-empreendedorismo-desktop');
  const imgAssociacao = document.querySelector('.box-conteudo-right-incentivo-empreendedorismo');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.incentivo-empreendedorismo',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-right'),
  })
    .from(
      tituloAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloAssociacao.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      descricaoAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoAssociacao.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      linkAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkAssociacao.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      imgAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgAssociacao.classList.add('imgPath'),
      },
      '0'
    );
}
function backgroundIncentivo() {
  gsap.registerPlugin(ScrollTrigger);
  const bg = document.querySelector('.escola-formacao-due');

  function bgOpen() {
    if (bg) {
      bg.classList.add('background-open'); // Adiciona a classe 'background-open'
    }
  }

  function bgClose() {
    if (bg) {
      bg.classList.remove('background-open'); // Remove a classe 'background-open'
    }
  }

  gsap.from('.escola-formacao-due', {
    scrollTrigger: {
      trigger: '.escola-formacao-due',
      start: 'top-=300 center',
      scrub: true,
      onEnter: bgOpen,
      onLeaveBack: bgClose,
    },
  });
}
function backgroundProposito() {
  gsap.registerPlugin(ScrollTrigger);
  const bg = document.querySelector('.proposito');

  function bgOpen() {
    if (bg) {
      bg.classList.add('background-open'); // Adiciona a classe 'background-open'
    }
  }

  function bgClose() {
    if (bg) {
      bg.classList.remove('background-open'); // Remove a classe 'background-open'
    }
  }

  gsap.from('.proposito', {
    scrollTrigger: {
      trigger: '.proposito',
      start: 'top-=300 center',
      scrub: true,
      onEnter: bgOpen,
      onLeaveBack: bgClose,
    },
  });
}

function animationProposito() {
  const logoSVG = document.querySelector('.box-svg-proposito');
  const tituloEscola = document.querySelector('.titulo-proposito');
  const descricaoEscola = document.querySelector('.descricao-proposito');
  const linkEscola = document.querySelector('.link-proposito-desktop');
  const imgEscola = document.querySelector('.image-proposito');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.proposito',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-left'),
  })
    .from(
      tituloEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      descricaoEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      linkEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkEscola.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      imgEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgEscola.classList.add('imgPath'),
      },
      '0'
    );
}

function animationSelosCertificados() {
  gsap.registerPlugin(ScrollTrigger);

  const listaSelos = document.querySelectorAll('.lista-selos-desktop');

  listaSelos.forEach((card, i) => {
    gsap.to(card, {
      delay: i * 0.3,
      duration: 1.5,
      ease: 'power2.out',
      onStart: () => card.classList.add('clipPath-selos-certificados'),
    });
  });
}

function selosAccordion() {
  jQuery('.hover-descricao-mobile').first().css('display', 'block');
  jQuery('.box-titulo-accordion').first().parent().addClass('active');

  jQuery('.box-titulo-accordion').click(function () {
    var parent = jQuery(this).parent();
    var toggle = parent.find('.hover-descricao-mobile');

    toggle.slideToggle('slow');
    parent.toggleClass('active');
  });

  jQuery('.inactive').click(function () {
    jQuery(this).toggleClass('inactive active');
  });
}

function initIniciativas() {
  banner();
  backgroundAssociacaoSuperacao();
  animationAssociacaoSuperacao();
  animationEscola();
  animationIncentivo();
  animationProposito();
  backgroundIncentivo();
  animationSelosCertificados();
  selosAccordion();
  animationInstitutoSuperacao();
  backgroundVila();
  animationVila();
  animationNeymar();
  backgroundProposito();
}

export {initIniciativas};

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

function animationVila() {
  const logoSVG = document.querySelector('.box-svg-vila-alafia');
  const tituloEscola = document.querySelector('.titulo-vila-alafia');
  const descricaoEscola = document.querySelector('.descricao-vila-alafia');
  const linkEscola = document.querySelector('.link-vila-alafia-desktop');
  const imgEscola = document.querySelector('.image-vila-alafia');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.vila-alafia',
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
function backgroundVila() {
  gsap.registerPlugin(ScrollTrigger);
  const btnAppears = document.querySelector('.vila-alafia');

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

  gsap.from('.vila-alafia', {
    scrollTrigger: {
      trigger: '.vila-alafia',
      start: 'top-=300 center',
      scrub: true,
      onEnter: bgOpen,
      onLeaveBack: bgClose,
    },
  });
}
function animationInstitutoSuperacao() {
  const logoSVG = document.querySelector('.box-svg-instituto-padre-arlindo');
  const tituloAssociacao = document.querySelector('.titulo-instituto-padre-arlindo');
  const descricaoAssociacao = document.querySelector('.descricao-instituto-padre-arlindo');
  const linkAssociacao = document.querySelector('.link-instituto-padre-arlindo-desktop');
  const imgAssociacao = document.querySelector('.box-conteudo-right-instituto-padre-arlindo');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.instituto-padre-arlindo',
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
function backgroundAssociacaoSuperacao() {
  gsap.registerPlugin(ScrollTrigger);
  const btnAppears = document.querySelector('.associacao-superacao');

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

  gsap.from('.associacao-superacao', {
    scrollTrigger: {
      trigger: '.associacao-superacao',
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
  const imgAssociacao = document.querySelector('.image-associacao-superacao');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.associacao-superacao',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-left'),
  })
    .from(
      tituloAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloAssociacao.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      descricaoAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoAssociacao.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      linkAssociacao,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkAssociacao.classList.add('fade-left'),
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
  const linkEscola = document.querySelector('.link-escola-desktop');
  const imgEscola = document.querySelector('.box-conteudo-right-escola');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.escola-formacao-due',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-right'),
  })
    .from(
      tituloEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloEscola.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      descricaoEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoEscola.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      linkEscola,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkEscola.classList.add('fade-right'),
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
  const tituloincentivo = document.querySelector('.titulo-incentivo-empreendedorismo');
  const descricaoincentivo = document.querySelector('.descricao-incentivo-empreendedorismo');
  const linkEmpreendedorismo = document.querySelector('.link-empreendedorismo-desktop');
  const imgincentivo = document.querySelector('.box-conteudo-right-incentivo-empreendedorismo');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.incentivo-empreendedorismo',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-left'),
  })
    .from(
      tituloincentivo,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloincentivo.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      descricaoincentivo,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoincentivo.classList.add('fade-left'),
      },
      '-=0.7'
    )

    .from(
      linkEmpreendedorismo,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkEmpreendedorismo.classList.add('fade-left'),
      },
      '-=0.7'
    )
    .from(
      imgincentivo,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgincentivo.classList.add('imgPath'),
      },
      '0'
    );
}
function backgroundIncentivo() {
  gsap.registerPlugin(ScrollTrigger);
  const bg = document.querySelector('.incentivo-empreendedorismo');

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

  gsap.from('.incentivo-empreendedorismo', {
    scrollTrigger: {
      trigger: '.incentivo-empreendedorismo',
      start: 'top-=300 center',
      scrub: true,
      onEnter: bgOpen,
      onLeaveBack: bgClose,
    },
  });
}

function animationProposito() {
  const logoSVG = document.querySelector('.box-svg-proposito');
  const tituloProposito = document.querySelector('.titulo-proposito');
  const descricaoProposito = document.querySelector('.descricao-proposito');
  const linkProposito = document.querySelector('.link-proposito');
  const imgProposito = document.querySelector('.box-conteudo-right-proposito');
  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.proposito',
      start: 'top-=400',
    },
  });

  TLFADE.from(logoSVG, {
    duration: 1,
    ease: 'power.in',
    onStart: () => logoSVG.classList.add('fade-right'),
  })
    .from(
      tituloProposito,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => tituloProposito.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      descricaoProposito,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => descricaoProposito.classList.add('fade-right'),
      },
      '-=0.7'
    )
    .from(
      linkProposito,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => linkProposito.classList.add('fade-right'),
      },
      '-=0.7'
    )

    .from(
      imgProposito,
      {
        duration: 1,
        ease: 'power.in',
        onStart: () => imgProposito.classList.add('imgPath'),
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



function btnFixed() {
  gsap.registerPlugin(ScrollTrigger);

  gsap.to('.botoes-fixed', {
    scrollTrigger: {
      trigger: document.body,
      start: 'top+=200px top',
      end: 'top top',
      toggleActions: 'play none reverse none',
      markers: false,
    },
    opacity: 1,
    zIndex: 9,
    duration: 0.5,
    ease: 'power1.inOut',
  });

  ScrollTrigger.create({
    trigger: '.selos-certificados',
    start: 'top top',
    end: 'bottom top',
    toggleActions: 'play none none reverse',
    onEnter: () => {
      gsap.to('.botoes-fixed', {
        opacity: 0,
        zIndex: -1,
        duration: 0.5,
        ease: 'power1.inOut',
      });
    },
    onLeaveBack: () => {
      gsap.to('.botoes-fixed', {
        opacity: 1,
        zIndex: 9,
        duration: 0.5,
        ease: 'power1.inOut',
      });
    },
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
  btnFixed();
  selosAccordion();
  animationInstitutoSuperacao();
  backgroundVila();
  animationVila();
}

export {initIniciativas};

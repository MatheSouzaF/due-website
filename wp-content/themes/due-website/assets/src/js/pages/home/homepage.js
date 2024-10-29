import { renderFiltersHome } from '../../components/filter-home';
import { getFilterLabel } from '../../utils/get-filter-label';

function swiperEmpreendimento() {
  const swiper = new Swiper('.swiper-empreendimento', {
    spaceBetween: 16,
    draggable: true,
    breakpoints: {
      767: {
        slidesPerView: 2.4,
      },
      1024: {
        slidesPerView: 3.2,
      },
      1280: {
        slidesPerView: 3.4,
      },
    },
    navigation: {
      nextEl: '.swiper-btn-next',
      prevEl: '.swiper-btn-prev',
    },
  });
}
function wordAnimation() {
  var words = document.getElementsByClassName('word');
  var currentWord = 0;

  // Inicializa todos os elementos com opacity 0, exceto o primeiro
  for (var i = 0; i < words.length; i++) {
    words[i].style.opacity = i === 0 ? 1 : 0;
  }

  function changeWord() {
    var cw = words[currentWord];
    var nw = currentWord == words.length - 1 ? words[0] : words[currentWord + 1];

    animateWordOut(cw);
    animateWordIn(nw);

    currentWord = currentWord == words.length - 1 ? 0 : currentWord + 1;
  }

  function animateWordOut(cw) {
    cw.style.opacity = 0; // Sai de cena
  }

  function animateWordIn(nw) {
    nw.style.opacity = 1; // Entra em cena
  }

  setInterval(changeWord, 2000);
}

setTimeout(wordAnimation, 1000);

function fadeConteudoEncantese() {
  $('.slide-effect')
    .mouseleave(function () {
      $(this).removeClass('clicked');
    })
    .click(function () {
      $(this).addClass('clicked').html($(this).html());
    });
}

function nossoProposito() {
  function initAnimations() {
    gsap.registerPlugin(ScrollTrigger);

    gsap.to('.img-proposito', {
      yPercent: 0.2,
      ease: 'none',
      scrollTrigger: {
        trigger: '.nosso-proposito',
        start: 'top-=400',
        end: 'bottom-=450',
        scrub: true,
      },
    });

    gsap.to('.video-proposito', {
      yPercent: -40,
      ease: 'none',
      scrollTrigger: {
        trigger: '.nosso-proposito',
        start: 'top-=300',
        end: 'bottom-=300',
        scrub: true,
      },
    });
  }

  function checkScreenWidth() {
    if (window.innerWidth >= 1023) {
      initAnimations();
    } else {
      ScrollTrigger.getAll().forEach((trigger) => trigger.kill());
    }
  }

  checkScreenWidth();

  window.addEventListener('resize', function () {
    checkScreenWidth();
  });
}
function encantese() {
  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.matchMedia({
    '(min-width: 1024px)': function () {
      const encanteseZoom = document.querySelector('.encante-se');

      const btnAppears = document.querySelector('.box-conteudo-right');
      const showSvg = document.querySelector('.svg-caribe');

      function bgOpen() {
        if (btnAppears) {
          btnAppears.classList.add('clipPath');
        }
      }

      let TLFADE = gsap.timeline({
        duration: 1,
        scrollTrigger: {
          trigger: '.encante-se',
          start: 'top center',
          onEnter: bgOpen,
        },
      });

      TLFADE.from(
        showSvg,
        {
          autoAlpha: 0,
          duration: 0.6,
        },
        '-=.2'
      );

      function zommOpen() {
        if (encanteseZoom) {
          encanteseZoom.classList.add('zoom');
        }
      }
      function bgClose() {
        if (encanteseZoom) {
          encanteseZoom.classList.remove('zoom');
        }
      }
      gsap.from('.encante-se', {
        scrollTrigger: {
          trigger: '.encante-se',
          start: 'top-=500',
          end: 'bottom-=400 ',
          scrub: true,
          onEnter: zommOpen,
          onLeave: bgClose,
        },
      });
    },
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
    trigger: '.invista',
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

function checkbox() {
  $('.titulo-checkbox-destino').on('click', function (e) {
    e.preventDefault();
    $(this).siblings('div.select').slideToggle();
    $(this).toggleClass('active');
  });
}

function loadSearchBox() {
  const tipologiasData = TipologiasDataHome.tipologias;

  function populateFilterOptions() {
    const locationOptions = [...new Set(tipologiasData.map((e) => e.location))];
    const roomsOptions = new Set();

    tipologiasData.forEach((e) => {
      if (e.rooms && e.rooms.length > 0) {
        let minimo = parseInt(e.rooms[0].minimo_de_quartos_tipologia, 10);
        let maximo = parseInt(e.rooms[0].maximo_de_quartos_tipologia, 10);

        if (isNaN(minimo) || minimo <= 1) {
          minimo = 1;
        }

        if (isNaN(maximo) || maximo <= 1) {
          maximo = 1;
        }

        if (maximo < minimo) {
          maximo = minimo;
        }

        for (let i = minimo; i <= maximo; i++) {
          roomsOptions.add(i);
        }
      }
    });

    const isStudio = tipologiasData.map((t) => t.isStudio).includes(true);

    const options = {
      location: Array.from(locationOptions).map((location) => ({
        value: location,
        label: location,
      })),
      rooms: [
        ...(isStudio ? [{ value: 'studio', label: 'Studio' }] : []),
        ...Array.from(roomsOptions)
          .sort()
          .map((room) => ({
            value: room,
            label: `${room} ${room === 1 ? 'quarto' : 'quartos'}`,
          })),
      ],
    };

    return options;
  }

  const filters = {
    location: $('#home-filter-location, #home-mobile-filter-location'),
    rooms: $('#home-filter-rooms, #home-mobile-filter-rooms'),
  };

  const options = populateFilterOptions();
  renderFiltersHome(filters, options);

  function removeAccents(str) {
    return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
  }

  function getUniqueValues(array) {
    return [...new Set(array)];
  }

  function updateSelectedValues(filterType) {
    const selectedValues = getFilterLabel(`#home-filter-${filterType}`);

    let destinoElement;
    if (filterType === 'location') {
      destinoElement = $('.container-destino .titulo-checkbox-destino');
    } else if (filterType === 'rooms') {
      destinoElement = $('.container-quartos .titulo-checkbox-quartos');
    }

    if (destinoElement && destinoElement.length > 0) {
      if (selectedValues && selectedValues.length > 0) {
        destinoElement.text(selectedValues.join(', '));
      } else {
        if (filterType === 'location') {
          destinoElement.text('Selecione um destino');
        } else {
          destinoElement.text('Quantos quartos?');
        }
      }
    }
  }

  function buildFilterUrl() {
    const locationFilter = getFilterLabel('#home-filter-location, #home-mobile-filter-locations');
    const roomsFilter = getFilterLabel('#home-filter-rooms, #home-mobile-filter-rooms');

    const params = new URLSearchParams();
    let hasFilters = false;

    if (locationFilter) {
      const formattedLocation = locationFilter.map((value) =>
        encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, ''))
      );
      params.set('tipo-localizacao', getUniqueValues(formattedLocation).join(','));
      hasFilters = true;
    }

    if (roomsFilter) {
      const formattedRooms = roomsFilter.map((value) =>
        encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, ''))
      );
      params.set('tipo-qtos', getUniqueValues(formattedRooms).join(','));
      hasFilters = true;
    }

    if (hasFilters) {
      params.set('tipologia', 'true');
    }

    const newUrl = `/empreendimentos${params.toString() ? '?' + params.toString() : ''
      }`;

    $('.busca-banner').attr('href', newUrl);
    console.log('URL Filtrada:', newUrl);
  }

  filters['location'].find('input.ckkBox').on('change', function () {
    updateSelectedValues('location');
    buildFilterUrl();
  });

  filters['rooms'].find('input.ckkBox').on('change', function () {
    updateSelectedValues('rooms');
    buildFilterUrl();
  });

  $('.filter-button').click(function () {
    $('.filter-drawer').addClass('open');
    $('body').addClass('drawer-open');
  });

  $('.drawer-content').on('click', '.category-toggle', function (e) {
    e.stopPropagation(); // Evita o fechamento quando clicar no próprio toggle

    // Fecha todos os elementos abertos com animação
    $('.category-content.open').not($(this).next()).slideUp(300).removeClass('open');

    // Abre o elemento clicado com animação
    $(this).next('.category-content').slideToggle(300).toggleClass('open');
  });

  $(document).on('click', function (e) {
    // Verifica se o clique NÃO foi dentro de .drawer-content E NÃO foi no .filter-button
    if (!$(e.target).closest('.drawer-content').length && !$(e.target).closest('.filter-button').length) {
      $('.filter-drawer').removeClass('open');
      $('body').removeClass('drawer-open');

      // Opcional: Fecha todas as categorias abertas com animação
      $('.category-content.open').slideUp(300).removeClass('open');
    }
  });

  $('.apply-filters').click(function () {
    // Fechar o drawer
    $('.filter-drawer').removeClass('open');
    $('body').removeClass('drawer-open');
  });
}

function initPage() {
  swiperEmpreendimento();
  fadeConteudoEncantese();
  encantese();
  nossoProposito();
  wordAnimation();
  btnFixed();
  checkbox();
  loadSearchBox();
}

export { initPage };

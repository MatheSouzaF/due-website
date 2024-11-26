import {renderFiltersHome} from '../../components/filter-home';
import {getFilterLabel} from '../../utils/get-filter-label';

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
  
}


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
        let minimo = parseInt(e.rooms[0], 10);
        let maximo = parseInt(e.rooms[e.rooms.length - 1], 10);


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
    console.log("🚀 ~ tipologiasData:", tipologiasData)

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

  function containsOnly(array1, array2) {
    return array2.every(elem => array1.includes(elem)) && array1.length === array2.length;
  }  

  function updateSelectedValues(filterType) {
    const selectedValues = getFilterLabel(`#home-filter-${filterType}, #home-mobile-filter-${filterType}`);

    let destinoElement;
    if (filterType === 'location') {
      destinoElement = $('.container-destino .titulo-checkbox-destino');
    } else if (filterType === 'rooms') {
      destinoElement = $('.container-quartos .titulo-checkbox-quartos');
    }

    if (!destinoElement || destinoElement.length === 0) {
      return;
    }

    if (selectedValues && selectedValues.length > 0) {
      if (filterType === 'rooms') {
        let suffix

        suffix = (containsOnly(selectedValues, ['1']) || containsOnly(selectedValues, ['studio', '1'])) ? ' quarto' : ' quartos';
        const labels = selectedValues.join(', ')
        
        destinoElement.text(`${labels} ${labels === 'studio' ? '' : suffix}`);
        return;
      }
    
      destinoElement.text(selectedValues.join(', '));
      return;
    }

    if (filterType === 'location') {
      destinoElement.text(originalLabels.destino);
    } else {
      destinoElement.text(originalLabels.quarto);
    }
  }

  function buildFilterUrl() {
    const locationFilter = getFilterLabel('#home-filter-location, #home-mobile-filter-location');
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

    const newUrl = `/empreendimentos${params.toString() ? '?' + params.toString() : ''}`;

    $('.busca-banner').attr('href', newUrl);
  }

  let filteredTipologias = [];

  function getFilterValue(filterType) {
    const selector = filters[filterType];
    const value = selector
    .find('input:checked')
    .map(function () {
        return this.value;
      })
      .get();

    return value.length > 0 ? value : null;
  }

  function filterTipologias(tipologias) {
    const locationFilter = getFilterValue('location');
    const roomsFilter = getFilterValue('rooms');

    if (!locationFilter && !roomsFilter) {
      return tipologias;
    }

    return tipologias.filter((tipologia) => {
      const matchLocation = !locationFilter || locationFilter.includes(tipologia.location);
      const matchRooms =
        !roomsFilter ||
        (roomsFilter.includes('studio') && tipologia.isStudio) ||
        roomsFilter.some((selectedRoom) => tipologia.rooms.includes(selectedRoom));

        return matchLocation && matchRooms;
    });
  }

  function filterAndRender() {
    filteredTipologias = filterTipologias(tipologiasData);
  }


  function hideOptions(changedFilter) {
    const isOptionVisible = (value, key) => {
      return filteredTipologias.some((tipologia) => {
        if (key === 'location') return tipologia.location === value;
        if (key === 'rooms') {
          const minimo = parseInt(tipologia.rooms[0], 10);
          let maximo = parseInt(tipologia.rooms[tipologia.rooms.length - 1], 10);


          if (maximo === 0) {
            maximo = minimo;
          }

          return (tipologia.isStudio && value === 'studio') || (value >= minimo && value <= maximo);
        }
        return false;
      });
    };

    const getAppliedFilterCategories = () => {
      return Object.keys(filters).filter((key) => {
        return filters[key].find('input.ckkBox:checked').length > 0;
      });
    };

    const appliedFilterCategories = getAppliedFilterCategories();

    if (appliedFilterCategories.length === 0) {
      Object.keys(filters).forEach((key) => {
        filters[key].find('input.ckkBox').each(function () {
          $(this).closest('label').show();
        });
      });
      return;
    }

    if (appliedFilterCategories.length === 1) {
      const lastFilterCategory = appliedFilterCategories[0];
      filters[lastFilterCategory].find('input.ckkBox').each(function () {
        $(this).closest('label').show();
      });
    }

    Object.keys(filters).forEach((key) => {
      if (key !== changedFilter) {
        const $filter = filters[key];
        if (!(appliedFilterCategories.length === 1 && key === appliedFilterCategories[0])) {
          $filter.find('input.ckkBox').each(function () {
            const $checkbox = $(this);
            const value = $checkbox.val();

            if (isOptionVisible(value, key) || $checkbox.is(':checked')) {
              $checkbox.closest('label').show();
            } else {
              $checkbox.closest('label').hide();
            }
          });
        }
      }
    });
  }

  filters['location'].find('input.ckkBox').on('change', function () {
    filterAndRender();
    updateSelectedValues('location');
    buildFilterUrl();
    updateFilterNumberIndicador();
    hideOptions('location');
  });

  filters['rooms'].find('input.ckkBox').on('change', function () {
    filterAndRender();
    updateSelectedValues('rooms');
    buildFilterUrl();
    updateFilterNumberIndicador();
    hideOptions('rooms');
  });

  function updateFilterNumberIndicador() {
    $('.filter-desktop .filter-wrapper, .filter-drawer .filter-category').each(function () {
      const current_filter = $(this);
      const checked_count = $(current_filter).find('.checkboxes input:checked, .category-content input:checked').length;
      const filter_count_el = $(current_filter).find('.filter_count');

      if (checked_count > 0) {
        $(filter_count_el).html(`(${checked_count})`);
      } else {
        $(filter_count_el).html('');
      }
    });
  }

  $('.filter-button').click(function () {
    // Adiciona as classes para abrir o drawer
    $('.filter-drawer').addClass('open');
    $('body').addClass('drawer-open');

    // Verifica qual botão foi clicado
    if ($(this).hasClass('container-quartos')) {
      // Se for o botão de "Quartos", dispara o clique no botão correspondente
      $('#home-mobile-filter-rooms').siblings('.category-toggle').click();
    } else if ($(this).hasClass('container-destino')) {
      // Se for o botão de "Destino", dispara o clique no botão correspondente
      $('#home-mobile-filter-location').siblings('.category-toggle').click();
    }
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
  checkbox();
  loadSearchBox();
}

export {initPage};

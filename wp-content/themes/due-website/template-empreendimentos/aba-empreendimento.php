<div class="container-filtros">

  <button class="filter-button"><svg width="46" height="46" viewBox="0 0 46 46" fill="none"
      xmlns="http://www.w3.org/2000/svg">
      <circle cx="23" cy="23" r="23" fill="#FAF2EB" />
      <path d="M33 14H13L21 23.46V30L25 32V23.46L33 14Z" stroke="#003B4B" stroke-linecap="round"
        stroke-linejoin="round" />
    </svg>
  </button>
  <div class="filter-container">
    <div class="filter-drawer">
      <div class="drawer-content">
        <div class="filter-category">
          <button class="category-toggle">
            <p class="">Destino <span class="filter_count"></span></p>
            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
              fill="none">
              <path d="M14.625 6.1875L9 11.8125L3.375 6.1875" stroke="#003b4b" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <div class="category-content" id="mobile-filter-location">
            <div class="inner-wrap">
            </div>
          </div>
        </div>
        <div class="filter-category">
          <button class="category-toggle">
            <p class="">Estágio <span class="filter_count"></span></p>
            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
              fill="none">
              <path d="M14.625 6.1875L9 11.8125L3.375 6.1875" stroke="#003b4b" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <div class="category-content" id="mobile-filter-status">
            <div class="inner-wrap">
            </div>
          </div>
        </div>
        <div class="filter-category">
          <button class="category-toggle">
            <p class="">Nº de quartos <span class="filter_count"></span></p>
            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
              fill="none">
              <path d="M14.625 6.1875L9 11.8125L3.375 6.1875" stroke="#003b4b" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <div class="category-content" id="mobile-filter-rooms">
            <div class="inner-wrap">
            </div>
          </div>
        </div>
      </div>
      <div class="drawer-footer">
        <button class="apply-filters">Buscar</button>
        <button class="clean-filters founders-grotesk">Limpar filtros</button>
      </div>
    </div>

    <div class="filter-desktop">
      <div class="col-md-4">
        <div class="filter-wrapper">
          <button class="form-control founders-grotesk toggle-next ellipsis">
            <p class="">Destino <span class="filter_count"></span></p>
            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
              fill="none">
              <path d="M14.625 6.1875L9 11.8125L3.375 6.1875" stroke="#003b4b" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <div class="checkboxes" id="filter-location">
            <div class="inner-wrap">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="filter-wrapper">
          <button class="form-control founders-grotesk toggle-next ellipsis">
            <p class="">Estágio <span class="filter_count"></span></p>
            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
              fill="none">
              <path d="M14.625 6.1875L9 11.8125L3.375 6.1875" stroke="#003b4b" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <div class="checkboxes" id="filter-status">
            <div class="inner-wrap">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="filter-wrapper">
          <button class="form-control founders-grotesk toggle-next ellipsis">
            <p class="">Nº de quartos <span class="filter_count"></span></p>
            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
              fill="none">
              <path d="M14.625 6.1875L9 11.8125L3.375 6.1875" stroke="#003b4b" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <div class="checkboxes" id="filter-rooms">
            <div class="inner-wrap">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="empreendimentos-results">
    <p class="results-text founders-grotesk"></p>
    <div class="badges-filters">
      <div class="filters-applied"></div>
      <button class="clean-filters founders-grotesk">Limpar filtros</button>
    </div>
  </div>
</div>

<!-- Cards -->
<section class="empreendimentos cards">
  <!-- Template do card de empreendimento -->
</section>
<template id="empreendimento-template">
  <div class="card-empreendimentos">
    <a class="box-card" href="#">
      <div class="box-midia">
        <img class="imagem-empreendimento" src="" alt="">
        <video class="video-empreendimento" src="" autoplay="autoplay" muted loop playsinline></video>
      </div>
      <div class="box-label">
        <p class="terminal-test label-informativo"></p>
      </div>
      <div class="box-textos-empreendimentos">
        <div class="container-text">
          <div class="box-titulos">
            <p class="localizacao-empreendimento terminal-test"></p>
            <h4 class="nome-empreendimento founders-grotesk"></h4>
          </div>
          <div class="box-svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="26" viewBox="0 0 43 26" fill="none">
              <path d="M-5.24537e-07 13L41.5 13M41.5 13L29.5 25M41.5 13L29.5 0.999999" stroke="white" />
            </svg>
          </div>
        </div>
        <div class="box-informacoes">
          <div class="informacoes">
            <div class="box-svg">
              <!-- SVG mockado -->
              <i class="element">
                <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_2640_2590)">
                    <path
                      d="M7.91185 5.14562C7.91185 6.75052 6.17451 7.7535 4.78455 6.95116C4.13951 6.5787 3.74219 5.89054 3.74219 5.14562C3.74219 3.54072 5.47953 2.53752 6.86949 3.34008C7.51453 3.71254 7.91185 4.4007 7.91185 5.14562Z"
                      stroke="white" stroke-width="1.03125" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M0.613281 1.3833V10.1129" stroke="white" stroke-width="1.03125" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M20.0173 13.3042V10.1133H0.613281V13.3042" stroke="white" stroke-width="1.03125"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20.0173 10.1131V7.37499C20.0173 4.99371 18.0865 3.06321 15.7053 3.06299H11.0547V10.1131"
                      stroke="white" stroke-width="1.03125" stroke-linecap="round" stroke-linejoin="round" />
                  </g>
                  <defs>
                    <clipPath id="clip0_2640_2590">
                      <rect width="20.625" height="13.0625" fill="white" transform="translate(0 0.46875)" />
                    </clipPath>
                  </defs>
                </svg>

              </i>
            </div>
            <p class="founders-grotesk info-quartos"></p>
          </div>
          <div class="informacoes">
            <div class="box-svg">
              <!-- SVG mockado -->
              <i class="element">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M5.625 1H2.625C2.09457 1 1.58586 1.21071 1.21079 1.58579C0.835714 1.96086 0.625 2.46957 0.625 3V6M18.625 6V3C18.625 2.46957 18.4143 1.96086 18.0392 1.58579C17.6641 1.21071 17.1554 1 16.625 1H13.625M13.625 19H16.625C17.1554 19 17.6641 18.7893 18.0392 18.4142C18.4143 18.0391 18.625 17.5304 18.625 17V14M0.625 14V17C0.625 17.5304 0.835714 18.0391 1.21079 18.4142C1.58586 18.7893 2.09457 19 2.625 19H5.625"
                    stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </i>
            </div>
            <p class="founders-grotesk info-tamanho"></p>
          </div>
        </div>
      </div>
    </a>
    <div class="box-valores">
      <div class="valores">
        <p class="entradas founders-grotesk"></p>
        <p class="valor founders-grotesk"></p>
      </div>
      <div class="fale-com-time">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
          <circle cx="10" cy="10" r="5" fill="#8AC550" />
          <circle cx="10" cy="10" r="9.5" stroke="#89C550" />
        </svg>
        <p class="texto-fale founders-grotesk"><?php echo __('Contato comercial', 'due-website') ?></p>
      </div>
    </div>
  </div>
</template>

<div id="no-empreendimentos-message" style="display: none;">
  <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none">
    <path d="M19.25 49V37.625C19.25 36.176 20.426 35 21.875 35H27.125C28.574 35 29.75 36.176 29.75 37.625V49M29.75 49H40.25V8.27167M29.75 49H47.25V25.0833M40.25 8.27167L43.75 7M40.25 8.27167L15.75 17.1827M47.25 25.0833L40.25 22.75M47.25 25.0833L50.75 26.25M5.25 49H8.75M8.75 49H50.75M8.75 49V7H15.75V17.1827M5.25 21L15.75 17.1827" stroke="#003B4B" stroke-opacity="0.5" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
  </svg>
  <p><?php echo __('Não encontramos resorts disponíveis com os filtros selecionados.', 'due-website') ?></p>
  <p><?php echo __('Por favor, desmarque alguma opção dos filtros ou limpe todos para recomeçar.', 'due-website') ?></p>
  <button class="clean-filters founders-grotesk">Limpar filtros</button>
</div>
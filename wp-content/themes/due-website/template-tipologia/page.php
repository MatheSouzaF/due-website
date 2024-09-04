<?php
// Template Name: Tipologias
wp_enqueue_style('tipologia', get_template_directory_uri() . '/assets/dist/css/tipologia/tipologia.css', ['main'], ASSETS_VERSION);

get_header();

$args = array(
  'post_type' => 'tipologias',
  'posts_per_page' => -1,
  // Adicione outros argumentos conforme necessário
);

$query = new WP_Query($args);
$tipologias = array();

if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();

    $tipologia_id = get_the_ID();
    $name = get_field('nome_da_tipologia', $tipologia_id);
    $project = get_field('pertence_a_qual_empreendimento', $tipologia_id);
    $location = get_field('localizacao_tipologia', $tipologia_id);
    $status = get_field('estagio_da_obra_tipologia', $tipologia_id);
    $isStudio = get_field('e_um_studio_tipologia', $tipologia_id);
    $rooms = get_field('quantidade_de_quartos_tipologia', $tipologia_id);
    $size = get_field('metragem_tipologia', $tipologia_id);
    $diffs = get_field('diferenciais_tipologia', $tipologia_id);
    $photo = get_field('foto_da_tipologia', $tipologia_id);


    $tipologias[] = array(
      'name' => $name,
      'id' => $tipologia_id,
      'project' => $project,
      'location' => $location,
      'isStudio' => $isStudio,
      'rooms' => $rooms,
      'size' => $size,
      'status' => $status,
      'diffs' => $diffs,
      'photo' => $photo,
    );
  }
  wp_reset_postdata();
}

// Passar os dados para o JavaScript
wp_localize_script('main', 'TipologiasData', array(
  'tipologias' => $tipologias,
));
?>

<main class="page-tipologias">
  <div class="wrapper">
    <div class="tipologias-header">
      <div class="tipologia-tabs">
        <a rel="stylesheet" href="#">
          <h2>EMPREENDIMENTOS</h2>
        </a>
        <a rel="stylesheet" href="#">
          <h2 class="active">TIPOLOGIAS</h2>
        </a>
      </div>

      <div class="filter-container">
        <hr>
        <div class="col-md-4">
          <div class="filter-wrapper">
            <button class="form-control toggle-next ellipsis">Destino</button>
            <div class="checkboxes" id="filter-location">
              <div class="inner-wrap">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="filter-wrapper">
            <button class="form-control toggle-next ellipsis">Estágio</button>
            <div class="checkboxes" id="filter-status">
              <div class="inner-wrap">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="filter-wrapper">
            <button class="form-control toggle-next ellipsis">Empreendimento</button>
            <div class="checkboxes" id="filter-empreendimento">
              <div class="inner-wrap">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="filter-wrapper">
            <button class="form-control toggle-next ellipsis">Nº de quartos</button>
            <div class="checkboxes" id="filter-rooms">
              <div class="inner-wrap">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="filter-wrapper">
            <button class="form-control toggle-next ellipsis">Diferenciais</button>
            <div class="checkboxes" id="filter-diferenciais">
              <div class="inner-wrap">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="tipologias-results">
      <p class="results-text">Selecionamos <strong><span class="results-length"></span> tipologia(s)</strong> para você
      </p>
      <div class="filters-applied"></div>
    </div>

    <!-- Cards -->
    <section class="cards container-tipologias">
      <!-- Template do card de tipologia -->
    </section>
    <template id="tipologia-template">
      <div class="card-tipologias">
        <a class="box-card" href="#" target="_self">
          <div class="box-midia">
            <img class="imagem-tipologia" src="" alt="">
          </div>

          <div class="box-label">
            <p class="terminal-test label-informativo"></p>
          </div>
        </a>

        <div class="box-textos-tipologia">
          <div class="container-text">
            <div class="box-container-svg">
              <p class="nome-empreendimento terminal-test"></p>
              <div class="fale-com-time">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                  <circle cx="10" cy="10" r="5" fill="#861D1D" />
                  <circle cx="10" cy="10" r="9.5" stroke="#861D1D" />
                </svg>
                <p class="texto-fale founders-grotesk"></p>
              </div>
            </div>
            <h4 class="nome-tipologia founders-grotesk"></h4>
            <div class="localizacao-text">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                <path
                  d="M9.93329 7.39984C9.93329 8.0788 9.66436 8.72994 9.18565 9.21004C8.70695 9.69013 8.05769 9.95984 7.38071 9.95984C6.70372 9.95984 6.05446 9.69013 5.57576 9.21004C5.09706 8.72994 4.82812 8.0788 4.82812 7.39984C4.82812 6.72089 5.09706 6.06974 5.57576 5.58965C6.05446 5.10956 6.70372 4.83984 7.38071 4.83984C8.05769 4.83984 8.70695 5.10956 9.18565 5.58965C9.66436 6.06974 9.93329 6.72089 9.93329 7.39984Z"
                  stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M13.7629 7.4C13.7629 13.4945 7.38145 17 7.38145 17C7.38145 17 1 13.4945 1 7.4C1 5.70261 1.67233 4.07475 2.86908 2.87452C4.06584 1.67428 5.68899 1 7.38145 1C9.07392 1 10.6971 1.67428 11.8938 2.87452C13.0906 4.07475 13.7629 5.70261 13.7629 7.4Z"
                  stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <p class="localizacao-tipologia founders-grotesk"></p>
            </div>
          </div>
          <div class="box-informacoes">
            <div class="informacoes">
              <div class="box-svg">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="30" height="30" rx="15" fill="#FAF2EB" fill-opacity="0.7" />
                  <g clip-path="url(#clip0_2244_4806)">
                    <path
                      d="M13.0365 13.4828C13.0365 14.7959 11.6151 15.6165 10.4778 14.96C9.95008 14.6553 9.625 14.0923 9.625 13.4828C9.625 12.1697 11.0465 11.3489 12.1837 12.0055C12.7115 12.3103 13.0365 12.8733 13.0365 13.4828Z"
                      stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7.0625 10.4043V17.5467" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M22.9385 20.1581V17.5474H7.0625V20.1581" stroke="#003B4B" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M22.9385 17.5471V15.3068C22.9385 13.3585 21.3588 11.779 19.4105 11.7788H15.6055V17.5471"
                      stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                  </g>
                  <defs>
                    <clipPath id="clip0_2244_4806">
                      <rect width="16.875" height="10.6875" fill="white" transform="translate(6.5625 9.65625)" />
                    </clipPath>
                  </defs>
                </svg>

              </div>
              <p class="founders-grotesk info-quartos"></p>
            </div>
            <div class="informacoes">
              <div class="box-svg">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle opacity="0.7" cx="15" cy="15" r="15" fill="#FAF2EB" />
                  <path
                    d="M12.3333 9H10.3333C9.97971 9 9.64057 9.14048 9.39052 9.39052C9.14048 9.64057 9 9.97971 9 10.3333V12.3333M21 12.3333V10.3333C21 9.97971 20.8595 9.64057 20.6095 9.39052C20.3594 9.14048 20.0203 9 19.6667 9H17.6667M17.6667 21H19.6667C20.0203 21 20.3594 20.8595 20.6095 20.6095C20.8595 20.3594 21 20.0203 21 19.6667V17.6667M9 17.6667V19.6667C9 20.0203 9.14048 20.3594 9.39052 20.6095C9.64057 20.8595 9.97971 21 10.3333 21H12.3333"
                    stroke="#003B4B" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

              </div>
              <p class="founders-grotesk info-tamanho"></p>
            </div>
          </div>
          <div class="box-tipos">
            <!-- Renderizado pelo javascript -->
          </div>
        </div>
      </div>
    </template>

  </div>

  <?php get_template_part('template-realizamos-sonhos/realizamos-sonhos'); ?>
  <?php get_template_part('template-invista/invista'); ?>

</main>

<?php
get_footer();
?>
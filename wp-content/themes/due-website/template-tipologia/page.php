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
            <div class="checkboxes" id="filter-rooms">
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
     <section class="tipologias cards">
      <!-- Template do card de tipologia -->
    </section>
    <template id="tipologia-template">
      <div class="card-tipologias">
        <a class="box-card" href="#">
          <div class="box-midia">
            <img class="imagem-tipologias" src="#" alt="">
          </div>

          <div class="box-label" style="background-color: #f0f0f0;">
            <p class="terminal-test label-informativo">Label Informativo</p>
          </div>
        </a>
        <div class="box-textos-tipologias">
          <div class="container-text">
            <h4 class="nome-tipologias founders-grotesk">Nome da Tipologia</h4>
            <div class="localizacao-text">
              <p class="localizacao-titulo founders-grotesk">Localização</p>
            </div>
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
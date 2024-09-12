<?php

wp_enqueue_style('empreendimento', get_template_directory_uri() . '/assets/dist/css/empreendimento/empreendimento.css', ['main'], ASSETS_VERSION);
wp_enqueue_style('tipologia', get_template_directory_uri() . '/assets/dist/css/tipologia/tipologia.css', ['main'], ASSETS_VERSION);

get_header();

$empreendimentosController = new EmpreendimentoController();
$empreendimentos = $empreendimentosController->getAllProjects();
wp_localize_script('main', 'EmpreendimentosData', array(
  'empreendimentos' => $empreendimentos,
));

?>

<!-- Tipologias -->
<?php
$argsTipologia = array(
  'post_type' => 'tipologias',
  'posts_per_page' => -1,
);

$queryTipologia = new WP_Query($argsTipologia);
$tipologias = array();

if ($queryTipologia->have_posts()) {
  while ($queryTipologia->have_posts()) {
    $queryTipologia->the_post();

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

    $project_id = null;
    if ($project) {
      $project_query = new WP_Query(array(
        'post_type' => 'empreendimentos',
        'title' => $project,
        'posts_per_page' => 1
      ));

      if ($project_query->have_posts()) {
        $project_query->the_post();
        $project_id = get_the_ID();
      }
      wp_reset_postdata();
    }

    if ($project_id) {
      $project_location = get_field('localizacao_emprendimento', $project_id);
      $project_status = get_field('estagio_da_obra', $project_id);
    }

    $tipologias[] = array(
      'name' => $name,
      'id' => $tipologia_id,
      'project' => $project,
      'location' => isset($project_location) ? $project_location : '',
      'status' => isset($project_status) ? $project_status : '',
      'isStudio' => $isStudio,
      'rooms' => $rooms,
      'size' => $size,
      'diffs' => $diffs,
      'photo' => $photo,
    );
  }
  wp_reset_postdata();
}


wp_localize_script('main', 'TipologiasData', array(
  'tipologias' => $tipologias,
));
?>

<main class="page-empreendimentos-tipologia">
  <div class="wrapper">
    <div class="empreendimentos-header">
      <div class="empreendimento-tabs">
        <a rel="stylesheet" href="#">
          <h2 class="active">EMPREENDIMENTOS</h2>
        </a>
        <a rel="stylesheet" href="/tipologias">
          <h2>TIPOLOGIAS</h2>
        </a>
      </div>
    </div>

    <div class="aba-empreendimentos">
      <?php get_template_part('/template-empreendimentos/aba-empreendimento'); ?>
    </div>

    <div class="aba-tipologias">
      <?php get_template_part('/template-empreendimentos/aba-tipologia'); ?>
    </div>

  </div>

  <?php get_template_part('template-realizamos-sonhos/realizamos-sonhos'); ?>
  <?php get_template_part('template-invista/invista'); ?>

</main>

<?php
get_footer();
?>
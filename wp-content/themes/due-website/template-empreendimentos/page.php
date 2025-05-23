<?php

//Template Name: Empreendimentos

wp_enqueue_style('empreendimento', get_template_directory_uri() . '/assets/dist/css/empreendimento/empreendimento.css', ['main'], ASSETS_VERSION);
wp_enqueue_style('tipologia', get_template_directory_uri() . '/assets/dist/css/tipologia/tipologia.css', ['main'], ASSETS_VERSION);
get_header();


$empreendimentosController = new EmpreendimentoController();
$empreendimentos = $empreendimentosController->getAllProjects();
wp_localize_script('main', 'EmpreendimentosData', array(
  'empreendimentos' => $empreendimentos,
));

function wp_translations()
{
  return array(
    'single_selection' => __('Selecionamos <span class="bold-5">{count} imóvel</span> para você', 'due-website'),
    'multiple_selection' => __('Selecionamos <span class="bold-5">{count} imóveis</span> para você', 'due-website'),
    'single_selection_tipo' => __('Selecionamos <span class="bold-5">{count} tipologia</span> para você', 'due-website'),
    'multiple_selection_tipo' => __('Selecionamos <span class="bold-5">{count} tipologias </span> para você', 'due-website'),
    'load_more_button' => __('CARREGAR MAIS', 'due-website'),
    'studio_label' => __('Studio', 'due-website'),
    'room_label_single' => __('quarto', 'due-website'),
    'room_label_multiple' => __('quartos', 'due-website'),
    'last_units' => __('Últimas unidades', 'due-website'),
    'sold' => __('100% vendido', 'due-website'),
    'launch' => __('Lançamento', 'due-website'),
    'no_comments' => __('Sem comentários', 'due-website'),
  );
}
wp_localize_script('main', 'wp_translations', wp_translations());

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
    $lastUnits = get_field('ultimas_unidades', $tipologia_id);
    $isStudio = get_field('e_um_studio_tipologia', $tipologia_id);
    $rooms = get_field('quantidade_de_quartos_tipologia', $tipologia_id);
    $size = get_field('metragem_tipologia', $tipologia_id);
    $diffs = get_field('diferenciais_tipologia', $tipologia_id);
    $photo = get_field('foto_da_tipologia', $tipologia_id);
    $link = get_field('link_para_a_pagina_dessa_tipologia', $tipologia_id);

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
      $project_status = get_field('estagio_da_obra', $tipologia_id);
    }

    $tipologias[] = array(
      'name' => $name,
      'id' => $tipologia_id,
      'project' => $project,
      'location' => isset($project_location) ? $project_location : '',
      'status' => isset($project_status) ? $project_status : '',
      'isStudio' => $isStudio,
      'lastUnits' => isset($lastUnits) ? $lastUnits : '',
      'rooms' => $rooms,
      'size' => $size,
      'diffs' => $diffs,
      'photo' => $photo,
      'link' => $link,
    );
  }
  wp_reset_postdata();
}


wp_localize_script('main', 'TipologiasData', array(
  'tipologias' => $tipologias,
));
?>

<section class="page-empreendimentos-tipologia">
  <div class="wrapper">
    <section class="titulo-empreendimentos">
      <div class="titulo-ouse"><?php echo get_field('titulo_empreendimentos'); ?></div>
    </section>


    <div class="empreendimentos-header">
      <div class="empreendimento-tabs">
        <div rel="stylesheet" class="show-empreendimentos">
          <h2><?php echo __('EMPREENDIMENTOS', 'due-website') ?></h2>
        </div>
        <div rel="stylesheet" class="show-tipologias">
          <h2><?php echo __('TIPOLOGIAS', 'due-website') ?></h2>
        </div>
      </div>
    </div>

    <div class="aba-empreendimentos">
      <?php get_template_part('/template-empreendimentos/aba-empreendimento'); ?>
    </div>

    <div style="display: none;" class="aba-tipologias">
      <?php get_template_part('/template-empreendimentos/aba-tipologia'); ?>
    </div>
  </div>

  <?php
  $argsBanner = array(
    'post_type' => 'banner',
    'posts_per_page' => -1,
  );

  $queryBanner = new WP_Query($argsBanner);
  $banners = array();

  if ($queryBanner->have_posts()) {
    while ($queryBanner->have_posts()) {
      $queryBanner->the_post();

      $bannerId = get_the_ID();
      $banners[] = array(
        'location' => get_field('nome_do_destino'), 'due-website',
        'media' => get_field('foto_ou_video_do_destino'), 'due-website',
        'title' => get_field('titulo_do_banner'), 'due-website',
        'svg_rota' => get_field('svg_rota_due'), 'due-website',
        'description' => get_field('descricao_do_banner'), 'due-website',
        'link' => get_field('link'), 'due-website',
        'comments' => get_field('comentarios_do_banner'), 'due-website',
        'svg_caribe_logo' => get_field('svg_caribe'), 'due-website',
      );
    }
    wp_reset_postdata();
  }

  wp_localize_script('main', 'BannersData', array(
    'banners' => $banners,
  ));
  ?>
  <section class="encante-se">
    <div class="container-encante-se">
      <div class="wrapper">
        <div class="box-img-encante-se">
          <img id="image-inject" src="" alt="">
        </div>

        <div class="box-conteudo-left">
          <div class="box-svg fade-left" data-aos="fade-right">
            <i class="element" id="svg-rota-due"></i>
          </div>

          <h2 class="titulo-encante-se terminal-test fade-left" data-aos="fade-right" id="titulo-do-banner"></h2>
          <p class="descricao-encante-se founders-grotesk fade-left" data-aos="fade-right" id="descricao-do-banner">
          </p>

          <a class="link-encante-se button-v2 fade-left gtm-btn-banner-empreendimentos" data-aos="fade-right"
            id="link-banner" href="" target="_self">
            <p id="link-text"></p>
          </a>
        </div>
        <div class="box-conteudo-right" id="comentarios-container">
          <div class="svg-caribe">
            <i class="element" id="svg-caribe"></i>
          </div>
        </div>

      </div>
    </div>
  </section>

  <?php get_template_part('template-realizamos-sonhos/realizamos-sonhos'); ?>
  <?php get_template_part('template-invista/invista'); ?>
  <div class="call-form" id="call-form"></div>

</section>
<div class="drawer-overlay"></div>

<?php
get_footer();
?>
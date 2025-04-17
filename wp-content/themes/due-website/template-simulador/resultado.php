<?php
/**
 * Template para exibir o resultado do simulador
 */

// Função para obter todos os empreendimentos
function get_all_projects() {
    $current_lang = apply_filters('wpml_current_language', NULL);
    
    $args = array(
        'post_type' => 'empreendimentos',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'lang' => $current_lang
    );

    $query = new WP_Query($args);
    $all_projects = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $projectId = get_the_ID();
            $project_name = get_field('empreendimento_nome');

            $all_projects[] = array(
                'ID' => $projectId,
                'name' => $project_name,
                'location' => get_field('localizacao_emprendimento'),
                'isStudio' => get_field('e_um_studio'),
                'rooms' => get_field('quantidade_de_quartos'),
                'size' => get_field('metragem'),
                'status' => get_field('estagio_da_obra'),
                'offer' => get_field('oferta'),
                'tituloOffer' => get_field('tituloOferta'),
                'photo' => get_field('foto_empreendimento'),
                'video' => get_field('video_empreendimento'),
                'link' => get_field('link_da_pagina_desse_empreendimento'),
                'banner' => get_field('banner_do_destino')
            );
        }
        wp_reset_postdata();
    }

    return $all_projects;
}

// Obtém todos os empreendimentos para passar ao JavaScript
$all_projects = get_all_projects();

// Adiciona os dados ao JavaScript
wp_localize_script('main', 'simuladorData', [
    'projects' => $all_projects,
    'investmentRanges' => [
        'ate-500mil' => ['Costa dos Coqueiros', 'Costa do Mar', 'Costa Azul', 'Boulevard Praia dos Carneiros'],
        '500mil-1milhao' => ['Orla Praia dos Carneiros', 'Habitá Praia do Cupe'],
        'acima-1milhao' => ['Habitá Praia do Cupe', 'Cais Eco Residência', 'Orla Praia dos Carneiros']
    ]
]);
?>

<section class="resultado-simulador" style="display: none;">
    <div class="container">
        <div class="resultado-header">
            <i class="logo-due">
                <?php include('wp-content/themes/due-website/assets/src/img/logo-due.svg') ?>
            </i>
            <h1><?php echo __('Obrigado por responder o nosso questionário!', 'due-website') ?></h1>
            <p><?php echo __('Um dos nossos especialistas entrará em contato com você para apresentar a melhor opção DUE para o seu
                investimento.', 'due-website') ?></p>

        </div>

        <div class="resultado-label-wrapper">
            <div class="resultado-label"><?php echo __('Resultado do seu perfil', 'due-website') ?></div>
        </div>

        <div class="resultado-lista">
            <div class="resultado-cards" id="resultado-cards">
                <!-- Os cards de resultados serão inseridos aqui pelo JavaScript -->
            </div>
        </div>
    </div>
</section>

<template id="resultado-empreendimento-template">
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
      <a class="fale-com-time call-whats-open">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
          <circle cx="10" cy="10" r="5" fill="#8AC550" />
          <circle cx="10" cy="10" r="9.5" stroke="#89C550" />
        </svg>
        <p class="texto-fale founders-grotesk"><?php echo __('Fale com nosso time', 'due-website') ?></p>
      </a>
    </div>
  </div>
</template>
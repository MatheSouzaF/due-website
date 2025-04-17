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
<?php
/**
 * Template para exibir o resultado do simulador
 */

// Função para obter e filtrar os empreendimentos com base no range de investimento
function get_filtered_projects() {
    $projects = [];

    $current_lang = apply_filters('wpml_current_language', NULL);

    // Obtém o valor da faixa de investimento do formulário via JavaScript
    $investment_range = isset($_GET['faixa-investimento']) ? $_GET['faixa-investimento'] : '';
    
    $args = array(
        'post_type' => 'empreendimentos',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'lang' => $current_lang
    );

    $query = new WP_Query($args);
    $filtered_projects = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $projectId = get_the_ID();
            $project_name = get_field('empreendimento_nome');

            $project = array(
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

            // Aplica filtro com base na faixa de investimento
            if ($investment_range == 'ate-500mil' && 
                in_array($project_name, ['Costa dos Coqueiros', 'Costa do Mar', 'Costa Azul', 'Boulevard Praia dos Carneiros'])) {
                $filtered_projects[] = $project;
            } 
            elseif ($investment_range == '500mil-1milhao' && 
                    in_array($project_name, ['Orla Praia dos Carneiros', 'Habitá Praia do Cupe'])) {
                $filtered_projects[] = $project;
            }
            elseif ($investment_range == 'acima-1milhao' && 
                    in_array($project_name, ['Habitá Praia do Cupe', 'Cais Eco Residência', 'Orla Praia dos Carneiros'])) {
                $filtered_projects[] = $project;
            }
            // Se não houver filtro, inclui todos os projetos
            elseif (empty($investment_range)) {
                $filtered_projects[] = $project;
            }
        }
        wp_reset_postdata();
    }

    return $filtered_projects;
}

// Obtém os projetos filtrados
$filtered_projects = get_filtered_projects();
$total_projects = count($filtered_projects);
?>

<section class="resultado-simulador">
    <div class="container">
        <div class="resultado-header">
            <i class="logo-due">
                <?php include('wp-content/themes/due-website/assets/src/img/logo-due.svg') ?>
            </i>
            <h1>Obrigado por responder o nosso questionário!</h1>
            <p>Um dos nossos especialistas entrará em contato com você para apresentar a melhor opção DUE para o seu
                investimento.</p>

        </div>

        <div class="resultado-label-wrapper">
            <div class="resultado-label">Resultado do seu perfil</div>
        </div>

        <div class="resultado-lista">
            <h2>Encontramos <?php echo $total_projects; ?> empreendimentos para o seu perfil:</h2>
            <div class="resultado-cards">
                <?php 
                if (!empty($filtered_projects)) :
                    foreach ($filtered_projects as $project) : 
                ?>
                    <a class="box-card" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>">
                                    <div class="box-midia">
                                        <?php
                                        $image = get_sub_field('imagem_nossos_club_resorts');
                                        if ($image):
                                            $image_url = $image['url'];
                                            $image_alt = $image['alt'];
                                        ?>
                                            <img class="imagem-empreendimento" src="<?php echo esc_url($image_url); ?>"
                                                alt="<?php echo esc_attr($image_alt); ?>">
                                        <?php endif; ?>

                                        <video class="video-empreendimento" autoplay="autoplay"
                                            src="<?php echo get_sub_field('video_hover_empreendimento') ?>" muted loop
                                            playsinline></video>
                                    </div>

                                    <div class="box-label"
                                        style="background-color: <?php echo get_sub_field('background_label_card'); ?>;">
                                        <p class="terminal-test label-informativo">
                                            <?php echo get_sub_field('label_informativo_card'); ?>
                                        </p>
                                    </div>

                                    <div class="box-textos-empreendimentos">
                                        <div class="container-text">

                                            <div class="box-titulos">
                                                <p class="localizacao-empreendimento terminal-test">
                                                    <?php echo get_sub_field('localizacao_emprendimento'); ?>
                                                </p>
                                                <h4 class="nome-empreendimento founders-grotesk">
                                                    <?php echo get_sub_field('nome_empreendimento'); ?>
                                                </h4>
                                            </div>
                                            <div class="box-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="26" viewBox="0 0 43 26"
                                                    fill="none">
                                                    <path d="M-5.24537e-07 13L41.5 13M41.5 13L29.5 25M41.5 13L29.5 0.999999"
                                                        stroke="white" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="box-informacoes">
                                            <?php
                                            if (have_rows('informacoes_empreendimento')):
                                                while (have_rows('informacoes_empreendimento')):
                                                    the_row(); ?>

                                                    <div class="informacoes">
                                                        <div class="box-svg">
                                                            <?php $svg_file = get_sub_field('svg_informacao_empreendimento');
                                                            if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                                                echo '<i class="element">';
                                                                echo file_get_contents($svg_file['url']);
                                                                echo '</i>';
                                                            } ?>
                                                        </div>
                                                        <p class="founders-grotesk">
                                                            <?php echo get_sub_field('texto_informacao_empreendimento'); ?>
                                                        </p>
                                                    </div>
                                            <?php endwhile;
                                            endif; ?>
                                        </div>
                                    </div>
                                </a>
                <?php 
                    endforeach;
                else:
                ?>
                    <p>Nenhum empreendimento encontrado para o seu perfil. Por favor, entre em contato com nosso time de vendas.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
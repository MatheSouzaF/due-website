<?php
/**
 * Template para exibir o resultado do simulador
 */

// Função para obter e filtrar os empreendimentos com base no range de investimento
function get_filtered_projects() {
    $current_lang = apply_filters('wpml_current_language', NULL);

    // Obtém o valor da faixa de investimento do formulário via query string
    $investment_range = isset($_GET['faixa-investimento']) ? $_GET['faixa-investimento'] : '';
    
    // Se não houver faixa de investimento, retorna array vazio
    if (empty($investment_range)) {
        return [];
    }
    
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
                    <div class="resultado-card">
                        <?php if (!empty($project['photo'])) : ?>
                            <img src="<?php echo esc_url($project['photo']); ?>" alt="Imagem de <?php echo esc_attr($project['name']); ?>">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/src/img/exemplo-imovel.jpg" alt="Imagem do Imóvel">
                        <?php endif; ?>
                        
                        <div class="card-content">
                            <h3><?php echo esc_html($project['location']); ?></h3>
                            <p><?php echo esc_html($project['name']); ?></p>
                            <ul>
                                <?php if (!empty($project['rooms'])) : ?>
                                <li><?php echo esc_html($project['rooms']); ?> quartos</li>
                                <?php endif; ?>
                                <?php if (!empty($project['size'])) : ?>
                                <li><?php echo esc_html($project['size']); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
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
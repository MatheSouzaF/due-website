<?php

/**
 * Classe EmpreendimentoController
 * 
 * Esta classe gerencia os empreendimentos, facilitando o acesso a seus detalhes
 * e oferecendo métodos para listar todos os empreendimentos disponíveis.
 */
class EmpreendimentoController
{
    /**
     * Obtém todos os dados de todos os empreendimentos disponíveis.
     * 
     * @return array Um array associativo contendo as informações de todos os empreendimentos.
     */
    public function getAllProjects()
    {
        $projects = [];

        $args = array(
            'post_type' => 'empreendimentos',
            'posts_per_page' => -1, // Obtém todos os posts
            'post_status' => 'publish' // Apenas posts publicados
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                $projectId = get_the_ID();

                $projects[] = array(
                    'ID' => $projectId,
                    'name' => get_field('empreendimento_nome'),
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
            wp_reset_postdata(); // Reseta os dados globais do post
        }

        return $projects; // Retorna o array de empreendimentos
    }

    /**
     * Obtém todos os dados de todos os empreendimentos disponíveis.
     * 
     * @return array Um array associativo contendo as informações de todos os empreendimentos.
     */
    public function getAllAvailableProjects($lang = null, $order = 'desc', $exclude = '')
    {
        $projects = [];

        // Define os argumentos para a consulta de empreendimentos
        $args = array(
            'post_type' => 'empreendimentos',
            'posts_per_page' => -1, // Obtém todos os posts
            'post_status' => 'publish', // Apenas posts publicados
            'suppress_filters' => false,
            'orderby' => 'date', // Order by publication date
            'order' => $order, // Newest first
        );

        if ($lang) {
            $args['lang'] = $lang;
        } else {
            $args['lang'] = 'pt';
        }

        // Executa a consulta
        $query = new WP_Query($args);

        // Se houver posts, percorre todos eles
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                // Obtém o ID do post
                $projectId = get_the_ID();

                // Obtém os campos ACF
                $name = get_field('empreendimento_nome');
                $location = get_field('localizacao_emprendimento');
                $isStudio = get_field('e_um_studio');
                $rooms = get_field('quantidade_de_quartos');
                $size = get_field('metragem');
                $status = get_field('estagio_da_obra');
                $offer = get_field('oferta');
                $photo = get_field('foto_empreendimento');
                $video = get_field('video_empreendimento');
                $link = get_field('link_da_pagina_desse_empreendimento');
                $visibleInApp = get_field('exibir_no_app_sintta', $projectId);

                if (!empty($exclude)) {
                    $excludeIds = array_map('trim', explode(',', $exclude));
                } else {
                    $excludeIds = [];
                }
                
                if ($status !== '100% vendido' && !in_array($projectId, $excludeIds)) {
                    $projects[] = array(
                        'ID' => $projectId,
                        'name' => $name,
                        'location' => $location,
                        'isStudio' => $isStudio,
                        'rooms' => $rooms,
                        'size' => $size,
                        'status' => $status,
                        'offer' => $offer,
                        'photo' => $photo,
                        'video' => $video,
                        'link' => $link,
                        'visibleInApp' => $visibleInApp,
                    );
                }
            }
            wp_reset_postdata(); // Reseta os dados globais do post
        }

        return $projects; // Retorna o array de empreendimentos
    }

    /**
     * Obtém todos os dados de um empreendimento específico.
     * 
     * @return array Um array associativo contendo as informações de um único empreendimento.
     */
    public function getProjectByID($projectId)
    {
        $args = array(
            'post_type' => 'empreendimentos',
            'post__in' => array($projectId), // Busca apenas pelo ID fornecido
        );

        $query = new WP_Query($args);

        $project = null; // Variável para armazenar o projeto encontrado

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                $name = get_field('empreendimento_nome', $projectId);
                $location = get_field('localizacao_emprendimento', $projectId);
                $isStudio = get_field('e_um_studio', $projectId);
                $rooms = get_field('quantidade_de_quartos', $projectId);
                $size = get_field('metragem', $projectId);
                $status = get_field('estagio_da_obra', $projectId);
                $offer = get_field('oferta', $projectId);
                $photo = get_field('foto_empreendimento', $projectId);
                $video = get_field('video_empreendimento', $projectId);

                $project = array(
                    'ID' => $projectId,
                    'name' => $name,
                    'location' => $location,
                    'isStudio' => $isStudio,
                    'rooms' => $rooms,
                    'size' => $size,
                    'status' => $status,
                    'offer' => $offer,
                    'photo' => $photo,
                    'video' => $video
                );
            }
            wp_reset_postdata(); // Reseta os dados globais do post
        }

        return $project; // Retorna o projeto encontrado
    }

    public function getProjectByName($projectName)
    {
        $args = array(
            'post_type' => 'empreendimentos',
            'meta_query' => array(
                array(
                    'key' => 'empreendimento_nome',
                    'value' => $projectName,
                    'compare' => '='
                )
            ),
            'post_status' => 'publish' // Only published posts
        );

        $query = new WP_Query($args);

        $project = null; // Variable to store the found project

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $projectId = get_the_ID();

                $name = get_field('empreendimento_nome', $projectId);
                $location = get_field('localizacao_emprendimento', $projectId);
                $isStudio = get_field('e_um_studio', $projectId);
                $rooms = get_field('quantidade_de_quartos', $projectId);
                $size = get_field('metragem', $projectId);
                $status = get_field('estagio_da_obra', $projectId);
                $offer = get_field('oferta', $projectId);
                $photo = get_field('foto_empreendimento', $projectId);
                $video = get_field('video_empreendimento', $projectId);

                $project = array(
                    'ID' => $projectId,
                    'name' => $name,
                    'location' => $location,
                    'isStudio' => $isStudio,
                    'rooms' => $rooms,
                    'size' => $size,
                    'status' => $status,
                    'offer' => $offer,
                    'photo' => $photo,
                    'video' => $video
                );
            }
            wp_reset_postdata(); // Reset global post data
        }

        return $project; // Return the found project
    }

    /**
     * Obtém o nome e ID de todos os empreendimentos disponíveis.
     * 
     * @return array Um array associativo contendo os IDs e nomes de todos os empreendimentos.
     */
    public function getProjectsOptions()
    {
        $projects = [];

        $args = array(
            'post_type' => 'empreendimentos',
            'posts_per_page' => -1, // Obtém todos os posts
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                $name = get_field('empreendimento_nome');
                $projectId = get_the_ID();

                if (!empty($name)) {
                    $projects[$projectId] = $name;
                }
            }
            wp_reset_postdata(); // Reseta os dados globais do post
        }

        return $projects; // Retorna o array de empreendimentos
    }
}


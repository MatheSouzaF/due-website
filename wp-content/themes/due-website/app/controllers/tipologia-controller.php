<?php

function acf_load_empreendimentos_field_choices($field)
{
    $field['choices'] = array();

    $args = array(
        'post_type' => 'empreendimentos',
        'posts_per_page' => -1, // Obter todos os posts
        'post_status' => 'publish' // Somente posts publicados
    );
    
    $empreendimentos = new WP_Query($args);

    if ($empreendimentos->have_posts()) {
        while ($empreendimentos->have_posts()) {
            $empreendimentos->the_post();

            $nome = get_field('empreendimento_nome');

            if (!empty($nome)) {
                $field['choices'][$nome] = $nome;
            }
        }
        wp_reset_postdata();
    }

    return $field;
}

add_filter('acf/load_field/name=pertence_a_qual_empreendimento', 'acf_load_empreendimentos_field_choices');

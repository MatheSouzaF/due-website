<?php
function filter_empreendimentos() {
    $location = $_POST['location'];
    $status = $_POST['status'];

    $args = array(
        'post_type' => 'empreendimentos',
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'AND',
        ),
    );

    if (!empty($location)) {
        $args['meta_query'][] = array(
            'key' => 'localizacao',
            'value' => $location,
            'compare' => 'LIKE'
        );
    }

    if (!empty($status)) {
        $args['meta_query'][] = array(
            'key' => 'status',
            'value' => $status,
            'compare' => 'LIKE'
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('includes/views/empreendimento-view');
        endwhile;
    else :
        echo '<p>Nenhum empreendimento encontrado.</p>';
    endif;

    wp_die();
}

add_action('wp_ajax_filter_empreendimentos', 'filter_empreendimentos');
add_action('wp_ajax_nopriv_filter_empreendimentos', 'filter_empreendimentos');

<?php
function register_custom_post_type_tipologia_single_page() {
    $labels = array(
        'name'                => _x('Tipologias na Single Page', 'Post Type General Name'),
        'singular_name'       => _x('Tipologia na Single Page', 'Post Type Singular Name'),
        'menu_name'           => __('Tipologias - Single Page'),
        'all_items'           => __('Todos os Tipologias na Single Page'),
        'view_item'           => __('Ver Tipologia na Single Page'),
        'add_new_item'        => __('Adicionar Novo Tipologia na Single Page'),
        'add_new'             => __('Adicionar Novo Tipologia'),
        'edit_item'           => __('Editar Tipologia na Single Page'),
        'update_item'         => __('Atualizar Tipologia na Single Page'),
        'search_items'        => __('Buscar Tipologia na Single Page'),
        'not_found'           => __('Não encontrado'),
        'not_found_in_trash'  => __('Não encontrado na lixeira'),
    );

    $args = array(
        'label'               => __('tipo_single_page'),
        'description'         => __('Tipologias customizados para a Single Page'),
        'labels'              => $labels,
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail', 'revisions'),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'tipologia'),
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-admin-home',
    );

    register_post_type('tipo_single_page', $args);
}

add_action('init', 'register_custom_post_type_tipologia_single_page');

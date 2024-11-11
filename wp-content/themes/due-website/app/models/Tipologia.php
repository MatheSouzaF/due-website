<?php
function register_custom_post_type_tipologia() {
    $labels = array(
        'name'                => _x('Tipologias', 'Post Type General Name'),
        'singular_name'       => _x('Tipologia', 'Post Type Singular Name'),
        'menu_name'           => __('Card Tipologia'),
        'all_items'           => __('Todos os cards de tipologias'),
        'view_item'           => __('Ver Tipologia'),
        'add_new_item'        => __('Adicionar Nova Tipologia'),
        'add_new'             => __('Adicionar novo card'),
        'edit_item'           => __('Editar Tipologia'),
        'update_item'         => __('Atualizar Tipologia'),
        'search_items'        => __('Buscar Tipologia'),
        'not_found'           => __('Não encontrado'),
        'not_found_in_trash'  => __('Não encontrado na lixeira'),
    );

    $args = array(
        'label'               => __('tipologias'),
        'description'         => __('Tipologias customizadas'),
        'labels'              => $labels,
        'menu_position'       => 6,
        'supports'            => array('title', 'editor', 'thumbnail', 'revisions'),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'tipologias-ficha'),
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-admin-home',
    );

    register_post_type('tipologias', $args);
}

add_action('init', 'register_custom_post_type_tipologia');

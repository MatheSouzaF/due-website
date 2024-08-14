<?php
function register_custom_post_type_single_empreendimento() {
    $labels = array(
        'name'                => _x('single_empreendimentos', 'Post Type General Name'),
        'singular_name'       => _x('single_empreendimento', 'Post Type Singular Name'),
        'menu_name'           => __('Single Page - Empreendimento'),
        'all_items'           => __('Todas Single Page - Empreendimento'),
        'view_item'           => __('Ver Single Page - Empreendimento'),
        'add_new_item'        => __('Adicionar Novo Empreendimento na Single Page'),
        'add_new'             => __('Adicionar Novo Empreendimento na Single Page'),
        'edit_item'           => __('Editar Empreendimento na Single Page'),
        'update_item'         => __('Atualizar Empreendimento na Single Page'),
        'search_items'        => __('Buscar Empreendimento na Single Page'),
        'not_found'           => __('Não encontrado'),
        'not_found_in_trash'  => __('Não encontrado na lixeira'),
    );

    $args = array(
        'label'               => __('single_empreendimentos'),
        'description'         => __('Tipologias customizadas'),
        'labels'              => $labels,
        'menu_position'       => 6,
        'supports'            => array('title', 'editor', 'thumbnail', 'revisions'),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'single_empreendimentos'),
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-building',
    );

    register_post_type('single_empreendimentos', $args);
}

add_action('init', 'register_custom_post_type_single_empreendimento');

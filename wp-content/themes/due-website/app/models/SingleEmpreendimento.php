<?php
function register_custom_post_type_empreendimento_single_page() {
    $labels = array(
        'name'                => _x('Empreendimentos na Single Page', 'Post Type General Name'),
        'singular_name'       => _x('Empreendimento na Single Page', 'Post Type Singular Name'),
        'menu_name'           => __('Empreendimentos - Single Page'),
        'all_items'           => __('Todos os Empreendimentos na Single Page'),
        'view_item'           => __('Ver Empreendimento na Single Page'),
        'add_new_item'        => __('Adicionar Novo Empreendimento na Single Page'),
        'add_new'             => __('Adicionar Novo Empreendimento'),
        'edit_item'           => __('Editar Empreendimento na Single Page'),
        'update_item'         => __('Atualizar Empreendimento na Single Page'),
        'search_items'        => __('Buscar Empreendimento na Single Page'),
        'not_found'           => __('Não encontrado'),
        'not_found_in_trash'  => __('Não encontrado na lixeira'),
    );

    $args = array(
        'label'               => __('empre_single_page'),
        'description'         => __('Empreendimentos customizados para a Single Page'),
        'labels'              => $labels,
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail', 'revisions'),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'empreendimento'),
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-building',
    );

    register_post_type('empre_single_page', $args);
}

add_action('init', 'register_custom_post_type_empreendimento_single_page');

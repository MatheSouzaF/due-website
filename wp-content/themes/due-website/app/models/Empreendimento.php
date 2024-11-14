<?php
function register_custom_post_type_empreendimento()
{
    $labels = array(
        'name'                => _x('Empreendimentos', 'Post Type General Name'),
        'singular_name'       => _x('Empreendimento', 'Post Type Singular Name'),
        'menu_name'           => __('Card Empreendimento'),
        'all_items'           => __('Todos os cards de empreendimentos'),
        'view_item'           => __('Ver Empreendimento'),
        'add_new_item'        => __('Adicionar Novo Empreendimento'),
        'add_new'             => __('Adicionar novo card'),
        'edit_item'           => __('Editar Empreendimento'),
        'update_item'         => __('Atualizar Empreendimento'),
        'search_items'        => __('Buscar Empreendimento'),
        'not_found'           => __('Não encontrado'),
        'not_found_in_trash'  => __('Não encontrado na lixeira'),
    );

    $args = array(
        'label'               => __('empreendimentos'),
        'description'         => __('Empreendimentos customizados'),
        'labels'              => $labels,
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail', 'revisions'),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'empreendimentos-ficha-tec'),
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-building',
    );

    register_post_type('empreendimentos', $args);
}

add_action('init', 'register_custom_post_type_empreendimento');

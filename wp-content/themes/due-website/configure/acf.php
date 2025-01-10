<?php

// ACF functions here

setup_options_page();

function setup_options_page() {

    if (function_exists('acf_add_options_page')) {

        // Main options page (parent menu)
        $option_page = acf_add_options_page(array(
            'page_title'     => 'Configurações Gerais',
            'menu_title'     => 'Configurações Gerais',
            'menu_slug'      => 'configuracoes-gerais',
            'capability'     => 'edit_posts',
            'redirect'       => true
        ));

        // Submenu for Menu
        $menu_page = acf_add_options_sub_page(array(
            'page_title'  => __('Menu'),
            'menu_title'  => 'Menu',
            'menu_slug'   => 'menu-configuracoes',
            'parent_slug' => 'configuracoes-gerais',
        ));
        // Submenu for Menu Select
        
        $menu_select_page = acf_add_options_sub_page(array(
            'page_title'  => __('Menu Select'),
            'menu_title'  => 'Menu Select',
            'menu_slug'   => 'menu-select-configuracoes',
            'parent_slug' => 'configuracoes-gerais',
        ));

        // Submenu for Footer
        $footer_page = acf_add_options_sub_page(array(
            'page_title'  => __('Footer'),
            'menu_title'  => 'Footer',
            'menu_slug'   => 'footer-configuracoes',
            'parent_slug' => 'configuracoes-gerais',
        ));
        // Submenu for Realizamos o Sonho
        $realizamos_page = acf_add_options_sub_page(array(
            'page_title'  => __('Realizamos o Sonho'),
            'menu_title'  => 'Realizamos o Sonho',
            'menu_slug'   => 'realizamos-configuracoes',
            'parent_slug' => 'configuracoes-gerais',
        ));
        $invista_page = acf_add_options_sub_page(array(
            'page_title'  => __('Invista'),
            'menu_title'  => 'Invista',
            'menu_slug'   => 'invista-configuracoes',
            'parent_slug' => 'configuracoes-gerais',
        ));
    }
}

// Make parent menu non-clickable
add_action('admin_head', 'disable_options_page_click');
function disable_options_page_click() {
    echo '<style>
    #toplevel_page_configuracoes-gerais > a {
        pointer-events: none;
    }
    </style>';
}

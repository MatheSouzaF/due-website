<?php

add_filter('wpseo_sitemap_index', 'add_sitemap_custom_items');
function add_sitemap_custom_items($sitemap_custom_items)
{
    /* Adicionar Sitemap Personalizado */
    $sitemap_custom_items .= '
    <sitemap>
        <loc>' . home_url( "wp-content/themes/due-website/filtros-sitemap.xml" ) . '</loc>
        <lastmod>' . date( 'c' ) . '</lastmod>
    </sitemap>';

    /* Retorna o sitemap com o novo item adicionado */
    return $sitemap_custom_items;
}
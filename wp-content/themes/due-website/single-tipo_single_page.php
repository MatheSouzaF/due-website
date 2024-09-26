<?php
wp_enqueue_style('single-tipologia', get_template_directory_uri() . '/assets/dist/css/singles/single-tipologia.css', ['main'], ASSETS_VERSION);
get_header();

?>
<section class="single-tipologia">

    <div class="banner-hero-single-tipologia">

        <div class="box-container-tipologias-hero container-texto">
            <div class="localizacao-tipologia">
                <p class="titulo-tipologia terminal-test">
                    <?php echo get_field('nome_do_empreendimento_que_pertence'); ?></p>
                <span>|</span>
                <p class="localizacao terminal-test"><?php echo get_field('localizacao_tipologia_single'); ?></p>
            </div>
            <div class="box-nome-tipologia">
                <p class="label-tipologia">
                    <?php echo __('tipologia', 'due-website') ?>
                </p>
                <?php
                $tipologia_id = get_field('tipologia');

                if ($tipologia_id) {
                    $titulo_tipologia = get_field('nome_da_tipologia', $tipologia_id);
                    echo '<h1 class="terminal-test titulo-hero">' . $titulo_tipologia . '</h1>';
                }
                ?>
            </div>
            <div class="box-descricao">
                <p class="descricao-tipologia founders-grotesk"><?php echo get_field('descricao_tipologia_hero'); ?></p>
            </div>
            <div class="box-repetidor-diferenciais">
                <?php
                if (have_rows('diferenciais_e_caracteristicas_select')):
                    while (have_rows('diferenciais_e_caracteristicas_select')):
                        the_row(); ?>
                        <div class="row-diferencias">
                            <div class="box-svg">
                                <?php $svg_file = get_sub_field('svg_caracteristicas');
                                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                    echo '<i class="element">';
                                    echo file_get_contents($svg_file['url']);
                                    echo '</i>';
                                } ?>
                            </div>
                            <p class="titulo-diferencias founders-grotesk">
                                <?php echo get_sub_field('titulo_caracteristicas'); ?></p>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
        <div class="box-container-tipologias-hero container-imagem">
            <?php
            $image = get_field('foto_da_tipologia');
            if ($image):
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div>
    </div>
    <?php
    $imagePanorama = get_field('panaroma_imagem');
    ?>
    <?php if ($imagePanorama) : ?>
        <div class="panorama">
            <div class="wrapper">

                <div class="viewer" id="viewer"></div>
                <?php
                wp_localize_script('main', 'image', array(
                    'url' => $imagePanorama,
                ));
                ?>
                <div class="box-svg">
                    <?php
                    $svg_file = get_field('svg_tour_360');
                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                        echo '<i class="element">';
                        echo file_get_contents($svg_file['url']);
                        echo '</i>';
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php
    $tituloGaleria = get_field('titulo_galeria');
    ?>
    <?php if ($tituloGaleria) : ?>

        <div class="galeria">
            <div class="wrapper">
                <h3 class="titulo-galeria"><?php echo $tituloGaleria ?></h3>
                <div class="swiper-container swiper-galeria">
                    <div class="swiper-wrapper">
                        <?php if (have_rows('imagens_e_videos')): ?>
                            <?php while (have_rows('imagens_e_videos')) : the_row(); ?>
                                <?php if (get_row_layout() == 'video_galeria'): ?>
                                    <div class="swiper-slide slide-video">
                                        <?php
                                        $image = get_sub_field('imagem_background_video');
                                        if ($image):
                                            $image_url = $image['url'];
                                            $image_alt = $image['alt'];
                                        ?>
                                            <!-- Link para o vídeo no Fancybox -->
                                            <a class="box-video" href="<?php echo esc_url(get_sub_field('video')); ?>" data-fancybox="gallery">
                                                <svg class="shape-video" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                                                    <path d="M7.5 11.0801C7.5 8.36018 10.4137 6.63799 12.7968 7.94711L49.4649 28.1145C50.0261 28.4229 50.4942 28.8763 50.8203 29.4274C51.1463 29.9786 51.3183 30.6072 51.3183 31.2475C51.3183 31.8879 51.1463 32.5165 50.8203 33.0676C50.4942 33.6187 50.0261 34.0722 49.4649 34.3805L12.7968 54.5479C12.2525 54.8472 11.6396 54.9994 11.0184 54.9897C10.3973 54.9799 9.78948 54.8085 9.25482 54.4922C8.72015 54.176 8.27713 53.7258 7.96941 53.1862C7.66169 52.6466 7.49991 52.0361 7.5 51.4149V11.0801Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <img class="imgGrow" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                <?php elseif (get_row_layout() == 'imagem_galeria'): ?>
                                    <div class="swiper-slide slide-image">
                                        <?php
                                        $image = get_sub_field('imagem');
                                        if ($image):
                                            $image_url = $image['url'];
                                            $image_alt = $image['alt'];
                                        ?>
                                            <!-- Link para a imagem no Fancybox -->
                                            <a class="box-img" href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($image_alt); ?>">
                                                <img class="imgGrow" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <!-- Adicione botões de navegação -->
                    <div class="box-buttons">
                        <svg class="swiper-button-next-galeria" xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                            viewBox="0 0 80 80" fill="none">
                            <circle cx="40" cy="40" r="40" fill="white" />
                            <path
                                d="M24 39C23.4477 39 23 39.4477 23 40C23 40.5523 23.4477 41 24 41L24 39ZM56.7071 40.7071C57.0976 40.3166 57.0976 39.6834 56.7071 39.2929L50.3431 32.9289C49.9526 32.5384 49.3195 32.5384 48.9289 32.9289C48.5384 33.3195 48.5384 33.9526 48.9289 34.3431L54.5858 40L48.9289 45.6569C48.5384 46.0474 48.5384 46.6805 48.9289 47.0711C49.3195 47.4616 49.9526 47.4616 50.3431 47.0711L56.7071 40.7071ZM24 41L56 41L56 39L24 39L24 41Z"
                                fill="#003B4B" />
                        </svg>

                        <svg class="swiper-button-prev-galeria" xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                            viewBox="0 0 80 80" fill="none">
                            <circle cx="40" cy="40" r="40" transform="matrix(-1 0 0 1 80 0)" fill="white" />
                            <path
                                d="M56 39C56.5523 39 57 39.4477 57 40C57 40.5523 56.5523 41 56 41L56 39ZM23.2929 40.7071C22.9024 40.3166 22.9024 39.6834 23.2929 39.2929L29.6569 32.9289C30.0474 32.5384 30.6805 32.5384 31.0711 32.9289C31.4616 33.3195 31.4616 33.9526 31.0711 34.3431L25.4142 40L31.0711 45.6569C31.4616 46.0474 31.4616 46.6805 31.0711 47.0711C30.6805 47.4616 30.0474 47.4616 29.6569 47.0711L23.2929 40.7071ZM56 41L24 41L24 39L56 39L56 41Z"
                                fill="#003B4B" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php
    $tituloPlantas = get_field('titulo_plantas');
    ?>
    <?php if ($tituloPlantas) : ?>

        <section class="plantas">
            <h3 class="titulo-plantas"><?php echo $tituloPlantas ?></h3>
            <p class="subtitulo-plantas"><?php echo get_field('subtitulo_plantas'); ?></p>
            <div class="box-titulo-plantas">

                <?php
                if (have_rows('planta')):
                    $row_number = 1;

                    echo '<ul class="slider-plantas slider-plantas-desktop">';

                    while (have_rows('planta')) : the_row();
                        $sufixo_da_planta = get_sub_field('sufixo_da_planta');
                        $sufixo_da_metragem = get_sub_field('quartos_+_metragem');

                        echo '<li class="row-slide-thumbs" data-row="' . $row_number . '">';
                        echo '<p class="sufix-planta founders-grotesk">' . esc_html($sufixo_da_planta) . '</p>';
                        echo '<p class="quartos-metragem-planta founders-grotesk">' . esc_html($sufixo_da_metragem) . '</p>';
                        echo '</li>';

                        $row_number++;
                    endwhile;

                else:
                    echo 'Nenhuma planta cadastrada.';
                endif;

                echo '</ul>';


                if (have_rows('planta')):
                    $row_number = 1;
                    echo '<div class="select-container">';
                    echo '<select class="slider-plantas select slider-plantas-mobile founders-grotesk">';

                    while (have_rows('planta')) : the_row();
                        $sufixo_da_planta = get_sub_field('sufixo_da_planta');
                        $sufixo_da_metragem = get_sub_field('quartos_+_metragem');
                        echo '<option class="row-slide-thumbs select_option" value="' . esc_attr($sufixo_da_planta) . '" data-row="' . esc_attr($row_number) . '">';
                        echo esc_html($sufixo_da_planta) . ' ' . esc_html($sufixo_da_metragem);
                        echo '</option>';


                        $row_number++;
                    endwhile;
                    echo '</select>';


                else:
                    echo 'Nenhuma planta cadastrada.';
                endif;
                echo '<svg class="svg-arrow" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">';
                echo '<path d="M14.625 6.1875L9 11.8125L3.375 6.1875" stroke="white" stroke-linecap="round" stroke-linejoin="round" />';
                echo '</svg>';
                echo '</div>';
                ?>

            </div>
            <div class="box-conteudo-planta">
                <?php
                if (have_rows('planta')):
                    $row_number = 1;

                    echo '<ul class="slider-conteudo">';

                    while (have_rows('planta')) : the_row();
                        $sufixo_da_planta = get_sub_field('sufixo_da_planta');
                        $sufixo_da_metragem = get_sub_field('quartos_+_metragem');
                        $titulo_coluna_pavimento_i = get_sub_field('titulo_coluna_pavimento_i');
                        $titulo_coluna_pavimento_ii = get_sub_field('titulo_coluna_pavimento_ii');
                        echo '<li class="conteudo-tipologias" data-row="' . $row_number . '">';
                        echo '<div class="container-text">';
                        echo '<p class="sufix-planta founders-grotesk">' . esc_html($sufixo_da_planta) . '</p>';
                        echo '<p class="quartos-metragem-planta founders-grotesk">' . esc_html($sufixo_da_metragem) . '</p>';
                        echo '<div class="box-repetidor-caracteristicas">';
                        if (have_rows('lista_de_caracteristicas')) :
                            while (have_rows('lista_de_caracteristicas')) : the_row();
                                echo '<div class="row-caracteristicas">';

                                // SVG
                                echo '<div class="box-svg">';
                                $svg_file = get_sub_field('svg_carateristicas');
                                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                    echo '<i class="element">' . file_get_contents($svg_file['url']) . '</i>';
                                }
                                echo '</div>';

                                // Título da característica
                                echo '<p class="titulo-caracteristicas">' . esc_html(get_sub_field('caracteristicas')) . '</p>';

                                echo '</div>'; // Fim da div row-caracteristicas
                            endwhile;
                        endif;
                        echo '</div>';
                        echo '<div class="box-pavimentos">';
                        echo '<div class="pavimentos-coluna-I">';
                        echo '<p class="titulo-coluna-pavimento-i">' . esc_html($titulo_coluna_pavimento_i) . '</p>';
                        echo '<div class="box-lista">';
                        if (have_rows('lista_pavimento_i')):
                            while (have_rows('lista_pavimento_i')): the_row();
                                $pavimentos_coluna_i = get_sub_field('pavimentos_coluna_i');
                                echo '<div class="row-lista">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5" fill="none">';
                                echo '<circle cx="2" cy="2.5" r="2" fill="#CB9E6C" />';
                                echo '</svg>';
                                echo '<p class="titulo-pavimento founders-grotesk">' . esc_html($pavimentos_coluna_i) . '</p>';
                                echo '</div>';
                            endwhile;
                        endif;
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="pavimentos-coluna-II">';
                        echo '<p class="titulo-coluna-pavimento-ii">' . esc_html($titulo_coluna_pavimento_ii) . '</p>';
                        echo '<div class="box-lista">';
                        if (have_rows('lista_pavimento_ii')):
                            while (have_rows('lista_pavimento_ii')): the_row();
                                $pavimentos_coluna_i = get_sub_field('pavimentos_coluna_ii');
                                echo '<div class="row-lista">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5" fill="none">';
                                echo '<circle cx="2" cy="2.5" r="2" fill="#CB9E6C" />';
                                echo '</svg>';
                                echo '<p class="titulo-pavimento founders-grotesk">' . esc_html($pavimentos_coluna_i) . '</p>';
                                echo '</div>';
                            endwhile;
                        endif;
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="box-gallery">';
                        echo '<div class="gallery-planta">';
                        echo '<div class="slider slider-for">';
                        if (have_rows('repetidor_imagens_plantas')):
                            while (have_rows('repetidor_imagens_plantas')):
                                the_row();
                                $titulo_da_planta = get_sub_field('titulo_da_planta');
                                $image = get_sub_field('imagens_da_planta');
                                if ($image):
                                    $image_url = $image['url'];
                                    $image_alt = $image['alt'];
                                    echo '<div class="row-imagem-plantas ">';
                                    echo '<p class="titulo-row-imagem-plantas terminal-test">' . esc_html($titulo_da_planta) . '</p>';
                                    echo '<img class="plantas-repetidor" src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">';
                                    echo '</div>';
                                endif;
                            endwhile;
                        endif;
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="gallery-thumbs-plantas">';
                        echo '<div class="slider slider-nav ">';
                        if (have_rows('repetidor_imagens_plantas')):
                            while (have_rows('repetidor_imagens_plantas')):
                                the_row();
                                $image = get_sub_field('imagens_da_planta');
                                if ($image):
                                    $image_url = $image['url'];
                                    $image_alt = $image['alt'];
                                    echo '<div class="row-thumbs-plantas">';
                                    echo '<img class="plantas-repetidor-thumb" src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">';
                                    echo '</div>';
                                endif;
                            endwhile;
                        endif;
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</li>';
                        $row_number++;
                    endwhile;

                    echo '</ul>';
                else:
                    echo 'Nenhuma planta cadastrada.';
                endif;
                ?>

            </div>
        </section>
    <?php endif; ?>


    <?php get_template_part('template-realizamos-sonhos/realizamos-sonhos'); ?>
    <?php get_template_part('template-invista/invista'); ?>


    <?php
    $tituloEntre = get_field('titulo_entre_em_contato');
    ?>
    <?php if ($tituloEntre) : ?>
        <div class="entre-contato">
            <div class="wrapper">

                <h3 class="titulo-entre-contato"><?php echo $tituloEntre ?></h3>
                <p class="subtitulo-entre-contato founders-grotesk"><?php echo get_field('descricao_entre_em_contato'); ?></p>
                <div class="box-entre-contato">

                    <?php
                    $link = get_field('entre_em_contato');
                    if ($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>

                        <a class="button-fixed-whatsapp" id="irFooter" target="<?php echo esc_attr($link_target); ?>">
                            <p class=""><?php echo esc_html($link_title); ?></p>
                        </a>
                    <?php endif; ?>

                    <?php
                    $link = get_field('atendimento_ao_cliente');
                    if ($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a class="button-fixed-atendimento" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <circle cx="10" cy="10" r="5" fill="#8AC550" />
                                <circle cx="10" cy="10" r="9.5" stroke="#89C550" />
                            </svg>
                            <p class=""><?php echo esc_html($link_title); ?></p>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php
    $tituloCarrossel = get_field('texto_localizacao_carrossel_tipologia');
    ?>
    <?php if ($tituloCarrossel) : ?>
        <div class="carrossel-tipologia">
            <?php

            $tipologiasDoEmpreendimento = [];

            $args = array(
                'post_type' => 'tipologias',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'post__not_in' => array(get_the_ID()),
            );

            // Executa a consulta
            $query = new WP_Query($args);
            $empreendimentoName = get_field('nome_do_empreendimento_que_pertence');

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();

                    $tipologiaId = get_the_ID();
                    $linkPost = get_field('link_para_a_pagina_dessa_tipologia', $tipologiaId);
                    $name = get_field('nome_da_tipologia', $tipologiaId);
                    $project = get_field('pertence_a_qual_empreendimento', $tipologiaId);
                    $location = get_field('localizacao_tipologia', $tipologiaId);
                    $status = get_field('estagio_da_obra', $tipologiaId);
                    $ultimas_unidades = get_field('ultimas_unidades', $tipologiaId);
                    $isStudio = get_field('e_um_studio_tipologia', $tipologiaId);
                    $rooms = '';
                    if (have_rows('quantidade_de_quartos_tipologia', $tipologiaId)) {
                        while (have_rows('quantidade_de_quartos_tipologia', $tipologiaId)):
                            the_row();
                            $min_rooms = get_sub_field('minimo_de_quartos_tipologia');
                            $max_rooms = get_sub_field('maximo_de_quartos_tipologia');

                            if ($min_rooms && $max_rooms) {
                                $rooms = $min_rooms . ' a ' . $max_rooms . ' qtos';
                            } elseif ($min_rooms) {
                                if ($min_rooms === '1') {
                                    $rooms = $min_rooms . ' quarto';
                                } else {
                                    $rooms = $min_rooms . ' quartos';
                                }
                            }
                        endwhile;
                    };
                    $size = '';
                    if (have_rows('metragem_tipologia', $tipologiaId)) {
                        while (have_rows('metragem_tipologia', $tipologiaId)):
                            the_row();
                            $min_size = get_sub_field('metragem_minima_tipologia');
                            $max_size = get_sub_field('metragem_maxima_tipologia');
                    
                            if ($min_size && $max_size) {
                                if ($min_size == $max_size) {
                                    $size = $min_size . ' m²';
                                } else {
                                    $size = $min_size . ' a ' . $max_size . 'm²';
                                }
                            } elseif ($min_size) {
                                $size = $min_size . ' m²';
                            }
                        endwhile;
                    }
                    
                    $diffs = get_field('diferenciais_tipologia', $tipologiaId);
                    $photo = get_field('foto_da_tipologia', $tipologiaId);

                    if ($project === $empreendimentoName) {
                        $tipologiasDoEmpreendimento[] = array(
                            'name' => $name,
                            'id' => $tipologiaId,
                            'project' => $project,
                            'location' => $location,
                            'isStudio' => $isStudio,
                            'rooms' => $rooms,
                            'size' => $size,
                            'status' => $status,
                            'diffs' => $diffs,
                            'photo' => $photo,
                            'link' => $linkPost,
                        );
                    }
                }
                wp_reset_postdata();
            }

            ?>

            <div class="wrapper">
                <div class="box-localizacao-carrossel">
                    <div class="box-svg">
                        <?php $svg_file = get_field('svg_localizacao_carrossel_tipologia');
                        if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                            echo '<i class="element">';
                            echo file_get_contents($svg_file['url']);
                            echo '</i>';
                        } ?>
                    </div>
                    <p class="titulo-localizacao-carrossel">
                        <?php echo $tituloCarrossel ?></p>
                </div>
                <h3 class="titulo-carrossel"><?php echo get_field('titulo_carrossel_tipologia'); ?></h3>
                <div class="box-swiper">
                    <div class="swiper-container tipologias-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($tipologiasDoEmpreendimento as $tipologia): ?>
                                <?php
                                // var_dump($tipologia);

                                $statusMap = [
                                    'Em obra' => 'em_obra',
                                    'Lançamento' => 'lancamento',
                                    '100% vendido' => 'vendido',
                                    'Últimas unidades' => 'ultimas_unidades'
                                ];

                                $statusClass = isset($statusMap[$tipologia['status']]) ? $statusMap[$tipologia['status']] : esc_html($tipologia['status']);
                                ?>
                                <a href="<?php echo $tipologia['link']; ?>" class="swiper-slide <?php echo esc_html($statusClass); ?>">
                                    <div class="tipologia-card ">
                                        <span class="estado-tipologia terminal-test">
                                            <?php echo esc_html($tipologia['status']) ?>
                                        </span>
                                        <span class="">
                                            <?php echo esc_html($tipologia['ultimas_unidades']) ?>
                                        </span>
                                        <img class="tipologia-photo" src="<?php echo esc_url($tipologia['photo']['url']); ?>"
                                            alt="<?php echo esc_attr($tipologia['name']); ?>">
                                        <h3 class="tipologia-name founders-grotesk"><?php echo esc_html($tipologia['name']); ?>
                                        </h3>
                                        <div class="box-quartos-metragem">
                                            <div class="box-quarto">

                                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="30" height="30" rx="15" fill="#FAF2EB" fill-opacity="0.7" />
                                                    <g clip-path="url(#clip0_3049_5595)">
                                                        <path
                                                            d="M13.0365 13.4828C13.0365 14.7959 11.6151 15.6165 10.4778 14.96C9.95008 14.6553 9.625 14.0923 9.625 13.4828C9.625 12.1697 11.0465 11.3489 12.1837 12.0055C12.7115 12.3103 13.0365 12.8733 13.0365 13.4828Z"
                                                            stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M7.0625 10.4044V17.5468" stroke="#003B4B"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M22.9385 20.1579V17.5472H7.0625V20.1579" stroke="#003B4B"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path
                                                            d="M22.9424 17.5471V15.3068C22.9424 13.3585 21.3627 11.779 19.4144 11.7788H15.6094V17.5471"
                                                            stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3049_5595">
                                                            <rect width="16.875" height="10.6875" fill="white"
                                                                transform="translate(6.5625 9.65625)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>

                                                <p class="quartos founders-grotesk"><?php echo esc_html($tipologia['rooms']); ?>
                                                </p>
                                            </div>
                                            <div class="box-metragem">
                                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.7" cx="15" cy="15" r="15" fill="#FAF2EB" />
                                                    <path d="M12.3333 9H10.3333C9.97971 9 9.64057 9.14048 9.39052 9.39052C9.14048 9.64057 9 9.97971 9 10.3333V12.3333M21 12.3333V10.3333C21 9.97971 20.8595 9.64057 20.6095 9.39052C20.3594 9.14048 20.0203 9 19.6667 9H17.6667M17.6667 21H19.6667C20.0203 21 20.3594 20.8595 20.6095 20.6095C20.8595 20.3594 21 20.0203 21 19.6667V17.6667M9 17.6667V19.6667C9 20.0203 9.14048 20.3594 9.39052 20.6095C9.64057 20.8595 9.97971 21 10.3333 21H12.3333" stroke="#003B4B" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                                <p class="metragem founders-grotesk"><?php echo esc_html($tipologia['size']); ?>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="container-diferencias">

                                            <?php foreach ($tipologia['diffs'] as $diff): ?>
                                                <div class="box-diferencias">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none">
                                                        <path
                                                            d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z"
                                                            stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <p class="diifs-names founders-grotesk"><?php echo esc_html($diff); ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="box-buttons">
                            <svg class="swiper-button-next" xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                viewBox="0 0 80 80" fill="none">
                                <circle cx="40" cy="40" r="40" fill="white" />
                                <path
                                    d="M24 39C23.4477 39 23 39.4477 23 40C23 40.5523 23.4477 41 24 41L24 39ZM56.7071 40.7071C57.0976 40.3166 57.0976 39.6834 56.7071 39.2929L50.3431 32.9289C49.9526 32.5384 49.3195 32.5384 48.9289 32.9289C48.5384 33.3195 48.5384 33.9526 48.9289 34.3431L54.5858 40L48.9289 45.6569C48.5384 46.0474 48.5384 46.6805 48.9289 47.0711C49.3195 47.4616 49.9526 47.4616 50.3431 47.0711L56.7071 40.7071ZM24 41L56 41L56 39L24 39L24 41Z"
                                    fill="#003B4B" />
                            </svg>

                            <svg class="swiper-button-prev" xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                viewBox="0 0 80 80" fill="none">
                                <circle cx="40" cy="40" r="40" transform="matrix(-1 0 0 1 80 0)" fill="white" />
                                <path
                                    d="M56 39C56.5523 39 57 39.4477 57 40C57 40.5523 56.5523 41 56 41L56 39ZM23.2929 40.7071C22.9024 40.3166 22.9024 39.6834 23.2929 39.2929L29.6569 32.9289C30.0474 32.5384 30.6805 32.5384 31.0711 32.9289C31.4616 33.3195 31.4616 33.9526 31.0711 34.3431L25.4142 40L31.0711 45.6569C31.4616 46.0474 31.4616 46.6805 31.0711 47.0711C30.6805 47.4616 30.0474 47.4616 29.6569 47.0711L23.2929 40.7071ZM56 41L24 41L24 39L56 39L56 41Z"
                                    fill="#003B4B" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php endif; ?>


    <div class="call-form" id="call-form"></div>

</section>
<?php
get_footer();
?>
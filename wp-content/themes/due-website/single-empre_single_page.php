<?php
wp_enqueue_style('single-empreendimentos', get_template_directory_uri() . '/assets/dist/css/singles/single-empreendimentos.css', ['main'], ASSETS_VERSION);
get_header();

?>

<section class="single-empreendimentos">

    <div class="hero-single-empreendimentos">
        <div class="box-img">

            <?php
            $image = get_field('imagem_horizontal_do_empreendimento');
            if ($image):
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div>
        <div class="box-video">
            <video class="video-hero" autoplay="autoplay"
                src="<?php echo get_field('video_horizontal_do_empreendimento') ?>" muted loop play></video>

        </div>

        <div class="box-titulo-hero">
            <p class="localizacao-hero terminal-test"><?php echo get_field('localizacao'); ?></p>
            <?php
            $empreendimento_id = get_field('empreendimento_single_page');

            if ($empreendimento_id) {
                $titulo_empreendimento = get_the_title($empreendimento_id);
                echo '<h1 class="terminal-test titulo-hero">' . $titulo_empreendimento . '</h1>';
            }
            ?>
            <div class="box-infos">
                <div class="box-quartos">
                    <?php $svg_file = get_field('svg_quartos_hero');
                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                        echo '<i class="element">';
                        echo file_get_contents($svg_file['url']);
                        echo '</i>';
                    } ?>
                    <p class="founders-grotesk quartos-hero"><?php echo get_field('quantidade_de_quartos'); ?></p>
                </div>
                <div class="box-metragem">
                    <?php $svg_file = get_field('svg_metragem');
                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                        echo '<i class="element">';
                        echo file_get_contents($svg_file['url']);
                        echo '</i>';
                    } ?>
                    <p class="founders-grotesk metragem-hero"><?php echo get_field('metragem'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="introducao">
        <div class="wrapper">

            <div class="box-container introducao-ancora">
                <div class="box-repetidor-ancora">

                    <?php
                    if (have_rows('links_ancoras')):
                        while (have_rows('links_ancoras')):
                            the_row(); ?>
                            <?php
                            $link = get_sub_field('link_ancora');
                            if ($link):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <a class="link-ancora" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>">
                                    <p class=""><?php echo esc_html($link_title); ?></p>
                                </a>
                            <?php endif; ?>
                        <?php endwhile;
                    endif; ?>
                </div>

                <div class="box-textos-introducao">
                    <h2 class="terminal-test titulo-introducao"><?php echo get_field('titulo_introducao'); ?></h2>
                    <p class="founders-grotesk subtitulo-introducao"><?php echo get_field('paragrafo_introducao'); ?>
                    </p>
                </div>
            </div>
            <div class="box-container introducao-valores">
                <h3 class="terminal-test titulo-valores"><?php echo get_field('titulo_box_investimento'); ?></h3>
                <div class="repetidor-valores">
                    <?php
                    if (have_rows('box_valores')):
                        while (have_rows('box_valores')):
                            the_row(); ?>
                            <div class="box-valores">
                                <h4 class="box-titulo-valores founders-grotesk"><?php echo get_sub_field('titulo_valores'); ?>
                                </h4>
                                <p class="subtitulo-valores founders-grotesk"><?php echo get_sub_field('subtitulo_valores'); ?>
                                </p>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>

                <div class="topicos-destaque">
                    <?php
                    if (have_rows('topicos_destaque')):
                        while (have_rows('topicos_destaque')):
                            the_row(); ?>
                            <div class="box-destaque">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path
                                        d="M7.66667 11.8333L10.1667 14.3333L14.3333 8.5M21 11C21 12.3132 20.7413 13.6136 20.2388 14.8268C19.7363 16.0401 18.9997 17.1425 18.0711 18.0711C17.1425 18.9997 16.0401 19.7363 14.8268 20.2388C13.6136 20.7413 12.3132 21 11 21C9.68678 21 8.38642 20.7413 7.17317 20.2388C5.95991 19.7363 4.85752 18.9997 3.92893 18.0711C3.00035 17.1425 2.26375 16.0401 1.7612 14.8268C1.25866 13.6136 1 12.3132 1 11C1 8.34784 2.05357 5.8043 3.92893 3.92893C5.8043 2.05357 8.34784 1 11 1C13.6522 1 16.1957 2.05357 18.0711 3.92893C19.9464 5.8043 21 8.34784 21 11Z"
                                        stroke="#002B36" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="founders-grotesk"><?php echo get_sub_field('titulo_destaque'); ?></p>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
                <div class="box-link">
                    <?php
                    $link = get_field('botao_fale_time');
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
                <div class="box-svg">
                    <?php $svg_file = get_field('svg_due');
                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                        echo '<i class="element">';
                        echo file_get_contents($svg_file['url']);
                        echo '</i>';
                    } ?>
                </div>

                <div class="receita-bruta">
                    <p class="founders-grotesk"><?php echo __('*Receita bruta', 'due-website') ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="praia" id="praia">
        <div class="wrapper">

            <div class="box-img">

                <?php
                $image = get_field('imagem_praia');
                if ($image):
                    $image_url = $image['url'];
                    $image_alt = $image['alt']; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
            </div>
            <div class="box-video">
                <video class="video-praia" autoplay="autoplay" src="<?php echo get_field('video_praia') ?>" muted loop
                    play></video>

            </div>

            <div class="box-titulo-praia">
                <h3 class="terminal-test"><?php echo get_field('titulo_praia'); ?></h3>
            </div>

            <div class="box-cards-praia">
                <?php
                if (have_rows('cards_infos_praia')):
                    $counter = 1;
                    while (have_rows('cards_infos_praia')):
                        the_row();
                        $extra_class = ($counter === 2) ? 'bg-blue' : '';
                        ?>
                        <div class="box-infos-cards <?php echo $extra_class; ?>">
                            <p class="founders-grotesk titulo-infos-praia"><?php echo get_sub_field('titulo_card'); ?></p>
                            <p class="founders-grotesk premio-infos-praia"><?php echo get_sub_field('titulo_premio'); ?></p>
                        </div>
                        <?php
                        $counter++;
                    endwhile;
                endif;
                ?>
            </div>

        </div>
    </div>

    <div class="galeria">
        <div class="wrapper">
            <div class="boxs-container-galeria text-galeria">
                <h3 class="titulo-galeria terminal-test"><?php echo get_field('titulo_da_galeria'); ?></h3>
                <div class="box-caracteristicas">
                    <?php
                    if (have_rows('caracteristicas')):
                        while (have_rows('caracteristicas')):
                            the_row(); ?>
                            <div class="row-caracteristicas">
                                <div class="box-svg">
                                    <?php $svg_file = get_sub_field('svg_caracteristica');
                                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                        echo '<i class="element">';
                                        echo file_get_contents($svg_file['url']);
                                        echo '</i>';
                                    } ?>
                                </div>
                                <p class="texto-caracteristica founders-grotesk">
                                    <?php echo get_sub_field('texto_da_caracteristica'); ?>
                                </p>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
            <div class="boxs-container-galeria imagens-galeria">
                <div class="box-column column-left">
                    <?php
                    if (have_rows('imagens')):
                        $index = 1;
                        while (have_rows('imagens')):
                            the_row();
                            if ($index % 2 !== 0): // Ímpar
                                $image = get_sub_field('imagem_galeria');
                                if ($image):
                                    $image_url = $image['url'];
                                    $image_alt = $image['alt']; ?>
                                    <a class="img" style="height: <?php echo get_sub_field('altura_da_imagem') ?>;"
                                        href="<?php echo esc_url($image_url); ?>" data-fancybox
                                        data-caption="<?php echo esc_attr($image_alt); ?>">
                                        <img class="imgGrow" src="<?php echo esc_url($image_url); ?>"
                                            alt="<?php echo esc_attr($image_alt); ?>">
                                    </a>
                                <?php endif;
                            endif;
                            $index++;
                        endwhile;
                    endif; ?>
                </div>

                <div class="box-column column-right">
                    <?php
                    if (have_rows('imagens')):
                        $index = 1;
                        while (have_rows('imagens')):
                            the_row();
                            if ($index % 2 === 0): // Par
                                $image = get_sub_field('imagem_galeria');
                                if ($image):
                                    $image_url = $image['url'];
                                    $image_alt = $image['alt']; ?>
                                    <a class="img" style="height: <?php echo get_sub_field('altura_da_imagem') ?>;"
                                        href="<?php echo esc_url($image_url); ?>" data-fancybox
                                        data-caption="<?php echo esc_attr($image_alt); ?>">
                                        <img class="imgGrow" src="<?php echo esc_url($image_url); ?>"
                                            alt="<?php echo esc_attr($image_alt); ?>">
                                    </a>
                                <?php endif;
                            endif;
                            $index++;
                        endwhile;
                    endif; ?>
                </div>
            </div>

            <div class="boxs-container-galeria imagens-galeria-mobile">
                <div class="swiper-container swiper-galeria">
                    <div class="swiper-wrapper">
                        <?php
                        if (have_rows('imagens')):
                            while (have_rows('imagens')):
                                the_row(); ?>
                                <div class="swiper-slide">
                                    <?php
                                    $image = get_sub_field('imagem_galeria');
                                    if ($image):
                                        $image_url = $image['url'];
                                        $image_alt = $image['alt']; ?>
                                        <a class="img" href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery"
                                            data-caption="<?php echo esc_attr($image_alt); ?>">
                                            <img class="imgGrow" src="<?php echo esc_url($image_url); ?>"
                                                alt="<?php echo esc_attr($image_alt); ?>">
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>

    </div>

    <div class="experiencia-resort">
        <div class="wrapper">
            <h2 class="titulo-espaco"><?php echo get_field('titulo_espacos'); ?></h2>
            <div class="box-lista-rota">
                <?php
                if (have_rows('categoria_aba')):
                    while (have_rows('categoria_aba')):
                        the_row();

                        $nome_categoria = get_sub_field('nome_da_categoria_aba');
                        $categoria_slug = sanitize_title($nome_categoria);
                        echo "<div class='lista-rota'>";
                        echo "<h2 data-value='$categoria_slug' class='item-rota'>$nome_categoria</h2>";
                        echo '</div>';

                    endwhile;
                endif; ?>
            </div>
            <div class="box-aba-galeria">
                <?php
                if (have_rows('categoria_aba')):
                    while (have_rows('categoria_aba')):
                        the_row();

                        $nome_categoria = get_sub_field('nome_da_categoria_aba');
                        $categoria_slug = sanitize_title($nome_categoria);

                        echo '<div id="swiper-' . esc_attr($categoria_slug) . '" class="swiper swiper-rota-destino" style="display:none;">';
                        echo '<div class="swiper-wrapper">';

                        if (have_rows('espaco')):
                            while (have_rows('espaco')):
                                the_row();

                                $nome_do_espaco = get_sub_field('nome_do_espaco');

                                // Novo repetidor de imagens, mas apenas a primeira será usada como destaque
                                if (have_rows('imagens_do_espaco')):
                                    the_row(); // Pega a primeira imagem do repetidor
                                    $imagem = get_sub_field('imagem'); // Supondo que este seja o campo de imagem
                
                                    if ($imagem):
                                        $url_imagem = esc_url($imagem['url']);
                                        $alt_imagem = esc_attr($nome_do_espaco);

                                        echo '<div class="swiper-slide">';
                                        echo '<div class="card-rota">';

                                        // Exibe a primeira imagem como thumbnail
                                        echo '<a href="' . $url_imagem . '" data-fancybox="gallery-' . esc_attr($categoria_slug) . '" data-caption="' . $alt_imagem . '">';
                                        echo '<img src="' . $url_imagem . '" alt="' . $alt_imagem . '">';
                                        echo '</a>';

                                        echo '<div class="card-rota-content">';
                                        echo '<h2 class="card-rota-title">' . esc_html($nome_do_espaco) . '</h2>';
                                        echo '</div></div></div>';

                                    endif;

                                endif;

                            endwhile;
                        else:
                            echo '<p>Nenhuma rota encontrada para ' . esc_html($nome_categoria) . '.</p>';
                        endif;

                        echo '</div>';
                        echo '<div class="box-buttons-swiper">';
                        echo '<svg class="swiper-btn-destino-prev"></svg>';
                        echo '<svg class="swiper-btn-destino-next"></svg>';
                        echo '</div></div>';

                    endwhile;
                else:
                    echo '<p>Nenhuma categoria encontrada.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>

    <div class="explore-empreendimento">
        <div class="wrapper">
            <h3 class="titulo-explore terminal-test"><?php echo get_field('titulo_explore_empreendimentos'); ?></h3>
        </div>

        <div class="box-image-mapa">
            <div class="shape-orientacao">
                <?php $svg_file = get_field('svg_orientacao');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo '<i class="element">';
                    echo file_get_contents($svg_file['url']);
                    echo '</i>';
                } ?>
            </div>
            <?php
            $selected_post = get_field('imagem_do_empreendimento');
            if ($selected_post) {
                $post_id = $selected_post->ID;
                $shortcode = '[devvn_ihotspot id="' . $post_id . '"]';
                echo do_shortcode($shortcode);
            }
            ?>
        </div>
    </div>

    <div class="tipologias-do-empreendimento">
        <?php

        $empreendimentoID = get_field('empreendimento_single_page');
        $empreendimentoName = '';
        $argsEmpreendimento = array(
            'post_type' => 'empreendimentos',
            'post__in' => array($empreendimentoID),
            'post_status' => 'publish'
        );

        $queryEmpreendimento = new WP_Query($argsEmpreendimento);

        if ($queryEmpreendimento->have_posts()) {
            while ($queryEmpreendimento->have_posts()) {
                $queryEmpreendimento->the_post();
                $empreendimentoName = get_field('empreendimento_nome', $empreendimentoID);
            }
            wp_reset_postdata();
        }

        $tipologiasDoEmpreendimento = [];
        $argsTipologia = array(
            'post_type' => 'tipologias',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        );
        $queryTipologia = new WP_Query($argsTipologia);
        if ($queryTipologia->have_posts()) {
            while ($queryTipologia->have_posts()) {
                $queryTipologia->the_post();
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
                            $rooms = $min_rooms . ' quartos';
                        }
                    endwhile;
                }
                ;
                $size = '';
                if (have_rows('metragem_tipologia', $tipologiaId)) {
                    while (have_rows('metragem_tipologia', $tipologiaId)):
                        the_row();
                        $min_size = get_sub_field('metragem_minima_tipologia');
                        $max_size = get_sub_field('metragem_maxima_tipologia');

                        if ($min_size && $max_size) {
                            $size = $min_size . ' a ' . $max_size . 'm²';
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

        // usar essa variável para renderizar as tipologias no frontend
        // var_dump($tipologiasDoEmpreendimento);
        
        ?>
        <div class="wrapper">
            <h3 class="titulo-tipologia-do-empreendimento">
                <?php echo get_field('titulo_tipologias_do_empreendimento'); ?>
            </h3>
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
                            <a href="<?php echo $tipologia['link']; ?>"
                                class="swiper-slide <?php echo esc_html($statusClass); ?>">
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
                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle opacity="0.7" cx="15" cy="15" r="15" fill="#FAF2EB" />
                                                <path
                                                    d="M12.3333 9H10.3333C9.97971 9 9.64057 9.14048 9.39052 9.39052C9.14048 9.64057 9 9.97971 9 10.3333V12.3333M21 12.3333V10.3333C21 9.97971 20.8595 9.64057 20.6095 9.39052C20.3594 9.14048 20.0203 9 19.6667 9H17.6667M17.6667 21H19.6667C20.0203 21 20.3594 20.8595 20.6095 20.6095C20.8595 20.3594 21 20.0203 21 19.6667V17.6667M9 17.6667V19.6667C9 20.0203 9.14048 20.3594 9.39052 20.6095C9.64057 20.8595 9.97971 21 10.3333 21H12.3333"
                                                    stroke="#002B36" stroke-width="1.2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <p class="metragem founders-grotesk"><?php echo esc_html($tipologia['size']); ?>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="container-diferencias">

                                        <?php foreach ($tipologia['diffs'] as $diff): ?>
                                            <div class="box-diferencias">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none">
                                                    <path
                                                        d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z"
                                                        stroke="#002B36" stroke-linecap="round" stroke-linejoin="round" />
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

    <div class="diferenciais" id="diferenciais">
        <div class="wrapper">

            <h3 class="titulo-diferenciais terminal-test"><?php echo get_field('titulo_diferencias'); ?></h3>
            <div class="box-cards-diferenciais <?php if (have_rows('diferenciais') && count(get_field('diferenciais')) <= 3) {
                echo 'center-rows';
            } ?>">
                <?php
                if (have_rows('diferenciais')):
                    while (have_rows('diferenciais')):
                        the_row(); ?>
                        <div class="row-cards">
                            <div class="box-svg">
                                <?php
                                $svg_file = get_sub_field('icone');
                                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                    echo '<i class="element">';
                                    echo file_get_contents($svg_file['url']);
                                    echo '</i>';
                                } ?>
                            </div>
                            <p class="text-repeater founders-grotesk"><?php echo get_sub_field('texto_do_diferencial'); ?></p>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>

            <div class="box-cards-swiper">
                <div class="swiper-container swiper-diferenciais">
                    <div class="swiper-wrapper">
                        <?php
                        if (have_rows('diferenciais')):
                            while (have_rows('diferenciais')):
                                the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="row-cards">
                                        <div class="box-svg">
                                            <?php $svg_file = get_sub_field('icone');
                                            if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                                echo '<i class="element">';
                                                echo file_get_contents($svg_file['url']);
                                                echo '</i>';
                                            } ?>
                                        </div>
                                        <p class="text-repeater founders-grotesk">
                                            <?php echo get_sub_field('texto_do_diferencial'); ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endwhile;
                        endif; ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('template-realizamos-sonhos/realizamos-sonhos'); ?>
    <?php get_template_part('template-invista/invista'); ?>

    <div class="evolucao-obra">
        <div class="wrapper">
            <h3 class="titulo-status-obra">
                <?php echo get_field('titulo_status_de_obra'); ?>
            </h3>
        </div>
        <div class="box-estagio-obra">
            <?php
            if (have_rows('estagio_obra')):
                while (have_rows('estagio_obra')):
                    the_row(); ?>
                    <div class="row-estagio">
                        <div class="bullet" data-fill="<?php echo get_sub_field('porcentagem_da_obra') ?>">
                            <div class="line"></div>
                        </div>
                        <p class="porcentagem founders-grotesk"><?php echo get_sub_field('porcentagem_da_obra'); ?></p>
                        <p class="titulo-estagio founders-grotesk"><?php echo get_sub_field('titulo_estagio'); ?></p>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>
        <div class="box-portal-cliente">

            <h4 class="titulo-portal-cliente"><?php echo get_field('titulo_portal_do_cliente'); ?></h4>
            <?php
            $link = get_field('acessar_o_portal');
            if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_3369_6909)">
                            <circle cx="12" cy="12.5" r="12" fill="#E9E3DD" />
                            <g clip-path="url(#clip1_3369_6909)">
                                <path
                                    d="M7.1137 9.79766C7.1137 12.5179 9.32742 14.7317 12.0477 14.7317C14.768 14.7317 16.9817 12.5179 16.9817 9.79766C16.9817 7.07737 14.768 4.86365 12.0477 4.86365C9.32742 4.86365 7.1137 7.07737 7.1137 9.79766ZM20.8193 24.5H21.9157V23.4036C21.9157 19.1724 18.9852 15.7284 15.1576 15.7284C15.1576 15.7284 13.4831 16.2115 12.0477 16.2115C10.6124 16.2115 8.93779 15.7284 8.93779 15.7284C5.11019 15.7284 2.17969 19.1724 2.17969 23.4036V24.5H20.8193Z"
                                    fill="#003B4B" />
                            </g>
                        </g>
                        <defs>
                            <clipPath id="clip0_3369_6909">
                                <rect y="0.5" width="24" height="24" rx="12" fill="white" />
                            </clipPath>
                            <clipPath id="clip1_3369_6909">
                                <rect width="24" height="24" fill="white" transform="translate(0 0.5)" />
                            </clipPath>
                        </defs>
                    </svg>

                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="informacoes-obra">
        <div class="wrapper">
            <div class="box-infos-obra box-titulos">
                <h3 class="titulo-infos-obra terminal-test">
                    <?php echo get_field('titulo_informacoes_tecnicas_da_obra'); ?>
                </h3>
                <p class="descricao-infos-obra founders-grotesk">
                    <?php echo get_field('descricao_informacoes_tecnicas_da_obra'); ?>
                </p>
            </div>
            <div class="box-infos-obra box-autores">
                <?php
                if (have_rows('autores_informacoes_tecnicas_da_obra')):
                    while (have_rows('autores_informacoes_tecnicas_da_obra')):
                        the_row(); ?>
                        <div class="row-autores">
                            <h4 class="titulo-autores founders-grotesk">
                                <?php echo get_sub_field('titulo_autores_informacoes_tecnicas_da_obra'); ?>
                            </h4>
                            <?php
                            if (have_rows('autor_informacoes_tecnicas_da_obra')):
                                while (have_rows('autor_informacoes_tecnicas_da_obra')):
                                    the_row(); ?>
                                    <p class="text-autor founders-grotesk">
                                        <?php echo get_sub_field('texto_autor_informacoes_tecnicas_da_obra'); ?>
                                    </p>
                                <?php endwhile;
                            endif; ?>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>



</section>

<?php
get_footer();
?>
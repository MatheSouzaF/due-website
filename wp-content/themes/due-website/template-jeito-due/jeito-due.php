<?php
//Template Name: Jeito DUE
wp_enqueue_style('jeito-due', get_template_directory_uri() . '/assets/dist/css/jeito-due/jeito-due.css', ['main'], ASSETS_VERSION);
get_header();
?>
<div class="page-jeito-due">

    <section class="banner-jeito-due">
        <div class="wrapper">
            <p class="label-jeito-due"><?php echo get_field('label_jeito_due_mobile'); ?></p>
            <h1 class="titulo-jeito-due terminal-test"><?php echo get_field('titulo_jeito_due'); ?></h1>
            <p class="descricao-jeito-due founders-grotesk"><?php echo get_field('descricao_jeito_due'); ?></p>
        </div>
        <div class="box-video">
            <video class="imgGrow" autoplay="autoplay" src="<?php echo get_field('video_jeito_due') ?>" muted loop play></video>

            <div class="botao-mobile">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                    <rect x="0.5" y="0.5" width="79" height="79" rx="39.5" stroke="white" />
                    <path d="M36.1055 48V36.6316V32L47.8949 40L36.1055 48Z" stroke="white" />
                </svg>
                <p><?php echo __('ASSISTA E CONHEÇA', 'due-website'); ?> </p>
            </div>
        </div>
        <div class="wrapper-mobile">

            <p class="descricao-jeito-due-mobile founders-grotesk"><?php echo get_field('descricao_jeito_due'); ?></p>
        </div>
        <?php $video = get_field('url_video_do_youtube'); ?>
        <div class="box-youtube-vivencie" id="youtube">

            <svg class="svg-close" width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L40.9997 40.9997" stroke="#212121" />
                <path d="M1 40.9995L40.9997 0.999816" stroke="#212121" />
            </svg>
            <div class="my-video" id="my-video">
                <iframe id="youtube-player" src="<?php echo $video ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </section>


    <section class="proposito-jeito-due">
        <div class="wrapper">
            <div class="box-texto">
                <h2 class="titulo-proposito-jeito-due terminal-test"><?php echo get_field('titulo_proposito_jeito_due'); ?></h2>
            </div>

            <div class="box-img-repeater">
                <div class="img-video">
                    <?php
                    $modalVideo = get_field('video_proposito_jeito_due');
                    ?>
                    <div class="button-play js-modal-jeito-due" data-src="<?php echo htmlspecialchars($modalVideo); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <rect x="0.5" y="0.5" width="79" height="79" rx="39.5" stroke="white" />
                            <path d="M36.1055 48V36.6316V32L47.8949 40L36.1055 48Z" stroke="white" />
                        </svg>
                        <p><?php echo __('ASSISTA E CONHEÇA', 'due-website'); ?> </p>
                    </div>

                    <?php
                    $image = get_field('imagem_proposito_jeito_due');
                    if ($image) :
                        $image_url = $image['url'];
                        $image_alt = $image['alt']; ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                    <?php endif; ?>

                    <div class="modal js-modal">
                        <div class="modal__bg js-modal-close-jeito-due"></div>
                        <div class="modal__content">
                            <div class="video-container"></div>

                        </div>
                        <span class="js-modal-close-btn-jeito-due">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                                <g clip-path="url(#clip0_2145_7167)">
                                    <path class="hover-line" d="M1 1L30.1161 28.983" stroke="white" stroke-width="2" />
                                    <path class="hover-line" d="M1 28.9835L30.1161 1.0005" stroke="white" stroke-width="2" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2145_7167">
                                        <rect width="31" height="30" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="container-text">

                    <div class="box-svg-text">
                        <?php
                        if (have_rows('repetidor_proposito_jeito_due')) :
                            while (have_rows('repetidor_proposito_jeito_due')) : the_row(); ?>
                                <div class="box-repeater">
                                    <h3 class="titulo-repetidor"><?php echo get_sub_field('titulo_repetidor_proposito_jeito_due'); ?></h3>
                                    <p class="text-box-repeater founders-grotesk"><?php echo get_sub_field('descricao_repetidor_proposito_jeito_due'); ?></p>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>
                    <div class="repetidor-accordion">
                        <h3 class="titulo-repetidor"><?php echo get_field('nosso_proposito_titulo_wysiwyg'); ?></h3>

                        <?php
                        if (have_rows('repetidor_accordion')) :
                            while (have_rows('repetidor_accordion')) : the_row(); ?>
                                <div class="box-card-faq">
                                    <div class="title-svg">
                                        <h4 class="founders-grotesk"><?php echo get_sub_field('titulo_accordion') ?></h4>
                                        <i class="svg-proposito">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12.5" cy="12.5" r="12.5" fill="#E5EBED" fill-opacity="0.5" />
                                                <path d="M8.70768 10.604L12.4993 14.3957L16.291 10.604" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                        </i>
                                    </div>
                                    <div id="descwrapper" class="desWrapper">
                                        <div class="description-off founders-grotesk"><?php echo get_sub_field('descricao_accordion') ?></div>

                                    </div>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="big-numeros">
        <?php
        // Verifica se há conteúdo em 'image_big_numeros' ou 'card_big_numeros'
        $image = get_field('image_big_numeros');
        $has_card_content = have_rows('card_big_numeros');

        // Exibe a div .shape-bg-due apenas se houver conteúdo
        if ($image || $has_card_content): ?>
            <div class="shape-bg-due">
                <svg xmlns="http://www.w3.org/2000/svg" width="473" height="627" viewBox="0 0 473 627" fill="none">
                    <path d="M322.574 572.353L322.858 572.217V571.902V0.5H472.415V6.77321V384.076V384.38C472.415 517.887 366.543 626.5 236.458 626.5C106.373 626.5 0.5 517.887 0.5 384.38V0.5H150.142V571.902V572.217L150.426 572.353L152.415 573.308L152.418 573.31C179.1 585.889 207.355 592.245 236.5 592.245C265.645 592.245 293.9 585.889 320.582 573.31L320.585 573.308L322.574 572.353ZM116.009 551.45L116.825 552.113V551.062V35.2555V34.7555H116.325H34.4446H33.9446V35.2555V384.38C33.9446 448.048 61.8537 507.327 110.508 546.977L110.508 546.978L116.009 551.45ZM439.14 386.251V386.247V35.2555V34.7555H438.64H356.76H356.26V35.2555V551.062V552.113L357.075 551.45L362.576 546.978L362.577 546.977C410.679 507.762 438.589 449.224 439.14 386.251Z" stroke="#E9E3DD" />
                </svg>
            </div>
        <?php endif; ?>

        <div class="box-image-big-numeros">
            <?php
            // Verifica e exibe a imagem
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img class="img-path-big-numeros" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>

            <div class="box-card-big-numeros">
                <?php
                // Loop para exibir os cartões de números, se houver
                if ($has_card_content) :
                    while (have_rows('card_big_numeros')) : the_row(); ?>
                        <div class="lista-big-numeros">
                            <h4 class="titulo-card-big-numeros terminal-test"><?php echo get_sub_field('titulo_big_numeros'); ?></h4>
                            <p class="descricao-card-big-numeros founders-grotesk"><?php echo get_sub_field('descricao_big_numeros'); ?></p>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
        <div class="box-empyt"></div>
    </section>

    <section class="reducao-social">
        <div class="container-social">

            <div class="box-texto-reducao-social">
                <h2 class="titulo-reducao-social terminal-test"><?php echo get_field('titulo_reducao_das_diferencas_sociais'); ?></h2>
                <div class="descricao-reducao-social">
                    <?php echo get_field('descricao_reducao_das_diferencas_sociais'); ?>
                </div>
            </div>
            <div class="box-img-reducao-social">
                <?php
                $image = get_field('imagem_reducao_das_diferencas_sociais');
                if ($image) :
                    $image_url = $image['url'];
                    $image_alt = $image['alt']; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="card-repetidor">
        <div class="wrapper">
            <h3 class="titulo-card-iniciativas"><?php echo get_field('titulo_cards_iniciativas'); ?></h3>
            <p class="subtitulo-card-iniciativas founders-grotesk"><?php echo get_field('subtitulo_cards_iniciativas'); ?></p>
        </div>

        <div class="swiper swiper-iniciativas">
            <div class="swiper-wrapper">
                <?php
                if (have_rows('repetidor_cards')) :
                    $i = 0; // Inicializa o contador
                    while (have_rows('repetidor_cards')) : the_row();
                        $i++;
                        $card_class = ($i % 2 == 0) ? 'lista-card-right' : 'lista-card-left';
                ?>
                        <div class="lista-card swiper-slide <?php echo $card_class; ?>">
                            <div class="box-texto">
                                <h3 class="titulo-card terminal-test"><?php echo get_sub_field('titulo_card'); ?></h3>
                                <?php
                                $link = get_sub_field('link_card');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a class="button-v2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <p class=""><?php echo esc_html($link_title); ?></p>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="img-hover">
                                <?php
                                $image = get_sub_field('imagem_card');
                                if ($image) :
                                    $image_url = $image['url'];
                                    $image_alt = $image['alt']; ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="box-buttons">

                <svg class="swiper-btn-next" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                    <circle cx="40" cy="40" r="40" fill="white" />
                    <path d="M24 39C23.4477 39 23 39.4477 23 40C23 40.5523 23.4477 41 24 41L24 39ZM56.7071 40.7071C57.0976 40.3166 57.0976 39.6834 56.7071 39.2929L50.3431 32.9289C49.9526 32.5384 49.3195 32.5384 48.9289 32.9289C48.5384 33.3195 48.5384 33.9526 48.9289 34.3431L54.5858 40L48.9289 45.6569C48.5384 46.0474 48.5384 46.6805 48.9289 47.0711C49.3195 47.4616 49.9526 47.4616 50.3431 47.0711L56.7071 40.7071ZM24 41L56 41L56 39L24 39L24 41Z" fill="#003B4B" />
                </svg>

                <svg class="swiper-btn-prev" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                    <circle cx="40" cy="40" r="40" transform="matrix(-1 0 0 1 80 0)" fill="white" />
                    <path d="M56 39C56.5523 39 57 39.4477 57 40C57 40.5523 56.5523 41 56 41L56 39ZM23.2929 40.7071C22.9024 40.3166 22.9024 39.6834 23.2929 39.2929L29.6569 32.9289C30.0474 32.5384 30.6805 32.5384 31.0711 32.9289C31.4616 33.3195 31.4616 33.9526 31.0711 34.3431L25.4142 40L31.0711 45.6569C31.4616 46.0474 31.4616 46.6805 31.0711 47.0711C30.6805 47.4616 30.0474 47.4616 29.6569 47.0711L23.2929 40.7071ZM56 41L24 41L24 39L56 39L56 41Z" fill="#003B4B" />
                </svg>
            </div>

        </div>
    </section>

    <section class="sintta-stay">
        <div class="box-conteudo-sintta">
            <div class="box-svg">
                <?php $svg_file = get_field('logo_sintta');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo '<i class="element">';
                    echo file_get_contents($svg_file['url']);
                    echo '</i>';
                } ?>
            </div>
            <h3 class="titulo-sintta"><?php echo get_field('titulo_sintta'); ?></h3>
            <p class="descricao-sintta founders-grotesk"><?php echo get_field('descricao_sintta'); ?></p>
            <div class="box-repetidor-sintta">
                <?php
                if (have_rows('repetidor_de_topicos_sintta')) :
                    while (have_rows('repetidor_de_topicos_sintta')) : the_row(); ?>
                        <div class="row-topicos">

                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="10" viewBox="0 0 9 10" fill="none">
                                    <circle cx="4.5" cy="4.5166" r="4.5" fill="#51848C" />
                                </svg>
                            </i>
                            <p class="texto-topicos founders-grotesk"><?php echo get_sub_field('textos_topicos'); ?></p>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
            <?php
            $link = get_field('link_sintta');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button gtm-sintta-stay-jeito-due" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>

        <div class="box-image-sintta">
            <div class="swiper-sintta">
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('repetidor_imagens_sintta')) :
                        while (have_rows('repetidor_imagens_sintta')) : the_row();
                    ?>
                            <div class="swiper-slide">
                                <?php
                                $image = get_sub_field('imagem_sintta');
                                if ($image) :
                                    $image_url = $image['url'];
                                    $image_alt = $image['alt']; ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                <?php endif; ?>
                            </div>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>

        </div>
    </section>

    <section class="tuo-incorporadora">
        <div class="box-image-sintta">
            <div class="swiper-sintta">
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('imagens_tuo')) :
                        while (have_rows('imagens_tuo')) : the_row();
                    ?>
                            <div class="swiper-slide">
                                <?php
                                $image = get_sub_field('imagem_tuo_incorporadora');
                                if ($image) :
                                    $image_url = $image['url'];
                                    $image_alt = $image['alt']; ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                <?php endif; ?>
                            </div>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>

        </div>
        <div class="box-conteudo-sintta">
            <div class="box-svg">
                <?php $svg_file = get_field('svg_tuo_incorporadora');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo '<i class="element">';
                    echo file_get_contents($svg_file['url']);
                    echo '</i>';
                } ?>
            </div>
            <h3 class="label-sintta"><?php echo get_field('label_tuo_incorporadora'); ?></h3>
            <h3 class="titulo-sintta"><?php echo get_field('titulo_tuo_incorporadora'); ?></h3>
            <p class="descricao-sintta founders-grotesk"><?php echo get_field('descricao_tuo_incorporadora'); ?></p>

            <?php
            $link = get_field('link_tuo_incorporadora');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button gtm-sintta-stay-jeito-due" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>


    </section>


    <div class="call-form" id="call-form"></div>

</div>


<?php get_footer() ?>
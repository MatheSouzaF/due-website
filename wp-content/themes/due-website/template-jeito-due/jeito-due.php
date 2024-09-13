<?php
//Template Name: Jeito DUE
wp_enqueue_style('jeito-due', get_template_directory_uri() . '/assets/dist/css/jeito-due/jeito-due.css', ['main'], ASSETS_VERSION);
get_header();
?>
<div class="page-jeito-due">

    <section class="banner-jeito-due">
        <div class="wrapper">

            <h1 class="titulo-jeito-due terminal-test"><?php echo get_field('titulo_jeito_due'); ?></h1>
            <p class="descricao-jeito-due founders-grotesk"><?php echo get_field('descricao_jeito_due'); ?></p>
        </div>
        <div class="box-video">
            <video class="imgGrow" autoplay="autoplay" src="<?php echo get_field('video_jeito_due') ?>" muted loop play></video>

        </div>
        <div class="wrapper-mobile">

            <p class="descricao-jeito-due-mobile founders-grotesk"><?php echo get_field('descricao_jeito_due'); ?></p>
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
                        <p><?php echo __('ASSISTA E CONHECA', 'due-website'); ?> </p>
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
                    <div class="box-wysiwyg">
                        <h3 class="titulo-repetidor"><?php echo get_field('nosso_proposito_titulo_wysiwyg'); ?></h3>
                        <div class="descricao-wysiwyg"><?php echo get_field('nosso_proposito_wysiwyg'); ?></div>
                    </div>
                </div>
            </div>
        </div>
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
            <div class="box-repetidor">
                <?php
                if (have_rows('repetidor_cards')) :
                    $i = 0; // Inicializa o contador
                    while (have_rows('repetidor_cards')) : the_row();
                        $i++;
                        $card_class = ($i % 2 == 0) ? 'lista-card-right' : 'lista-card-left';
                ?>
                        <div class="lista-card <?php echo $card_class; ?>">
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

</div>


<?php get_footer() ?>
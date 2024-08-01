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
        <div class="box-image-banner">

            <?php
            $image = get_field('imagem_jeito_due');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div>
        <div class="wrapper-mobile">

            <p class="descricao-jeito-due-mobile founders-grotesk"><?php echo get_field('descricao_jeito_due'); ?></p>
        </div>

    </section>

    <section class="proposito-jeito-due">
        <div class="wrapper">
            <h2 class="titulo-proposito-jeito-due terminal-test"><?php echo get_field('titulo_proposito_jeito_due'); ?></h2>

            <div class="box-img-repeater">
                <div class="img-video">
                    <?php
                    $modalVideo = get_field('video_proposito_jeito_due');
                    ?>
                    <div class="button-play js-modal-open" data-src="<?php echo htmlspecialchars($modalVideo); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <rect x="0.5" y="0.5" width="79" height="79" rx="39.5" stroke="white" />
                            <path d="M36.1055 48V36.6316V32L47.8949 40L36.1055 48Z" stroke="white" />
                        </svg>
                        <p>ASSISTA E CONHECA</p>
                    </div>

                    <?php
                    $image = get_field('imagem_proposito_jeito_due');
                    if ($image) :
                        $image_url = $image['url'];
                        $image_alt = $image['alt']; ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                    <?php endif; ?>

                    <div class="modal js-modal">
                        <div class="modal__bg js-modal-close"></div>
                        <div class="modal__content">
                            <div class="video-container"></div>

                        </div>
                        <span class="js-modal-close-btn">
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
                <div class="box-svg-text">

                    <?php
                    if (have_rows('repetidor_proposito_jeito_due')) :
                        while (have_rows('repetidor_proposito_jeito_due')) : the_row(); ?>
                            <div class="box-repeater">
                                <div class="box-svg">
                                    <?php $svg_file = get_sub_field('svg_repetidor_proposito_jeito_due');
                                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                        echo '<i class="element">';
                                        echo file_get_contents($svg_file['url']);
                                        echo '</i>';
                                    } ?>
                                </div>
                                <p class="text-box-repeater founders-grotesk"><?php echo get_sub_field('descricao_repetidor_proposito_jeito_due'); ?></p>
                            </div>
                    <?php endwhile;
                    endif; ?>
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
</div>


<?php get_footer() ?>
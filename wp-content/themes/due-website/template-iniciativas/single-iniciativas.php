<?php
//Template Name: Single Iniciativa
wp_enqueue_style('Single-Iniciativas', get_template_directory_uri() . '/assets/dist/css/iniciativas/single-iniciativas.css', ['main'], ASSETS_VERSION);
get_header();

?>
<div class="banner">
    <div class="wrapper">
        <p class="subtitulo-banner"><?php echo get_field('subtitulo_iniciativas'); ?></p>
        <h1 class="titulo-banner"><?php echo get_field('titulo_iniciativas'); ?></h1>
    </div>
    <div class="imagem-banner">
        <video class="video-banner" autoplay="autoplay" src="<?php echo get_field('video_banner_iniciativas') ?>" muted loop play></video>
        <?php
        $image = get_field('imagem_banner_iniciativas_desktop');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt']; ?>
            <img class="img-desktop" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>
        <?php
        $image = get_field('imagem_banner_iniciativas_mobile');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt']; ?>
            <img class="img-mobile" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>
        <p class="label-banner"><?php echo get_field('label_banner_iniciativas'); ?></p>
    </div>
</div>
<?php
$tituloResultado = get_field('titulo_resultados_que_falam');
?>
<?php if ($tituloResultado) : ?>
    <div class="resultado-que-importa">
        <div class="wrapper">

            <div class="box-conteudo-resultado">
                <p class="label-resultado"><?php echo get_field('label_resultados_que_falam'); ?></p>
                <h2 class="titulo-resultado"><?php echo get_field('titulo_resultados_que_falam'); ?></h2>
                <p class="descricao-resultado founders-grotesk"><?php echo get_field('descricao_resultados_que_falam'); ?></p>
            </div>
            <div class="box-conteudo-resultado conteudo-imagem">
                <?php
                $videoSrc = get_field('link_do_video');
                ?>

                <video class="video-resultado" autoplay="autoplay" src="<?php echo $videoSrc; ?>" muted loop play></video>

                <?php if (!empty($videoSrc)): ?>
                    <div class="button-play box-button" data-src="<?php echo htmlspecialchars($modalVideo); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <rect x="0.5" y="0.5" width="79" height="79" rx="39.5" stroke="white" />
                            <path d="M36.1055 48V36.6316V32L47.8949 40L36.1055 48Z" stroke="white" />
                        </svg>
                        <p><?php echo __('ASSISTA E CONHEÇA', 'due-website'); ?></p>
                    </div>
                <?php endif; ?>
                <?php $video = get_field('link_do_video'); ?>
                <div class="box-youtube-vivencie" id="youtube">

                    <svg class="svg-close" width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L40.9997 40.9997" stroke="#212121" />
                        <path d="M1 40.9995L40.9997 0.999816" stroke="#212121" />
                    </svg>
                    <div class="my-video" id="my-video">
                        <iframe id="youtube-player" src="<?php echo $video ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>

                <?php
                $image = get_field('imagem_background_resultados_que_falam');
                if ($image) :
                    $image_url = $image['url'];
                    $image_alt = $image['alt']; ?>
                    <img class="img-resultado" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>

                <div class="box-svg">
                    <?php $svg_file = get_field('svg_resultados_que_falam');
                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                        echo '<i class="element">';
                        echo file_get_contents($svg_file['url']);
                        echo '</i>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
$tituloTransformando = get_field('titulo_transformando_vidas');
?>
<?php if ($tituloTransformando) : ?>
    <div class="transformando-vidas">
        <div class="bg-imagem">
            <?php
            $image = get_field('imagem_background_transformando_vidas');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img class="img-desktop" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
            <?php
            $image = get_field('imagem_background_transformando_vidas_mobile');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img class="img-mobile" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
            <h2 class="titulo-transformando-vidas">
                <?php echo get_field('titulo_transformando_vidas'); ?>
            </h2>
            <svg class="shadow-text" width="946" height="550" viewBox="0 0 946 550" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="473" cy="275" rx="473" ry="275" fill="url(#paint0_radial_6141_502)" fill-opacity="0.5" />
                <defs>
                    <radialGradient id="paint0_radial_6141_502" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(473 275) rotate(90) scale(275 473)">
                        <stop />
                        <stop offset="1" stop-opacity="0" />
                    </radialGradient>
                </defs>
            </svg>

        </div>
        <div class="box-numeros">
            <div class="repetidor">
                <?php
                if (have_rows('repetidor_numeros_transformando_vidas')) :
                    while (have_rows('repetidor_numeros_transformando_vidas')) : the_row(); ?>
                        <div class="row-numero">
                            <p class="numero"><?php echo get_sub_field('numero_transformando_vidas'); ?></p>
                            <p class="label-numero"><?php echo get_sub_field('label_numero_transformando_vidas'); ?></p>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
$tituloGaleria = get_field('titulo_atividade_que_realizamos');
?>
<?php if ($tituloGaleria) : ?>
    <div class="galeria">
        <div class="wrapper">
            <h2 class="titulo-galeria"><?php echo get_field('titulo_atividade_que_realizamos'); ?></h2>
            <p class="label-galeria"><?php echo get_field('subtitulo_atividade_que_realizamos'); ?></p>
        </div>

        <div class="box-galeria">
            <div class="swiper-container swiper-galeria">
                <div class="swiper-wrapper">
                    <?php if (have_rows('galeria_atividade_que_realizamos')): ?>
                        <?php while (have_rows('galeria_atividade_que_realizamos')) : the_row(); ?>
                            <div class="swiper-slide slide-image">
                                <?php
                                $image = get_sub_field('imagem_galeria_atividade_que_realizamos');
                                if ($image):
                                    $image_url = $image['url'];
                                    $image_alt = $image['alt'];
                                ?>
                                    <!-- Link para a imagem no Fancybox -->
                                    <a class="box-img" href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($image_alt); ?>">
                                        <img class="imgGrow" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                    </a>

                                <?php endif; ?>


                                <p class="label-slide"><?php echo get_sub_field('titulo_imagem_atividade_que_realizamos'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="swiper-pagination"></div>

                <div class="box-buttons">
                    <svg class="swiper-button-next desktop-next" xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                        viewBox="0 0 80 80" fill="none">
                        <circle cx="40" cy="40" r="40" fill="white" />
                        <path
                            d="M24 39C23.4477 39 23 39.4477 23 40C23 40.5523 23.4477 41 24 41L24 39ZM56.7071 40.7071C57.0976 40.3166 57.0976 39.6834 56.7071 39.2929L50.3431 32.9289C49.9526 32.5384 49.3195 32.5384 48.9289 32.9289C48.5384 33.3195 48.5384 33.9526 48.9289 34.3431L54.5858 40L48.9289 45.6569C48.5384 46.0474 48.5384 46.6805 48.9289 47.0711C49.3195 47.4616 49.9526 47.4616 50.3431 47.0711L56.7071 40.7071ZM24 41L56 41L56 39L24 39L24 41Z"
                            fill="#003B4B" />
                    </svg>

                    <svg class="swiper-button-next mobile-next" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                        <path d="M1.99984 0L0.589844 1.41L5.16984 6L0.589844 10.59L1.99984 12L7.99984 6L1.99984 0Z" fill="#51848C" />
                    </svg>
                    <svg class="swiper-button-prev desktop-prev" xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                        viewBox="0 0 80 80" fill="none">
                        <circle cx="40" cy="40" r="40" transform="matrix(-1 0 0 1 80 0)" fill="white" />
                        <path
                            d="M56 39C56.5523 39 57 39.4477 57 40C57 40.5523 56.5523 41 56 41L56 39ZM23.2929 40.7071C22.9024 40.3166 22.9024 39.6834 23.2929 39.2929L29.6569 32.9289C30.0474 32.5384 30.6805 32.5384 31.0711 32.9289C31.4616 33.3195 31.4616 33.9526 31.0711 34.3431L25.4142 40L31.0711 45.6569C31.4616 46.0474 31.4616 46.6805 31.0711 47.0711C30.6805 47.4616 30.0474 47.4616 29.6569 47.0711L23.2929 40.7071ZM56 41L24 41L24 39L56 39L56 41Z"
                            fill="#003B4B" />
                    </svg>
                    <svg class="swiper-button-prev mobile-prev" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                        <path d="M7.41 1.41L6 0L0 6L6 12L7.41 10.59L2.83 6L7.41 1.41Z" fill="#51848C" />
                    </svg>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php
$tituloJuntos = get_field('titulo_juntos_somos_melhores');
?>
<?php if ($tituloJuntos) : ?>
    <div class="juntos-somos">
        <div class="box-juntos-somos">
            <div class="box-imagens">
                <div class="swiper-juntos">
                    <div class="swiper-wrapper">
                        <?php
                        if (have_rows('imagens_juntos_somos_melhores')) :
                            while (have_rows('imagens_juntos_somos_melhores')) : the_row();
                        ?>
                                <div class="swiper-slide">
                                    <?php
                                    $image = get_sub_field('imagem_juntos_somos_melhores');
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
            <div class="box-conteudo">
                <h2 class="titulo-juntos"><?php echo get_field('titulo_juntos_somos_melhores'); ?></h2>
                <p class="descricao-juntos founders-grotesk"><?php echo get_field('descricao_juntos_somos_melhores'); ?></p>
                <?php
                $link = get_field('link_juntos_somos_melhores');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <p class=""><?php echo esc_html($link_title); ?></p>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php get_footer() ?>
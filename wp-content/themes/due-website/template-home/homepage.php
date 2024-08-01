<?php
//Template Name: Homepage
wp_enqueue_style('home', get_template_directory_uri() . '/assets/dist/css/home/home.css', ['main'], ASSETS_VERSION);
get_header();
?>
<section class="nossos-club-resorts">
    <div class="wrapper">
        <div class="box-titulo_link">

            <h2 class="terminal-test"><?php echo get_field('titulo_nossos_club_resorts'); ?></h2>
            <?php
            $link = get_field('link_empreendimentos');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="link-empreendimentos terminal-test" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
        <div class="box-cards-empreendimentos-desktop">
            <div class="swiper swiper-empreendimento">
                <div class="swiper-wrapper">
                    <?php if (have_rows('cards_nossos_club_resorts')) : ?>
                        <?php while (have_rows('cards_nossos_club_resorts')) : the_row(); ?>
                            <div class="card-empreendimentos swiper-slide">
                                <?php
                                $link = get_sub_field('link_empreendimento');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a class="box-card" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <div class="box-midia">
                                            <?php
                                            $image = get_sub_field('imagem_nossos_club_resorts');
                                            if ($image) :
                                                $image_url = $image['url'];
                                                $image_alt = $image['alt'];
                                            ?>
                                                <img class="imagem-empreendimento" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                            <?php endif; ?>

                                            <video class="video-empreendimento" src="<?php echo get_sub_field('video_hover_empreendimento') ?>" muted loop playsinline></video>
                                        </div>

                                        <div class="box-label" style="background-color: <?php echo get_sub_field('background_label_card'); ?>;">
                                            <p class="terminal-test label-informativo"><?php echo get_sub_field('label_informativo_card'); ?></p>
                                        </div>

                                        <div class="box-textos-empreendimentos">
                                            <div class="container-text">

                                                <div class="box-titulos">
                                                    <p class="localizacao-empreendimento terminal-test"><?php echo get_sub_field('localizacao_emprendimento'); ?></p>
                                                    <h4 class="nome-empreendimento founders-grotesk"><?php echo get_sub_field('nome_empreendimento'); ?></h4>
                                                </div>
                                                <div class="box-svg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="43" height="26" viewBox="0 0 43 26" fill="none">
                                                        <path d="M-5.24537e-07 13L41.5 13M41.5 13L29.5 25M41.5 13L29.5 0.999999" stroke="white" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="box-informacoes">
                                                <?php
                                                if (have_rows('informacoes_empreendimento')) :
                                                    while (have_rows('informacoes_empreendimento')) : the_row(); ?>

                                                        <div class="informacoes">
                                                            <div class="box-svg">
                                                                <?php $svg_file = get_sub_field('svg_informacao_empreendimento');
                                                                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                                                    echo '<i class="element">';
                                                                    echo file_get_contents($svg_file['url']);
                                                                    echo '</i>';
                                                                } ?>
                                                            </div>
                                                            <p class="founders-grotesk"><?php echo get_sub_field('texto_informacao_empreendimento'); ?></p>
                                                        </div>
                                                <?php endwhile;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

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
        </div>
        <div class="box-cards-empreendimentos-mobile">
            <?php
            if (have_rows('cards_nossos_club_resorts')) :
                $count = 0; // Inicia a contagem
                while (have_rows('cards_nossos_club_resorts')) : the_row();
                    if ($count >= 3) break; // Limita a 3 itens
                    $count++; // Incrementa a contagem
            ?>
                    <div class="card-empreendimentos-mobile swiper-slide">
                        <?php
                        $link = get_sub_field('link_empreendimento');
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                            <a class="box-card" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                <div class="box-midia">
                                    <?php
                                    $image = get_sub_field('imagem_nossos_club_resorts');
                                    if ($image) :
                                        $image_url = $image['url'];
                                        $image_alt = $image['alt'];
                                    ?>
                                        <img class="imagem-empreendimento" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="box-label" style="background-color: <?php echo get_sub_field('background_label_card'); ?>;">
                                    <p class="terminal-test label-informativo"><?php echo get_sub_field('label_informativo_card'); ?></p>
                                </div>

                                <div class="box-textos-empreendimentos">
                                    <div class="container-text">
                                        <div class="box-titulos">
                                            <p class="localizacao-empreendimento terminal-test"><?php echo get_sub_field('localizacao_emprendimento'); ?></p>
                                            <h4 class="nome-empreendimento founders-grotesk"><?php echo get_sub_field('nome_empreendimento'); ?></h4>
                                        </div>
                                        <div class="box-svg">
                                        </div>
                                    </div>
                                    <div class="box-informacoes">
                                        <?php
                                        if (have_rows('informacoes_empreendimento')) :
                                            while (have_rows('informacoes_empreendimento')) : the_row(); ?>
                                                <div class="informacoes">
                                                    <div class="box-svg">
                                                        <?php $svg_file = get_sub_field('svg_informacao_empreendimento');
                                                        if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                                            echo '<i class="element">';
                                                            echo file_get_contents($svg_file['url']);
                                                            echo '</i>';
                                                        } ?>
                                                    </div>
                                                    <p class="founders-grotesk"><?php echo get_sub_field('texto_informacao_empreendimento'); ?></p>
                                                </div>
                                        <?php endwhile;
                                        endif; ?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
        <?php
        $link = get_field('link_empreendimentos');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
            <a class="link-empreendimentos-mobile button-icon terminal-test" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                <p class=""><?php echo esc_html($link_title); ?></p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="9" viewBox="0 0 20 9" fill="none">
                    <path d="M15.25 0.75L19 4.5M19 4.5L15.25 8.25M19 4.5H1" stroke="#002D38" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        <?php endif; ?>

    </div>
</section>

<section class="nosso-proposito">
    <svg class="shape-due" xmlns="http://www.w3.org/2000/svg" width="473" height="626" viewBox="0 0 473 626" fill="none">
        <path d="M322.858 0.5H472.415V6.76241V383.463V383.767C472.415 517.06 366.544 625.5 236.458 625.5C106.372 625.5 0.5 517.06 0.5 383.767V0.5H150.142V570.99V571.305L150.426 571.441L152.415 572.395L152.418 572.396C179.1 584.955 207.355 591.301 236.5 591.301C265.645 591.301 293.9 584.955 320.582 572.396L320.585 572.395L322.574 571.441L322.858 571.305V570.99V0.5ZM116.01 550.571L116.825 551.233V550.183V35.1992V34.6992H116.325H34.4446H33.9446V35.1992V383.767C33.9446 447.334 61.854 506.519 110.508 546.106L110.509 546.106L116.01 550.571ZM439.14 385.635V385.631V35.1992V34.6992H438.64H356.76H356.26V35.1992V550.183V551.233L357.075 550.571L362.576 546.106L362.577 546.106C410.679 506.953 438.589 448.508 439.14 385.635Z" stroke="#E9E3DD" />
    </svg>
    <div class="wrapper">
        <div class="box-proposito-left">
            <p class="subtitulo-proposito terminal-test"><?php echo get_field('nosso_proposito'); ?></p>
            <h2 class="titulo-proposito terminal-test"><?php echo get_field('titulo_proposito'); ?></h2>
            <p class="descricao-proposito founders-grotesk"><?php echo get_field('descricao_proposito'); ?></p>
            <?php
            $link = get_field('link_proposito');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
        <div class="box-proposito-right">
            <video class="video-proposito" autoplay="autoplay" src="<?php echo get_field('video_proposito') ?>" muted loop play></video>
            <?php
            $image = get_field('imagem_proposito');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img class="img-proposito" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="encante-se">
    <div class="container-encante-se">
        <div class="wrapper">

            <div class="box-img-encante-se">
                <?php
                $image = get_field('bg_encante-se');
                if ($image) :
                    $image_url = $image['url'];
                    $image_alt = $image['alt']; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
            </div>

            <div class="box-conteudo-left">
                <div class="box-svg fade-left" data-aos="fade-right">
                    <?php $svg_file = get_field('svg_rota_due');
                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                        echo '<i class="element">';
                        echo file_get_contents($svg_file['url']);
                        echo '</i>';
                    } ?>
                </div>
                <h2 class="titulo-encante-se terminal-test fade-left" data-aos="fade-right"><?php echo get_field('titulo_encante-se'); ?></h2>
                <p class="descricao-encante-se founders-grotesk fade-left" data-aos="fade-right"><?php echo get_field('descricao_encante-se'); ?></p>
                <?php
                $link = get_field('link_encante-se');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="link-encante-se button-v2 fade-left" data-aos="fade-right" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <p class=""><?php echo esc_html($link_title); ?></p>
                    </a>
                <?php endif; ?>
            </div>
            <div class="box-conteudo-right">
                <div class="svg-caribe">
                    <?php $svg_file = get_field('svg_caribe');
                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                        echo '<i class="element">';
                        echo file_get_contents($svg_file['url']);
                        echo '</i>';
                    } ?>
                </div>
                <?php
                if (have_rows('comentarios_encante-se')) :
                    while (have_rows('comentarios_encante-se')) : the_row(); ?>
                        <div class="lista-comentarios">
                            <div class="box-svg">
                                <?php $svg_file = get_sub_field('svg_comentarios_encante-se');
                                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                    echo '<i class="element">';
                                    echo file_get_contents($svg_file['url']);
                                    echo '</i>';
                                } ?>
                            </div>
                            <p class="titulo-comentarios founders-grotesk"><?php echo get_sub_field('texto_comentarios_encante-se'); ?></p>
                        </div>
                <?php endwhile;
                endif; ?>


            </div>
        </div>
    </div>

</section>

<?php get_template_part('template-invista/invista'); ?>

<?php /** 
<?php get_template_part('template-realizamos-sonhos/realizamos-sonhos'); ?>
<?php get_template_part('template-cards/cards'); ?>
 **/ ?>

<?php get_footer() ?>
<?php
//Template Name: Iniciativas
wp_enqueue_style('iniciativas', get_template_directory_uri() . '/assets/dist/css/iniciativas/iniciativas.css', ['main'], ASSETS_VERSION);
get_header();
?>

<section class="page-iniciativas">

    <section class="banner-iniciativas">
        <div class="container-banner">
            <div class="box-titulo">
                <div class="container-text">

                    <h1 class="titulo-banner-inciativas terminal-test"><?php echo get_field('titulo_banner_iniciativas'); ?></h1>
                    <p class="descricao-banner-inciativas founders-grotesk"><?php echo get_field('descricao_banner_iniciativas'); ?></p>
                </div>
                <div class="box-imagem-banner-iniciativas">
                    <?php
                    $image = get_field('imagem_banner_iniciativas_02');
                    if ($image) :
                        $image_url = $image['url'];
                        $image_alt = $image['alt']; ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="box-imagem">
                <?php
                $image = get_field('imagem_banner_iniciativas');
                if ($image) :
                    $image_url = $image['url'];
                    $image_alt = $image['alt']; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
            </div>
        </div>

    </section>

    <section class="associacao-superacao">


        <div class="box-conteudo-left">

            <div class="box-svg">
                <?php $svg_file = get_field('svg_associacao_superacao');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo '<i class="element">';
                    echo file_get_contents($svg_file['url']);
                    echo '</i>';
                } ?>
            </div>
            <h2 class="titulo-associacao-superacao terminal-test"><?php echo get_field('titulo_associacao_superacao'); ?></h2>
            <div class="descricao-associacao-superacao"><?php echo get_field('descricao_associacao_superacao'); ?></div>
            <?php
            $link = get_field('link_associacao_superacao');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button link-associacao-superacao-desktop" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>



        </div>
        <div class="box-conteudo-right">
            <?php
            $image = get_field('imagem_associacao_superacao');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img class="image-associacao-superacao" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
            <?php
            $link = get_field('link_associacao_superacao');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button link-associacao-superacao-mobile" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>

        </div>
    </section>

    <section class="escola-formacao-due">


        <div class="box-conteudo-left">

            <div class="box-svg box-svg-escola">
                <?php $svg_file = get_field('svg_escola_de_formacao_due');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo '<i class="element">';
                    echo file_get_contents($svg_file['url']);
                    echo '</i>';
                } ?>
            </div>
            <h2 class="titulo-escola-formacao-due terminal-test"><?php echo get_field('titulo_escola_de_formacao_due'); ?></h2>
            <div class="descricao-escola-formacao-due"><?php echo get_field('descricao_escola_de_formacao_due'); ?></div>
        </div>
        <div class="box-conteudo-right box-conteudo-right-escola">
            <?php
            $image = get_field('imagem_escola_de_formacao_due');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div>
    </section>

    <section class="incentivo-empreendedorismo">


        <div class="box-conteudo-left">

            <div class="box-svg box-svg-incentivo-empreendedorismo">
                <?php $svg_file = get_field('svg_incentivo_ao_empreendedorismo');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo '<i class="element">';
                    echo file_get_contents($svg_file['url']);
                    echo '</i>';
                } ?>
            </div>
            <h2 class="titulo-incentivo-empreendedorismo terminal-test"><?php echo get_field('titulo_incentivo_ao_empreendedorismo'); ?></h2>
            <div class="descricao-incentivo-empreendedorismo"><?php echo get_field('descricao_incentivo_ao_empreendedorismo'); ?></div>
        </div>
        <div class="box-conteudo-right box-conteudo-right-incentivo-empreendedorismo">
            <?php
            $image = get_field('imagem_incentivo_ao_empreendedorismo');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div>
    </section>

    <section class="proposito">


        <div class="box-conteudo-left">

            <div class="box-svg box-svg-proposito">
                <?php $svg_file = get_field('svg_proposito');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo '<i class="element">';
                    echo file_get_contents($svg_file['url']);
                    echo '</i>';
                } ?>
            </div>
            <h2 class="titulo-proposito terminal-test"><?php echo get_field('titulo_proposito'); ?></h2>
            <div class="descricao-proposito"><?php echo get_field('descricao_proposito'); ?></div>
            <?php
            $link = get_field('link_proposito');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button link-proposito link-proposito-desktop" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
        <div class="box-conteudo-right box-conteudo-right-proposito">
            <?php
            $image = get_field('imagem_proposito');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
            <?php
            $link = get_field('link_proposito');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button link-proposito-mobile" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>

        </div>
    </section>

    <div class="selos-certificados">
        <div class="wrapper">

            <h2 class="terminal-test titulo-selos"><?php echo get_field('titulo_selos_e_certificacoes'); ?></h2>

            <div class="box-repetidor-selos">
                <?php
                if (have_rows('repetidor_selos_certificacoes')) :
                    while (have_rows('repetidor_selos_certificacoes')) : the_row(); ?>

                        <div class="lista-selos">
                            <div class="box-titulo-svg">
                                <div class="box-svg">
                                    <?php $svg_file = get_sub_field('svg_selos_e_certificacoes');
                                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                        echo '<i class="element">';
                                        echo file_get_contents($svg_file['url']);
                                        echo '</i>';
                                    } ?>
                                </div>
                                <h3 class="titulo-card terminal-test"><?php echo get_sub_field('titulo_card_selos_certificacoes'); ?></h3>
                            </div>
                            <div class="hover-descricao">
                                <p class="founders-grotesk"><?php echo get_sub_field('descricoes_selos_e_certificacoes'); ?></p>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>
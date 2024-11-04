<?php
//Template Name: Iniciativas
wp_enqueue_style('iniciativas', get_template_directory_uri() . '/assets/dist/css/iniciativas/iniciativas.css', ['main'], ASSETS_VERSION);
get_header();
?>

<section class="page-iniciativas">

    <section class="banner-iniciativas">
        <svg class="logo-shape-due" xmlns="http://www.w3.org/2000/svg" width="498" height="661" viewBox="0 0 498 661" fill="none">
            <path d="M339.896 0.5H497.411V7.1405V404.903V405.224C497.411 545.985 385.931 660.5 248.955 660.5C111.98 660.5 0.5 545.985 0.5 405.224V0.5H158.104V602.915V603.229L158.388 603.365L160.482 604.372L160.485 604.374C188.574 617.633 218.318 624.333 249 624.333C279.682 624.333 309.426 617.633 337.515 604.374L337.518 604.372L339.612 603.365L339.896 603.229V602.915V0.5ZM122.157 581.332L122.973 581.996V580.944V37.1672V36.6672H122.473H36.2652H35.7652V37.1672V405.224C35.7652 472.336 65.1457 534.821 116.365 576.617L116.366 576.617L122.157 581.332ZM462.324 407.196V407.192V37.1672V36.6672H461.824H375.616H375.116V37.1672V580.944V581.996L375.932 581.332L381.724 576.617L381.724 576.617C432.363 535.28 461.743 473.575 462.324 407.196Z" stroke="#FAF2EC" />
        </svg>
        <div class="container-banner">
            <div class="box-titulo">
                <div class="container-text">

                    <h1 class="titulo-banner-inciativas terminal-test"><?php echo get_field('titulo_banner_iniciativas'); ?></h1>
                    <p class="descricao-banner-inciativas founders-grotesk"><?php echo get_field('descricao_banner_iniciativas'); ?></p>
                </div>

            </div>
            <div class="container-image">

                <div class="box-imagem">
                    <?php
                    $image = get_field('imagem_banner_iniciativas');
                    if ($image) :
                        $image_url = $image['url'];
                        $image_alt = $image['alt']; ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                    <?php endif; ?>
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
        </div>

    </section>
    <section class="vila-alafia" id="vila-alafia">


        <div class="box-conteudo-left">

            <div class="box-svg box-svg-vila-alafia">
                <?php $svg_file = get_field('svg_vila_alafia');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo '<i class="element">';
                    echo file_get_contents($svg_file['url']);
                    echo '</i>';
                } ?>
            </div>
            <h2 class="titulo-vila-alafia terminal-test"><?php echo get_field('titulo_vila_alafia'); ?></h2>
            <div class="descricao-vila-alafia"><?php echo get_field('descricao_vila_alafia'); ?></div>
            <?php
            $link = get_field('link_vila_alafia');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_associacao = strtolower(str_replace(' ', '-', $link_title));
            ?>
                <a class="button link-vila-alafia-desktop gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>



        </div>
        <div class="box-conteudo-right box-conteudo-right-vila-alafia">
            <?php
            $image = get_field('imagem_vila_alafia');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img class="image-vila-alafia" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
            <?php
            $link = get_field('link_vila_alafia');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_associacao = strtolower(str_replace(' ', '-', $link_title));

            ?>
                <a class="button link-vila-alafia-mobile gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>

        </div>
    </section>

    <section class="instituto-padre-arlindo" id="instituto-padre-arlindo">


        <div class="box-conteudo-left">

            <div class="box-svg-instituto-padre-arlindo">
                <?php $svg_file = get_field('svg_instituto_padre_arlindo');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo '<i class="element">';
                    echo file_get_contents($svg_file['url']);
                    echo '</i>';
                } ?>
            </div>
            <h2 class="titulo-instituto-padre-arlindo terminal-test"><?php echo get_field('titulo_instituto_padre_arlindo'); ?></h2>
            <div class="descricao-instituto-padre-arlindo"><?php echo get_field('descricao_instituto_padre_arlindo'); ?></div>
            <?php
            $link = get_field('link_instituto_padre_arlindo');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_escola = strtolower(str_replace(' ', '-', $link_title));

            ?>
                <a class="button link-instituto-padre-arlindo-desktop gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
        <div class="box-conteudo-right box-conteudo-right-instituto-padre-arlindo">
            <?php
            $image = get_field('imagem_instituto_padre_arlindo');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
            <?php
            $link = get_field('link_instituto_padre_arlindo');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_escola = strtolower(str_replace(' ', '-', $link_title));

            ?>
                <a class="button link-instituto-padre-arlindo-mobile gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
    </section>



    <section class="associacao-superacao" id="associacao-superacao">


        <div class="box-conteudo-left">

            <div class="box-svg-associacao-superacao">
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
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_associacao = strtolower(str_replace(' ', '-', $link_title));
            ?>
                <a class="button link-associacao-superacao-desktop gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
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
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_associacao = strtolower(str_replace(' ', '-', $link_title));

            ?>
                <a class="button link-associacao-superacao-mobile gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>

        </div>
    </section>

    <section class="escola-formacao-due" id="escola-formacao-due">


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
            <?php
            $link = get_field('link_escola_de_formacao_due');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_escola = strtolower(str_replace(' ', '-', $link_title));

            ?>
                <a class="button link-escola-desktop gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
        <div class="box-conteudo-right box-conteudo-right-escola">
            <?php
            $image = get_field('imagem_escola_de_formacao_due');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
            <?php
            $link = get_field('link_escola_de_formacao_due');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_escola = strtolower(str_replace(' ', '-', $link_title));

            ?>
                <a class="button link-escola-mobile gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
    </section>

    <section class="incentivo-empreendedorismo" id="incentivo-empreendedorismo">


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
            <?php
            $link = get_field('link_incentivo_ao_empreendedorismo');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_empreendedorismo = strtolower(str_replace(' ', '-', $link_title));

            ?>
                <a class="button link-empreendedorismo-desktop gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
        <div class="box-conteudo-right box-conteudo-right-incentivo-empreendedorismo">
            <?php
            $image = get_field('imagem_incentivo_ao_empreendedorismo');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
            <?php
            $link = get_field('link_incentivo_ao_empreendedorismo');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_empreendedorismo = strtolower(str_replace(' ', '-', $link_title));
            ?>
                <a class="button link-empreendedorismo-mobile gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
    </section>

    <section class="proposito" id="proposito">


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
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_proposito = strtolower(str_replace(' ', '-', $link_title));
            ?>
                <a class="button link-proposito link-proposito-desktop gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
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
                $link_target = $link['target'] ? $link['target'] : '_self';
                $gtm_link_proposito = strtolower(str_replace(' ', '-', $link_title));
            ?>
                <a class="button link-proposito-mobile gtm-<?php echo esc_attr($gtm_link_associacao); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
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

                        <div class="lista-selos-desktop">
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
                            <div class="lista-selos-mobile">
                                <div class="box-titulo-accordion">
                                    <h3 class="titulo-card terminal-test"><?php echo get_sub_field('titulo_card_selos_certificacoes'); ?></h3>
                                    <svg class="svg-faq" width="19" height="10" viewBox="0 0 19 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="Arrow - Up 2">
                                            <path id="Stroke 1" d="M1.91927 1.2085L9.5026 8.79183L17.0859 1.2085" stroke="#002B36" stroke-width="1.95" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="hover-descricao-mobile">
                                    <p class="founders-grotesk"><?php echo get_sub_field('descricoes_selos_e_certificacoes'); ?></p>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>


        </div>
    </div>
    <div class="call-form" id="call-form"></div>

</section>
<?php get_footer() ?>
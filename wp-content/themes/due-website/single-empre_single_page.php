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
                                    <?php echo get_sub_field('texto_da_caracteristica'); ?></p>
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
        <?php
        if (have_rows('categoria_aba')):
            while (have_rows('categoria_aba')):
                the_row();

                $nome_categoria = get_sub_field('nome_da_categoria_aba');
                $categoria_slug = sanitize_title($nome_categoria);
        
                echo "<h2 data-value='$categoria_slug' class='item-rota'>$nome_categoria</h2>";
        
                echo '<div id="swiper-' . esc_attr($categoria_slug) . '" class="swiper swiper-rota-destino" style="display:none;">';
                echo '<div class="swiper-wrapper">';

                if (have_rows('espaco')):
                    while (have_rows('espaco')):
                        the_row();

                        $nome_do_espaco = get_sub_field('nome_do_espaco');
                        $imagens_do_espaco = get_sub_field('imagens_do_espaco');

                        echo '<div class="swiper-slide">';
                        echo '<div class="card-rota">';
                        if ($imagens_do_espaco) {
                            echo '<img src="' . esc_url($imagens_do_espaco['url']) . '" alt="' . esc_attr($nome_do_espaco) . '">';
                        }
                        echo '<div class="card-rota-content">';
                        echo '<h2 class="card-rota-title">' . esc_html($nome_do_espaco) . '</h2>';
                        echo '</div></div></div>';
                    endwhile;
                else:
                    echo '<p>Nenhuma rota encontrada para ' . esc_html($nome_categoria) . '.</p>';
                endif;

                echo '</div>';
                echo '<div class="box-buttons-swiper">
                  <svg class="swiper-btn-destino-prev"></svg>
                  <svg class="swiper-btn-destino-next"></svg>';
                echo '</div></div>';

            endwhile;
        else:
            echo '<p>Nenhuma categoria encontrada.</p>';
        endif;
        ?>
    </div>

    <div class="explore-empreendimento">
        <div class="wrapper">
            <h3 class="titulo-explore terminal-test"><?php echo get_field('titulo_explore_empreendimentos'); ?></h3>
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

    <div class="diferenciais" id="diferenciais">
        <div class="wrapper">

            <h3 class="titulo-diferenciais terminal-test"><?php echo get_field('titulo_diferencias'); ?></h3>
            <div class="box-cards-diferenciais">
                <?php
                if (have_rows('diferenciais')):
                    while (have_rows('diferenciais')):
                        the_row(); ?>
                        <div class="row-cards">
                            <div class="box-svg">
                                <?php $svg_file = get_sub_field('icone');
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
                                            <?php echo get_sub_field('texto_do_diferencial'); ?></p>
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
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="informacoes-obra">
        <div class="wrapper">
            <div class="box-infos-obra box-titulos">
                <h3 class="titulo-infos-obra terminal-test">
                    <?php echo get_field('titulo_informacoes_tecnicas_da_obra'); ?></h3>
                <p class="descricao-infos-obra founders-grotesk">
                    <?php echo get_field('descricao_informacoes_tecnicas_da_obra'); ?></p>
            </div>
            <div class="box-infos-obra box-autores">
                <?php
                if (have_rows('autores_informacoes_tecnicas_da_obra')):
                    while (have_rows('autores_informacoes_tecnicas_da_obra')):
                        the_row(); ?>
                        <div class="row-autores">
                            <h4 class="titulo-autores founders-grotesk">
                                <?php echo get_sub_field('titulo_autores_informacoes_tecnicas_da_obra'); ?></h4>
                            <?php
                            if (have_rows('autor_informacoes_tecnicas_da_obra')):
                                while (have_rows('autor_informacoes_tecnicas_da_obra')):
                                    the_row(); ?>
                                    <p class="text-autor founders-grotesk">
                                        <?php echo get_sub_field('texto_autor_informacoes_tecnicas_da_obra'); ?></p>
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
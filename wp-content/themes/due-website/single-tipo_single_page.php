<?php
wp_enqueue_style('single-tipologia', get_template_directory_uri() . '/assets/dist/css/singles/single-tipologia.css', ['main'], ASSETS_VERSION);
get_header();

?>
<section class="single-tipologia">

    <div class="banner-hero-single-tipologia">

        <div class="box-container-tipologias-hero container-texto">
            <div class="localizacao-tipologia">
                <p class="titulo-tipologia terminal-test"><?php echo get_field('nome_do_empreendimento_que_pertence'); ?></p>
                <span>|</span>
                <p class="localizacao terminal-test"><?php echo get_field('localizacao_tipologia_single'); ?></p>
            </div>
            <div class="box-nome-tipologia">
                <p class="label-tipologia">
                    <?php echo __('tipologia', 'due-website') ?>
                </p>
                <?php
                $empreendimento_id = get_field('tipologia');

                if ($empreendimento_id) {
                    $titulo_empreendimento = get_the_title($empreendimento_id);
                    echo '<h1 class="terminal-test titulo-hero">' . $titulo_empreendimento . '</h1>';
                }
                ?>
            </div>
            <div class="box-descricao">
                <p class="descricao-tipologia founders-grotesk"><?php echo get_field('descricao_tipologia_hero'); ?></p>
            </div>
            <div class="box-repetidor-diferenciais">
                <?php
                if (have_rows('diferenciais_e_caracteristicas_select')) :
                    while (have_rows('diferenciais_e_caracteristicas_select')) : the_row(); ?>
                        <div class="row-diferencias">
                            <div class="box-svg">
                                <?php $svg_file = get_sub_field('svg_caracteristicas');
                                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                    echo '<i class="element">';
                                    echo file_get_contents($svg_file['url']);
                                    echo '</i>';
                                } ?>
                            </div>
                            <p class="titulo-diferencias founders-grotesk"><?php echo get_sub_field('titulo_caracteristicas'); ?></p>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
        <div class="box-container-tipologias-hero container-imagem">
            <?php
            $image = get_field('foto_da_tipologia');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt']; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part('template-realizamos-sonhos/realizamos-sonhos'); ?>
    <?php get_template_part('template-invista/invista'); ?>

    <div class="entre-contato">
        <div class="wrapper">

            <h3 class="titulo-entre-contato"><?php echo get_field('titulo_entre_em_contato'); ?></h3>
            <p class="subtitulo-entre-contato"><?php echo get_field('descricao_entre_em_contato'); ?></p>
            <div class="box-entre-contato">

                <?php
                $link = get_field('entre_em_contato');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>

                    <a class="button-fixed-whatsapp" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <p class=""><?php echo esc_html($link_title); ?></p>
                    </a>
                <?php endif; ?>

                <?php
                $link = get_field('atendimento_ao_cliente');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="button-fixed-atendimento" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
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

    <div class="carrossel-tipologia">
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
                <p class="titulo-localizacao-carrossel"><?php echo get_field('texto_localizacao_carrossel_tipologia'); ?></p>
            </div>
            <h3 class="titulo-carrossel"><?php echo get_field('titulo_carrossel_tipologia'); ?></h3>
        </div>
    </div>
    
</section>
<?php
get_footer();
?>
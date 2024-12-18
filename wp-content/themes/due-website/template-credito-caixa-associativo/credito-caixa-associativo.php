<?php
//Template Name: Crédito caixa associativo
wp_enqueue_style('home', get_template_directory_uri() . '/assets/dist/css/credito-caixa-associativo/credito-caixa-associativo.css', ['main'], ASSETS_VERSION);
get_header();
?>

<section class="banner">
    <div class="banner-text-buttom">
        <div class="title"></div>
        <div class="subtitle"></div>
        <a href="" class="banner-button"></a>
    </div>
    <div class="banner-couple">
    <?php
        $image = get_field('banner_couple');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt']; ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>

    </div>
</section>

<section class="descubra-como-funciona">
    <div class="descubra-title-subtitle">
        <h3 class="title"><?php echo esc_html(get_field('descubra_title')); ?></h3>
        <p class="subtitle"><?php echo esc_html(get_field('descubra_subtitle')); ?></p>
    </div>
    <div class="descubra-animation-notas">
        <div class="descubra-animation"></div>
        <div class="descubra-notas-rodape">
            <?php
            if (have_rows('descubra_notas_rodape')):
                while (have_rows('descubra_notas_rodape')) : the_row();
                    $descubra_nota = get_sub_field('descubra_nota'); ?>
                    <p class="descubra-nota-rodape"><?php echo esc_html($descubra_nota) ?> </p>
            <?php
                endwhile;
            endif; ?>
        </div>
    </div>
</section>

<section class="caixa-vantagens">
    <div class="caixa-textos">
        <div class="logo-caixa">
            <svg xmlns="http://www.w3.org/2000/svg" width="165" height="38" viewBox="0 0 165 38" fill="none">
                <g clip-path="url(#clip0_5033_18367)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M50.2883 12.36L46.0283 22.97H51.9183L50.3083 12.32L50.2883 12.37V12.36ZM27.7383 36.71L45.1983 0.76001H58.3983L65.7683 36.72H54.1783L53.3283 31.93H42.0783L39.4883 36.72H27.7383V36.71ZM71.2583 36.71L76.3183 0.76001H87.9983L82.9383 36.72H71.2583V36.71ZM148.948 12.31L144.668 22.96H150.558L148.948 12.31ZM126.368 36.71L143.838 0.76001H157.038L164.408 36.72H152.818L151.968 31.93H140.718L138.128 36.72H126.378L126.368 36.71Z" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M100.551 19.8999H115.191L125.221 36.5099H110.581L100.551 19.8999Z" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M102.07 17.3501H117.2L130.34 0.810059H115.21L102.07 17.3501Z" fill="#F5822B" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M86.9414 36.6101H102.071L115.211 19.8701H100.081L86.9414 36.6101Z" fill="#F5822B" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M92.3984 0.609863H106.518L116.188 17.3499H102.068L92.3984 0.609863Z" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0789 2.03984L26.9589 12.6098C22.6489 6.66984 12.6789 10.7698 11.8889 18.1698C10.8889 27.5598 20.4989 29.7498 25.7189 24.2198L24.5889 34.8198C23.0289 35.5898 21.5089 36.1798 19.9989 36.5798C18.4989 36.9798 16.9989 37.1998 15.5089 37.2298C13.6389 37.2698 11.9389 37.0698 10.4089 36.6398C8.87886 36.2198 7.49886 35.5498 6.27886 34.6398C3.91886 32.9098 2.20886 30.7198 1.15886 28.0498C0.118857 25.3898 -0.221143 22.3598 0.138857 18.9898C0.428857 16.2798 1.10886 13.7998 2.19886 11.5598C3.27886 9.31984 4.77886 7.27984 6.67886 5.42984C8.47886 3.66984 10.4389 2.33984 12.5589 1.42984C14.6789 0.529838 16.9889 0.059838 19.4789 -0.000162017C20.9689 -0.030162 22.4289 0.119838 23.8489 0.459838C25.2789 0.799838 26.6789 1.32984 28.0789 2.03984Z" fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_5033_18367">
                        <rect width="164.41" height="37.24" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="2" height="80" viewBox="0 0 2 80" fill="none">
            <path d="M1 0V80" stroke="white" stroke-opacity="0.3" />
        </svg>
        <div class="textos">
            <?php the_field('vantagem_texto'); ?>
        </div>
    </div>
    <div class="vantagens">
        <h3 class="vantagens-main-title"><?php echo esc_html(get_field('main_title')); ?></h3>
        <div class="vantagens-list">
            <?php
            if (have_rows('vantagem_item')) :
                while (have_rows('vantagem_item')) : the_row();
                    $vantagem_item_title = get_sub_field('vantagem_item_title');
                    $vantagem_item_description = get_sub_field('vantagem_item_description');
                    $image = get_sub_field('vantagem_item_ico');
                    $image_url = $image['url'];
                    $image_alt = $image['alt'];
            ?>
                    <div class="vantagem-item">
                        <div class="vantagen-ico">
                            <?php
                            ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                        </div>
                        <div class="vantagem-texts">
                            <h3 class="vantagem-title"><?php echo esc_html($vantagem_item_title); ?></h3>
                            <p class="vantagem-paragraph"><?php echo esc_html($vantagem_item_description); ?></p>
                        </div>
                    </div>

            <?php endwhile;
            endif; ?>
        </div>
    </div>
    <div class="recurso-patrimonio">
        <div class="recurso-patrimonio-text">
            <?php the_field('recurso_patrimonio_text'); ?>
        </div>
        <?php
        $link = get_field('recurso_patrimonio_link_bota');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
            <a class="recurso-patrimonio-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                <p class="label-btn"><?php echo esc_html($link_title); ?></p>
            </a>
        <?php endif; ?>
    </div>
    <div class="box-img-vantagens">
        <?php
        $image = get_field('img_vantagens');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt']; ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>


    </div>
</section>

<section class="duvidas-frequentes">
    <h3 class="duvidas-anchor">
        <?php echo get_field('duvidas_anchor'); ?>
    </h3>
    <div class="main-duvidas-title-list">
        <div class="duvidas-main-title-subtitle">
            <h3 class="duvidas-title"><?php the_field('duvidas_title'); ?></h3>
            <p class="duvidas-subtitle"><?php the_field('duvidas_subtitle'); ?></p>

        </div>
        <div class="duvidas-main-list">
            <h3 class="duvidas-title-list"><?php echo get_field('duvidas_title_list'); ?></h3>
            <?php
            if (have_rows('duvidas_item')) :
                while (have_rows('duvidas_item')) : the_row();
                    $duvida_item_title = get_sub_field('duvida_item_title');
            ?>
                    <div class="duvidas-item">
                        <h4 class="duvida-item-title">
                            <?php echo esc_html($duvida_item_title); ?>
                        </h4>
                        <ul class="duvida-response-list">
                            <?php
                            if (have_rows('duvida_response_list')) :
                                while (have_rows('duvida_response_list')) : the_row();
                                    $duvida_response_item = get_sub_field('duvida_response_item');
                            ?>
                                    <li class="duvida-response-item">
                                        <?php echo esc_html($duvida_response_item); ?>
                                    </li>
                            <?php endwhile;
                            endif; ?>
                        </ul>
                    </div>
            <?php endwhile;
            endif; ?>

        </div>
    </div>
</section>

<section class="section-casa-pix">
    <h3 class="casa-pix-title">
        <?php echo get_field('casa_pix_title'); ?>
    </h3>
    <p class="casa-pix-subtitle">
        <?php echo get_field('casa_pix_subtitle'); ?>
    </p>

    <?php
    $link = get_field('casa_pix_btn');
    if ($link) :
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
        <a class="casa-pix-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
            <h3 class="casa-pix-btn-label"><?php echo esc_html($link_title); ?></h3>
        </a>
    <?php endif; ?>

    <p class="casa-pix-obs"><?php echo get_field('casa_pix_obs'); ?></p>
</section>





<?php get_footer() ?>
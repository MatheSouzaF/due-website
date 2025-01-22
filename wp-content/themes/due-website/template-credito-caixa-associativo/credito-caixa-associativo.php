<?php
//Template Name: Crédito caixa associativo
wp_enqueue_style('home', get_template_directory_uri() . '/assets/dist/css/credito-caixa-associativo/credito-caixa-associativo.css', ['main'], ASSETS_VERSION);
get_header();
?>

<section class="banner">
    <div class="banner-text-buttom">
        <div class="banner-text">
            <h1 class="title"><?php echo get_field('banner_title'); ?></h1>
            <p class="subtitle founders-grotesk"><?php echo get_field('banner_subtitle'); ?></p>
        </div>
        <?php
        $link = get_field('banner_button');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
            <a class="button-fixed-whatsapp ancora-descubra" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                <p class="terminal-test"><?php echo esc_html($link_title); ?></p>
            </a>
        <?php endif; ?>
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
    <div class="banner-couple-mobile">
        <?php
        $image = get_field('banner_couple_mobile');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt']; ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>

    </div>
</section>

<section class="descubra-como-funciona">
    <!-- <div class="ancora" id="descubra-como-funciona"></div> -->
    <div class="descubra-title-subtitle" id="descubra-como-funciona">
        <h3 class="title"><?php echo esc_html(get_field('descubra_title')); ?></h3>
        <p class="subtitle founders-grotesk"><?php echo esc_html(get_field('descubra_subtitle')); ?></p>
    </div>

    <div class="descubra-animation-notas">
        <div class="descubra-animation">
            <div id="descubra-animation" class="descubra-animation">
                <div id="descubra-lottie-animation" class="descubra-lottie-animation"></div>
            </div>
        </div>
        <div class="descubra-animation-mobile">

        </div>
        <div class="descubra-notas-rodape">
            <?php
            if (have_rows('descubra_notas_rodape')):
                while (have_rows('descubra_notas_rodape')) : the_row();
                    $descubra_nota = get_sub_field('descubra_nota'); ?>
                    <p class="descubra-nota-rodape founders-grotesk"><?php echo esc_html($descubra_nota) ?> </p>
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
        <div class="vantagens-list wrapper">
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
                            <p class="vantagem-paragraph founders-grotesk"><?php echo esc_html($vantagem_item_description); ?></p>
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
            <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M13.2852 2.68254C12.5976 1.98799 11.7785 1.4373 10.8759 1.06258C9.97323 0.68787 9.00499 0.49664 8.02766 0.500045C3.93266 0.500045 0.595156 3.83754 0.595156 7.93254C0.595156 9.24504 0.940156 10.52 1.58516 11.645L0.535156 15.5L4.47266 14.465C5.56016 15.0575 6.78266 15.3725 8.02766 15.3725C12.1227 15.3725 15.4602 12.035 15.4602 7.94004C15.4602 5.95254 14.6877 4.08504 13.2852 2.68254ZM8.02766 14.1125C6.91766 14.1125 5.83016 13.8125 4.87766 13.25L4.65266 13.115L2.31266 13.73L2.93516 11.45L2.78516 11.2175C2.16847 10.2328 1.84101 9.09448 1.84016 7.93254C1.84016 4.52754 4.61516 1.75254 8.02016 1.75254C9.67016 1.75254 11.2227 2.39754 12.3852 3.56754C12.9608 4.14052 13.4169 4.82204 13.7272 5.57261C14.0375 6.32319 14.1957 7.12788 14.1927 7.94004C14.2077 11.345 11.4327 14.1125 8.02766 14.1125ZM11.4177 9.49254C11.2302 9.40254 10.3152 8.95254 10.1502 8.88504C9.97766 8.82504 9.85766 8.79504 9.73016 8.97504C9.60266 9.16254 9.25016 9.58254 9.14516 9.70255C9.04016 9.83004 8.92766 9.84504 8.74016 9.74754C8.55266 9.65754 7.95266 9.45504 7.24766 8.82504C6.69266 8.33004 6.32516 7.72254 6.21266 7.53504C6.10766 7.34754 6.19766 7.25004 6.29516 7.15254C6.37766 7.07004 6.48266 6.93504 6.57266 6.83004C6.66266 6.72504 6.70016 6.64254 6.76016 6.52254C6.82016 6.39504 6.79016 6.29004 6.74516 6.20005C6.70016 6.11004 6.32516 5.19504 6.17516 4.82004C6.02516 4.46004 5.86766 4.50504 5.75516 4.49754H5.39516C5.26766 4.49754 5.07266 4.54254 4.90016 4.73004C4.73516 4.91754 4.25516 5.36754 4.25516 6.28254C4.25516 7.19754 4.92266 8.08254 5.01266 8.20254C5.10266 8.33004 6.32516 10.205 8.18516 11.0075C8.62766 11.2025 8.97266 11.315 9.24266 11.3975C9.68516 11.54 10.0902 11.5175 10.4127 11.4725C10.7727 11.42 11.5152 11.0225 11.6652 10.5875C11.8227 10.1525 11.8227 9.78504 11.7702 9.70255C11.7177 9.62004 11.6052 9.58254 11.4177 9.49254Z" fill="#003B4B" />
                </svg>
                <p class="label-btn terminal-test"><?php echo esc_html($link_title); ?></p>
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
    <div class="box-img-vantagens-mobile">
        <?php
        $image = get_field('img_vantagens_mobile');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt']; ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>


    </div>
</section>

<section class="duvidas-frequentes">
    <div class="main-duvidas-title-list">
        <div class="duvidas-main-title-subtitle">
            <h3 class="duvidas-title"><?php the_field('duvidas_title'); ?></h3>
            <p class="duvidas-subtitle founders-grotesk"><?php the_field('duvidas_subtitle'); ?></p>

        </div>
        <div class="duvidas-main-list">

            <h3 class="duvidas-title-list"><?php echo get_field('duvidas_title_list'); ?></h3>

            <?php
            if (have_rows('duvidas_item')) :
                while (have_rows('duvidas_item')) : the_row();
                    $duvida_item_title = get_sub_field('duvida_item_title');
            ?>
                    <div class="duvidas-item">
                        <div class="duvidas-title-arrow" data-toggle="accordion">
                            <h4 class="duvida-item-title">
                                <?php echo esc_html($duvida_item_title); ?>
                            </h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="7" viewBox="0 0 9 5" fill="none">
                                <path d="M0.709635 4.39587L4.5013 0.604208L8.29297 4.39587" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
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
    <div class="casa-pix-title-subtitle">
        <h3 class="casa-pix-title">
            <?php echo get_field('casa_pix_title'); ?>
        </h3>
        <p class="casa-pix-subtitle">
            <?php echo get_field('casa_pix_subtitle'); ?>
        </p>
    </div>
    <?php
    $link = get_field('casa_pix_btn');
    if ($link) :
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
        <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M14.2852 3.68254C13.5976 2.98799 12.7785 2.4373 11.8759 2.06258C10.9732 1.68787 10.005 1.49664 9.02766 1.50004C4.93266 1.50004 1.59516 4.83754 1.59516 8.93254C1.59516 10.245 1.94016 11.52 2.58516 12.645L1.53516 16.5L5.47266 15.465C6.56016 16.0575 7.78266 16.3725 9.02766 16.3725C13.1227 16.3725 16.4602 13.035 16.4602 8.94004C16.4602 6.95254 15.6877 5.08504 14.2852 3.68254ZM9.02766 15.1125C7.91766 15.1125 6.83016 14.8125 5.87766 14.25L5.65266 14.115L3.31266 14.73L3.93516 12.45L3.78516 12.2175C3.16847 11.2328 2.84101 10.0945 2.84016 8.93254C2.84016 5.52754 5.61516 2.75254 9.02016 2.75254C10.6702 2.75254 12.2227 3.39754 13.3852 4.56754C13.9608 5.14052 14.4169 5.82204 14.7272 6.57261C15.0375 7.32319 15.1957 8.12788 15.1927 8.94004C15.2077 12.345 12.4327 15.1125 9.02766 15.1125ZM12.4177 10.4925C12.2302 10.4025 11.3152 9.95254 11.1502 9.88504C10.9777 9.82504 10.8577 9.79504 10.7302 9.97504C10.6027 10.1625 10.2502 10.5825 10.1452 10.7025C10.0402 10.83 9.92766 10.845 9.74016 10.7475C9.55266 10.6575 8.95266 10.455 8.24766 9.82504C7.69266 9.33004 7.32516 8.72254 7.21266 8.53504C7.10766 8.34754 7.19766 8.25004 7.29516 8.15254C7.37766 8.07004 7.48266 7.93504 7.57266 7.83004C7.66266 7.72504 7.70016 7.64254 7.76016 7.52254C7.82016 7.39504 7.79016 7.29004 7.74516 7.20005C7.70016 7.11004 7.32516 6.19504 7.17516 5.82004C7.02516 5.46004 6.86766 5.50504 6.75516 5.49754H6.39516C6.26766 5.49754 6.07266 5.54254 5.90016 5.73004C5.73516 5.91754 5.25516 6.36754 5.25516 7.28254C5.25516 8.19754 5.92266 9.08254 6.01266 9.20254C6.10266 9.33004 7.32516 11.205 9.18516 12.0075C9.62766 12.2025 9.97266 12.315 10.2427 12.3975C10.6852 12.54 11.0902 12.5175 11.4127 12.4725C11.7727 12.42 12.5152 12.0225 12.6652 11.5875C12.8227 11.1525 12.8227 10.785 12.7702 10.7025C12.7177 10.62 12.6052 10.5825 12.4177 10.4925Z" fill="white" />
            </svg>
            <h3 class="casa-pix-btn-label">

                <?php echo esc_html($link_title); ?>
            </h3>
        </a>
    <?php endif; ?>

    <p class="casa-pix-obs founders-grotesk"><?php echo get_field('casa_pix_obs'); ?></p>
</section>

<?php get_footer() ?>
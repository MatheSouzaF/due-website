<?php
//Template Name: Select
wp_enqueue_style('Select', get_template_directory_uri() . '/assets/dist/css/select/select.css', ['main'], ASSETS_VERSION);
get_header('select');

?>

<div class="banner" id="banner-select">
    <div class="box-img">
        <?php
        $image = get_field('imagem_background_desktop');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt']; ?>
            <img class="img-desktop" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>
        <?php
        $imageMobile = get_field('imagem_background_mobile');
        if ($imageMobile) :
            $image_url = $imageMobile['url'];
            $image_alt = $imageMobile['alt']; ?>
            <img class="img-mobile" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php endif; ?>
    </div>
    <div class="box-titulos">
        <div class="wrapper">

            <h1 class="titulo-banner"><?php echo get_field('titulo_banner'); ?></h1>
            <p class="descricao-banner founders-grotesk"><?php echo get_field('descricao_banner'); ?></p>
            <?php
            $link = get_field('link_banner');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="link-sobre scroll-top" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <p class=""><?php echo esc_html($link_title); ?></p>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <svg class="svg-banner" xmlns="http://www.w3.org/2000/svg" width="90" height="47" viewBox="0 0 90 47" fill="none">
        <path d="M9.15081 0H0.188477V35.4339H9.15081C14.7774 35.4339 19.1382 33.8739 22.1116 30.8012C25.0825 27.7286 26.5865 23.1857 26.5865 17.297C26.5865 11.4084 25.0775 7.35143 22.1041 4.41584C19.1307 1.48524 14.7724 0 9.15081 0ZM24.3528 17.297C24.3528 20.0083 24.0202 22.4082 23.3625 24.4342C22.7296 26.3829 21.7765 28.0376 20.5281 29.3509C19.2846 30.6592 17.7284 31.6585 15.9017 32.3189C14.013 33.0017 11.7742 33.3481 9.25257 33.3481H2.45202V2.0883H9.25009C11.7817 2.0883 14.0254 2.41974 15.9241 3.07514C17.7533 3.70562 19.3094 4.65757 20.5554 5.90606C21.7964 7.14958 22.742 8.71456 23.3699 10.5562C24.0227 12.4675 24.3528 14.7377 24.3528 17.2995V17.297Z" fill="white" />
        <path d="M59.2628 0.0395508H50.427V32.8643L50.3104 32.9191C48.7493 33.6393 47.0963 34.0032 45.3912 34.0032C43.6861 34.0032 42.0331 33.6393 40.4719 32.9191L40.3553 32.8643V0.0395508H31.5195V22.1013C31.5195 29.7792 37.7418 36.0267 45.3887 36.0267C53.0356 36.0267 59.2578 29.7792 59.2578 22.1013V22.0839V0.428304V0.0395508H59.2628ZM38.3424 31.6681L38.0198 31.4115C35.173 29.1412 33.5398 25.7471 33.5398 22.1013V2.06306H38.3424V31.6681ZM57.2475 22.2085C57.2152 25.8144 55.5821 29.1662 52.7675 31.4115L52.4449 31.6681V2.06306H57.2475V22.2085Z" fill="white" />
        <path d="M88.9915 2.08263V0.00927734H65.1201V35.4756H88.9915V33.4022H67.1876V18.7791H84.6034V16.7057H67.1876V2.08263H88.9915Z" fill="white" />
        <path d="M0.955552 39.978H0V46.1408H0.955552V39.978Z" fill="white" />
        <path d="M7.55006 44.1895L3.9686 39.978H3.46973V46.1408H4.41783V41.9617L7.93228 46.1408H8.49568V39.978H7.55006V44.1895Z" fill="white" />
        <path d="M13.8716 45.3068C13.2411 45.3068 12.7175 45.0974 12.293 44.6813C11.8686 44.2651 11.6626 43.7293 11.6626 43.0789C11.6626 42.4285 11.8786 41.8852 12.303 41.4516C12.7348 41.018 13.2585 40.8012 13.8815 40.8012C14.6707 40.8012 15.3111 41.1351 15.8174 41.8105L16.4975 41.1925C16.2319 40.7912 15.867 40.4748 15.393 40.233C14.9189 39.9913 14.4126 39.8667 13.8567 39.8667C12.9756 39.8667 12.2285 40.1657 11.6055 40.7763C10.9826 41.3769 10.6748 42.1444 10.6748 43.0789C10.6748 44.0134 10.9826 44.756 11.5882 45.3466C12.1938 45.9397 12.9433 46.2313 13.8318 46.2313C14.9611 46.2313 15.9589 45.698 16.5322 44.9055L15.8522 44.305C15.3458 44.9728 14.6807 45.3068 13.874 45.3068H13.8716Z" fill="white" />
        <path d="M21.2346 39.8687C20.3535 39.8687 19.6064 40.1851 18.9835 40.8106C18.3605 41.4361 18.0527 42.1962 18.0527 43.0883C18.0527 43.9805 18.3506 44.7231 18.9586 45.3311C19.5642 45.9392 20.3212 46.2407 21.2098 46.2407C22.0983 46.2407 22.8702 45.9317 23.4932 45.3162C24.1161 44.6982 24.4239 43.9481 24.4239 43.0634C24.4239 42.1787 24.1161 41.4287 23.4932 40.8032C22.8702 40.1777 22.1231 39.8687 21.2346 39.8687ZM22.7883 44.6633C22.3639 45.0894 21.8501 45.2963 21.2346 45.2963C20.6191 45.2963 20.0954 45.0794 19.6734 44.6533C19.259 44.2272 19.0505 43.6939 19.0505 43.0684C19.0505 42.4429 19.259 41.8922 19.6809 41.466C20.1053 41.0324 20.629 40.8156 21.2346 40.8156C21.8402 40.8156 22.3639 41.0324 22.7883 41.4586C23.2127 41.8847 23.4286 42.4255 23.4286 43.0684C23.4286 43.7113 23.2127 44.2371 22.7883 44.6608V44.6633Z" fill="white" />
        <path d="M30.7539 41.8545C30.7539 41.3387 30.5801 40.8951 30.2401 40.5288C29.9001 40.1624 29.4087 39.978 28.7708 39.978H26.6016V46.1408H27.5571V43.721H28.3712L29.8653 46.1408H31.0194L29.3838 43.6313C30.2724 43.3896 30.7539 42.6644 30.7539 41.8545ZM27.5546 42.8314V40.8876H28.7683C29.3987 40.8876 29.7661 41.3038 29.7661 41.847C29.7661 42.3903 29.3913 42.8314 28.6194 42.8314H27.5571H27.5546Z" fill="white" />
        <path d="M35.8954 39.978H33.7783V46.1408H34.7339V43.8556H35.8135C36.511 43.8556 37.0421 43.6712 37.3995 43.2974C37.7569 42.9211 37.9406 42.4725 37.9406 41.9293C37.9406 41.386 37.7668 40.9275 37.4169 40.5537C37.0768 40.1699 36.5705 39.978 35.8979 39.978H35.8954ZM35.8383 42.9709H34.7339V40.8776H35.9376C36.5929 40.8776 36.9676 41.3362 36.9676 41.9118C36.9676 42.4875 36.578 42.9709 35.8383 42.9709Z" fill="white" />
        <path d="M42.803 39.8687C41.9219 39.8687 41.1748 40.1851 40.5518 40.8106C39.9289 41.4361 39.6211 42.1962 39.6211 43.0883C39.6211 43.9805 39.9189 44.7231 40.527 45.3311C41.1326 45.9392 41.8896 46.2407 42.7781 46.2407C43.6667 46.2407 44.4386 45.9317 45.0615 45.3162C45.6845 44.6982 45.9923 43.9481 45.9923 43.0634C45.9923 42.1787 45.6845 41.4287 45.0615 40.8032C44.4386 40.1777 43.6915 39.8687 42.803 39.8687ZM44.3567 44.6633C43.9322 45.0894 43.4185 45.2963 42.803 45.2963C42.1874 45.2963 41.6637 45.0794 41.2418 44.6533C40.8273 44.2272 40.6188 43.6939 40.6188 43.0684C40.6188 42.4429 40.8273 41.8922 41.2493 41.466C41.6737 41.0324 42.1974 40.8156 42.803 40.8156C43.4086 40.8156 43.9322 41.0324 44.3567 41.4586C44.7811 41.8847 44.997 42.4255 44.997 43.0684C44.997 43.7113 44.7811 44.2371 44.3567 44.6608V44.6633Z" fill="white" />
        <path d="M52.3281 41.8545C52.3281 41.3387 52.1543 40.8951 51.8143 40.5288C51.4743 40.1624 50.9829 39.978 50.345 39.978H48.1758V46.1408H49.1313V43.721H49.9454L51.4395 46.1408H52.5937L50.958 43.6313C51.8466 43.3896 52.3281 42.6644 52.3281 41.8545ZM49.1289 42.8314V40.8876H50.3425C50.9729 40.8876 51.3403 41.3038 51.3403 41.847C51.3403 42.3903 50.9655 42.8314 50.1936 42.8314H49.1313H49.1289Z" fill="white" />
        <path d="M56.6581 39.978L54.2158 46.1408H55.2458L55.8266 44.6231H58.0852L58.666 46.1408H59.696L57.2785 39.978H56.6556H56.6581ZM56.1344 43.7385L56.9658 41.5031L57.7973 43.7385H56.1368H56.1344Z" fill="white" />
        <path d="M63.8679 39.978H61.5498V46.1408H63.7935C64.7068 46.1408 65.4217 45.8667 65.9453 45.3159C66.469 44.7652 66.7346 44.0151 66.7346 43.0731C66.7346 42.1311 66.4765 41.3711 65.9627 40.8129C65.4564 40.2546 64.759 39.978 63.8704 39.978H63.8679ZM65.2305 44.6157C64.898 45.0243 64.4338 45.2237 63.8357 45.2237H62.5078V40.8951H63.8456C64.4363 40.8951 64.9004 41.0945 65.233 41.5031C65.573 41.9118 65.7393 42.4202 65.7393 43.0457C65.7393 43.6712 65.573 44.2045 65.233 44.6132L65.2305 44.6157Z" fill="white" />
        <path d="M71.759 39.8687C70.8779 39.8687 70.1309 40.1851 69.5079 40.8106C68.8849 41.4361 68.5771 42.1962 68.5771 43.0883C68.5771 43.9805 68.875 44.7231 69.4831 45.3311C70.0887 45.9392 70.8457 46.2407 71.7342 46.2407C72.6227 46.2407 73.3946 45.9317 74.0176 45.3162C74.6406 44.6982 74.9483 43.9481 74.9483 43.0634C74.9483 42.1787 74.6406 41.4287 74.0176 40.8032C73.3946 40.1777 72.6476 39.8687 71.759 39.8687ZM73.3127 44.6633C72.8883 45.0894 72.3745 45.2963 71.759 45.2963C71.1435 45.2963 70.6198 45.0794 70.1979 44.6533C69.7834 44.2272 69.5749 43.6939 69.5749 43.0684C69.5749 42.4429 69.7834 41.8922 70.2053 41.466C70.6297 41.0324 71.1534 40.8156 71.759 40.8156C72.3646 40.8156 72.8883 41.0324 73.3127 41.4586C73.7371 41.8847 73.9531 42.4255 73.9531 43.0684C73.9531 43.7113 73.7371 44.2371 73.3127 44.6608V44.6633Z" fill="white" />
        <path d="M81.2812 41.8545C81.2812 41.3387 81.1075 40.8951 80.7674 40.5288C80.4274 40.1624 79.936 39.978 79.2981 39.978H77.1289V46.1408H78.0845V43.721H78.8985L80.3927 46.1408H81.5468L79.9112 43.6313C80.7997 43.3896 81.2812 42.6644 81.2812 41.8545ZM78.082 42.8314V40.8876H79.2956C79.9261 40.8876 80.2934 41.3038 80.2934 41.847C80.2934 42.3903 79.9186 42.8314 79.1467 42.8314H78.0845H78.082Z" fill="white" />
        <path d="M81.2812 41.8545C81.2812 41.3387 81.1075 40.8951 80.7674 40.5288C80.4274 40.1624 79.936 39.978 79.2981 39.978H77.1289V46.1408H78.0845V43.721H78.8985L80.3927 46.1408H81.5468L79.9112 43.6313C80.7997 43.3896 81.2812 42.6644 81.2812 41.8545ZM78.082 42.8314V40.8876H79.2956C79.9261 40.8876 80.2934 41.3038 80.2934 41.847C80.2934 42.3903 79.9186 42.8314 79.1467 42.8314H78.0845H78.082Z" fill="white" />
        <path d="M86.615 39.978H85.992L83.5498 46.1408H84.5798L85.1606 44.6231H87.4192L87.9999 46.1408H89.03L86.6125 39.978H86.615ZM85.4683 43.7385L86.2998 41.5031L87.1313 43.7385H85.4708H85.4683Z" fill="white" />
    </svg>
</div>

<?php if (get_field('titulo_invista')) : ?>
    <div class="invista">
        <div class="wrapper">
            <h2 class="titulo-invista"><?php echo get_field('titulo_invista'); ?></h2>
            <div class="box-label-invista">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                    <path d="M16.9997 26.9168V7.0835M16.9997 7.0835L7.08301 17.0002M16.9997 7.0835L26.9163 17.0002" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="label-titulo founders-grotesk"><?php echo get_field('label_invista'); ?></p>
            </div>

            <div class="box-repetidor-invista-deskotp">
                <?php
                if (have_rows('card_invista')) :
                    while (have_rows('card_invista')) : the_row();
                        $tamanhoMedio = preg_replace('/\D/', '', get_sub_field('numero_medio')); // Remove tudo que não é número
                        $tamanhoValorizado = preg_replace('/\D/', '', get_sub_field('numero_valorizado')); // Remove tudo que não é número
                ?>
                        <div class="row-card-invista">
                            <div class="box-valorizacao">
                                <div class="valor-medio" style="height: <?php echo $tamanhoMedio ?>0px">
                                    <p class="text-medio founders-grotesk"><?php echo get_sub_field('numero_medio'); ?></p>
                                </div>
                                <div class="valor-valorizacao" style="height: <?php echo $tamanhoValorizado ?>0px">
                                    <p class="text-valorizacao founders-grotesk"><?php echo get_sub_field('numero_valorizado'); ?></p>
                                </div>
                            </div>
                            <div class="box-textos">
                                <h3 class="titulo-card-repetidor"><?php echo get_sub_field('titulo_empreendimento_card'); ?></h3>
                                <p class="valor-antigo founders-grotesk"><?php echo get_sub_field('valor_de_valorizacao_antigo'); ?></p>
                                <p class="valor-valozirado founders-grotesk"><?php echo get_sub_field('valor_de_valorizacao_novo'); ?></p>
                                <div class="box-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                        <path d="M10.5003 15.8332V4.1665M10.5003 4.1665L4.66699 9.99984M10.5003 4.1665L16.3337 9.99984" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="label-valorizacao">
                                        <?php echo get_sub_field('label_valorizou'); ?>
                                    </p>
                                </div>
                            </div>

                        </div>
                <?php endwhile;
                endif; ?>
            </div>
            <div class="box-repetidor-invista-mobile">
                <div class="swiper-container swiper-invista-empreendimento">
                    <div class="swiper-wrapper">
                        <?php
                        if (have_rows('card_invista')) :
                            while (have_rows('card_invista')) : the_row();
                                $tamanhoMedio = preg_replace('/\D/', '', get_sub_field('numero_medio')); // Remove tudo que não é número
                                $tamanhoValorizado = preg_replace('/\D/', '', get_sub_field('numero_valorizado')); // Remove tudo que não é número
                        ?>
                                <div class="swiper-slide row-card-invista">
                                    <div class="box-valorizacao">
                                        <div class="valor-medio" style="height: <?php echo $tamanhoMedio ?>0px">
                                            <p class="text-medio founders-grotesk"><?php echo get_sub_field('numero_medio'); ?></p>
                                        </div>
                                        <div class="valor-valorizacao" style="height: <?php echo $tamanhoValorizado ?>0px">
                                            <p class="text-valorizacao founders-grotesk"><?php echo get_sub_field('numero_valorizado'); ?></p>
                                        </div>
                                    </div>
                                    <div class="box-textos">
                                        <h3 class="titulo-card-repetidor"><?php echo get_sub_field('titulo_empreendimento_card'); ?></h3>
                                        <p class="valor-antigo founders-grotesk"><?php echo get_sub_field('valor_de_valorizacao_antigo'); ?></p>
                                        <p class="valor-valozirado founders-grotesk"><?php echo get_sub_field('valor_de_valorizacao_novo'); ?></p>
                                        <div class="box-label">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                <path d="M10.5003 15.8332V4.1665M10.5003 4.1665L4.66699 9.99984M10.5003 4.1665L16.3337 9.99984" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <p class="label-valorizacao">
                                                <?php echo get_sub_field('label_valorizou'); ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>

                    <div class="box-buttons">

                        <svg class="swiper-button-next mobile-next" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                            <path d="M1.99984 0L0.589844 1.41L5.16984 6L0.589844 10.59L1.99984 12L7.99984 6L1.99984 0Z" fill="#CB9E6C" />
                        </svg>

                        <svg class="swiper-button-prev mobile-prev" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                            <path d="M7.41 1.41L6 0L0 6L6 12L7.41 10.59L2.83 6L7.41 1.41Z" fill="#CB9E6C" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (get_field('titulo_beneficios')) : ?>

    <div class="beneficios">
        <div class="wrapper">
            <div class="titulo-beneficios-box">
                <h2 class="titulo-beneficios terminal-test"><?php echo get_field('titulo_beneficios'); ?></h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="167" height="28" viewBox="0 0 167 28" fill="none">
                    <path d="M126.983 27.2496C125.074 27.2496 123.3 26.9192 121.661 26.2586C120.046 25.5735 118.614 24.6314 117.367 23.4325C116.143 22.209 115.189 20.8021 114.504 19.2116C113.843 17.5967 113.513 15.8594 113.513 13.9998C113.513 12.1402 113.843 10.4151 114.504 8.82466C115.189 7.20973 116.143 5.80278 117.367 4.60382C118.614 3.38038 120.058 2.43834 121.697 1.77769C123.337 1.09256 125.099 0.75 126.983 0.75C128.328 0.75 129.638 0.933514 130.91 1.30054C132.207 1.64311 133.393 2.14471 134.47 2.80537C135.571 3.46602 136.525 4.26126 137.333 5.19107L134.764 7.83368C133.809 6.68365 132.647 5.81502 131.277 5.22777C129.907 4.61605 128.475 4.31019 126.983 4.31019C125.612 4.31019 124.34 4.55488 123.166 5.04425C122.016 5.53363 121.012 6.21875 120.156 7.09962C119.3 7.95602 118.627 8.97148 118.137 10.146C117.672 11.3205 117.44 12.6051 117.44 13.9998C117.44 15.37 117.672 16.6424 118.137 17.8169C118.627 18.9914 119.312 20.0191 120.193 20.9C121.074 21.7808 122.101 22.466 123.276 22.9553C124.45 23.4447 125.723 23.6894 127.093 23.6894C128.585 23.6894 129.992 23.3958 131.314 22.8085C132.659 22.1968 133.797 21.3404 134.727 20.2393L137.26 22.8085C136.403 23.7139 135.424 24.5091 134.323 25.1942C133.247 25.8549 132.072 26.3687 130.8 26.7357C129.552 27.0783 128.28 27.2496 126.983 27.2496Z" fill="white" />
                    <path d="M59.2256 26.8464V1.1543H63.0794V23.433H77.8707L75.3096 26.8464H59.2256Z" fill="white" />
                    <path d="M11.008 27.2132C8.95261 27.2132 6.97064 26.8095 5.06209 26.002C3.15353 25.1945 1.46519 24.0567 -0.00292969 22.5886L2.34606 19.8726C3.74078 21.2428 5.15996 22.2583 6.60361 22.9189C8.07173 23.5796 9.60103 23.9099 11.1915 23.9099C12.4394 23.9099 13.5282 23.7386 14.4581 23.3961C15.4123 23.0291 16.1464 22.5152 16.6602 21.8546C17.1741 21.1939 17.431 20.4476 17.431 19.6157C17.431 18.4656 17.0273 17.5848 16.2198 16.9731C15.4123 16.3613 14.0788 15.8964 12.2192 15.5783L7.92492 14.881C5.57593 14.465 3.81418 13.7065 2.63969 12.6054C1.48966 11.5043 0.914646 10.0362 0.914646 8.20104C0.914646 6.73292 1.30614 5.44831 2.08914 4.34722C2.87214 3.22166 3.97323 2.35303 5.39241 1.74131C6.83607 1.12959 8.49993 0.82373 10.384 0.82373C12.2436 0.82373 14.0666 1.12959 15.8528 1.74131C17.6635 2.32856 19.2906 3.18496 20.7343 4.31052L18.6055 7.24676C15.8405 5.14245 13.0389 4.0903 10.2005 4.0903C9.07495 4.0903 8.0962 4.24935 7.26427 4.56744C6.43233 4.88553 5.78391 5.3382 5.31901 5.92545C4.8541 6.48823 4.62165 7.14888 4.62165 7.90741C4.62165 8.95957 4.97645 9.76703 5.68604 10.3298C6.39563 10.8681 7.57013 11.2596 9.20953 11.5043L13.357 12.2017C16.073 12.6421 18.0672 13.4373 19.3396 14.5874C20.6119 15.7374 21.2481 17.3156 21.2481 19.3221C21.2481 20.888 20.8199 22.2705 19.9635 23.4695C19.1071 24.644 17.9081 25.5616 16.3666 26.2222C14.8251 26.8829 13.0389 27.2132 11.008 27.2132Z" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M154.121 8.04331V26.8459H157.975V7.32072L154.121 8.04331ZM145.364 4.56719V4.56301H165.853V4.56719H167.003V1.15381H145.092V4.56719H145.364Z" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M87.459 8.16713V26.8464H106.545V23.4697H91.3128V15.5052H101.223V12.2386H91.3128V7.44454L87.459 8.16713ZM87.459 4.53H100.028V4.53097H106.398V1.1543H87.459V4.53Z" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M30.4863 7.94804V26.8459H49.5719V23.4692H34.3401V15.5047H44.25V12.2381H34.3401V7.22544L30.4863 7.94804ZM30.4863 4.52972H41.8878V4.53049H49.4251V1.15381H30.4863V4.52972Z" fill="white" />
                </svg>
            </div>
            <div class="box-repetidor-benificios">
                <?php
                if (have_rows('cards_beneficios')) :
                    while (have_rows('cards_beneficios')) : the_row(); ?>
                        <div class="row-beneficios">
                            <div class="box-svg">
                                <?php $svg_file = get_sub_field('svg_beneficios');
                                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                    echo '<i class="element">';
                                    echo file_get_contents($svg_file['url']);
                                    echo '</i>';
                                } ?>
                            </div>
                            <h3 class="titulo-card-beneficios terminal-test"><?php echo get_sub_field('titulo_card_beneficios'); ?></h3>
                            <p class="descricao-card-beneficios founders-grotesk">
                                <?php echo get_sub_field('descricao_card_beneficios'); ?>
                            </p>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php if (get_field('titulo_excelencia_comprovada')) : ?>

    <div class="excelencia-comprovada">
        <div class="wrapper">

            <h2 class="titulo-excelencia-comprovada terminal-test"><?php echo get_field('titulo_excelencia_comprovada'); ?></h2>
            <p class="subtitulo-excelencia-comprovada founders-grotesk"><?php echo get_field('subtitulo_excelencia_comprovada'); ?></p>
        </div>
        <div class="swiper-container swiper-excelencia">
            <div class="swiper-wrapper">
                <?php
                if (have_rows('cards_empreendimento_excelencia_comprovada')) :
                    while (have_rows('cards_empreendimento_excelencia_comprovada')) : the_row(); ?>
                        <?php
                        $link = get_sub_field('link_empreendimento');
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                            <a class="swiper-slide row-excelencia-comprovada" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">

                                <div class="box-image">

                                    <?php
                                    $image = get_sub_field('imagem_card_empreendimento');
                                    if ($image) :
                                        $image_url = $image['url'];
                                        $image_alt = $image['alt']; ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                    <?php endif; ?>
                                </div>
                                <?php
                                $cor_da_porcentagem = get_sub_field('cor_da_porcentagem');
                                ?>
                                <div class="card-empreendimento">

                                    <div class="box-porcentagem <?php echo $cor_da_porcentagem ?>">
                                        <p class="porcentagem terminal-test"><?php echo get_sub_field('porcentagem_da_venda'); ?></p>
                                    </div>
                                    <div class="box-conteudo">
                                        <div class="box-textos">

                                            <p class="localizacao"><?php echo get_sub_field('localizacao_empreendimento'); ?></p>
                                            <h3 class="titulo-empreendimento founders-grotesk"><?php echo get_sub_field('nome_do_empreendimento'); ?></h3>
                                            <div class="box-apt">
                                                <div class="container-apt">

                                                    <div class="box-svg">
                                                        <?php $svg_file = get_sub_field('svg_apartamentos');
                                                        if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                                            echo '<i class="element">';
                                                            echo file_get_contents($svg_file['url']);
                                                            echo '</i>';
                                                        } ?>
                                                    </div>
                                                    <p class="numero-apt founders-grotesk"><?php echo get_sub_field('numero_de_apartamento'); ?></p>
                                                </div>
                                                <div class="container-valorizacao">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none">
                                                        <g clip-path="url(#clip0_5776_18412)">
                                                            <path d="M19.1663 5L11.2497 12.9167L7.08301 8.75L0.833008 15" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14.167 5H19.167V10" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_5776_18412">
                                                                <rect width="20" height="15" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <p class="text-valorizacao founders-grotesk"><?php echo get_sub_field('valorizacao_apartamento'); ?></p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-hover">
                                            <p class="texto-hover"><?php echo get_sub_field('texto_hover'); ?></p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="26" viewBox="0 0 43 26" fill="none">
                                                <path d="M-5.24537e-07 13L41.5 13M41.5 13L29.5 25M41.5 13L29.5 0.999999" stroke="white" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                <?php endwhile;
                endif; ?>
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
<?php endif; ?>

<?php if (get_field('titulo_sobre_a_due')) : ?>

    <div class="sobre-a-due">
        <div class="wrapper-sobre">

            <div class="box-conteudo">
                <h2 class="titulo-sobre-a-due"><?php echo get_field('titulo_sobre_a_due'); ?></h2>
                <div class="descricao-sobre-a-due"><?php echo get_field('descricao_sobre_a_due'); ?></div>
                <?php
                $link = get_field('link_sobre_a_due');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="link-sobre scroll-top" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <p class=""><?php echo esc_html($link_title); ?></p>
                    </a>
                <?php endif; ?>
            </div>
            <div class="box-imagem">
                <?php
                $image = get_field('background_video');
                if ($image) :
                    $image_url = $image['url'];
                    $image_alt = $image['alt']; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
                <div class="box-button">
                    <svg class="svg-open" xmlns="http://www.w3.org/2000/svg" width="81" height="80" viewBox="0 0 81 80" fill="none">
                        <rect x="1" y="0.5" width="79" height="79" rx="39.5" stroke="white" />
                        <path d="M36.6055 48V36.6316V32L48.3949 40L36.6055 48Z" stroke="white" />
                    </svg>
                    <p class="terminal-test"><?php echo __('ASSISTA E CONHECA', 'due-website') ?></p>
                </div>
            </div>
            <?php $video = get_field('link_video'); ?>
            <div class="box-youtube-vivencie" id="youtube">

                <svg class="svg-close" width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L40.9997 40.9997" stroke="#212121" />
                    <path d="M1 40.9995L40.9997 0.999816" stroke="#212121" />
                </svg>
                <div class="my-video" id="my-video">
                    <iframe id="youtube-player" src="<?php echo $video ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (get_field('titulo_investidores')) : ?>

    <div class="investidores">
        <div class="wrapper">

            <h2 class="titulo-investidores"><?php echo get_field('titulo_investidores'); ?></h2>
        </div>

        <div class="box-investidores">
            <div class="investidores-carousel">
                <?php
                if (have_rows('card_investidores')) :
                    while (have_rows('card_investidores')) : the_row(); ?>
                        <div class="row-investidores">
                            <?php
                            $image = get_sub_field('imagem_investidores');
                            if ($image) :
                                $image_url = $image['url'];
                                $image_alt = $image['alt']; ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                            <?php endif; ?>
                            <p class="titulo-investidores-card"><?php echo get_sub_field('nome_investidores'); ?></p>
                            <svg class="shadow-row-investidores" width="387" height="585" viewBox="0 0 387 585" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="387" height="585" fill="url(#paint0_linear_5792_18833)" fill-opacity="0.8" />
                                <defs>
                                    <linearGradient id="paint0_linear_5792_18833" x1="193.5" y1="376.312" x2="193.5" y2="585" gradientUnits="userSpaceOnUse">
                                        <stop stop-opacity="0" />
                                        <stop offset="1" />
                                    </linearGradient>
                                </defs>
                            </svg>

                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>

    </div>
<?php endif; ?>
<?php get_footer('select') ?>
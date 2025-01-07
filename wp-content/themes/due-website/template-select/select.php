<?php
//Template Name: Select
get_header();
wp_enqueue_style('Select', get_template_directory_uri() . '/assets/dist/css/select/select.css', ['main'], ASSETS_VERSION);

?>
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
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>


</div>
<?php get_footer() ?>
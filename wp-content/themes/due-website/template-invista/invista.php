<section class="invista sections-spacing">
    <div class="wrapper">
        <div class="label-invista">
            <p class="terminal-test"><?php echo get_field('label_invista', 'options'); ?></p>
        </div>
        <div class="titulo-invista">
            <h2 class="terminal-test"><?php echo get_field('titulo_invista', 'options'); ?></h2>
        </div>
    </div>

    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            <?php
            if (have_rows('repetidor_card_invista', 'options')) :
                while (have_rows('repetidor_card_invista', 'options')) : the_row();
                    $labelTitulo = get_sub_field('investimento_label_invista', 'options');
                    $descricaoInvista = get_sub_field('descricao_invista', 'options');
                    $svg_file = get_sub_field('logo_invista', 'options');
                    $link = get_sub_field('link_investimento', 'options');
            ?>
                    <div class="swiper-slide card-invista" id="card-invista">
                        <div class="box-img">
                            <div class="svg-numeros">
                                <div class="box-svg">
                                    <?php $svg_file_v2 = get_sub_field('svg_numeros_invista', 'options');
                                    if ($svg_file_v2 && pathinfo($svg_file_v2['url'], PATHINFO_EXTENSION) === 'svg') {
                                        echo '<i class="element">';
                                        echo file_get_contents($svg_file_v2['url']);
                                        echo '</i>';
                                    } ?>
                                </div>
                            </div>
                            <?php
                            $image = get_sub_field('imagem_invista', 'options');
                            if ($image) {
                                $image_url = $image['url'];
                                $image_alt = $image['alt'];
                                echo '<img class="img-invista" src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">';
                            }
                            ?>
                            <div class="box-list-hover">
                                <div class="box-svg">
                                    <?php
                                    if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                        echo '<i class="element">';
                                        echo file_get_contents($svg_file['url']);
                                        echo '</i>';
                                    } ?>
                                </div>
                                <div class="box-item-invista-hover">

                                    <?php
                                    if (have_rows('repetidor_lista_hover', 'options')) :
                                        while (have_rows('repetidor_lista_hover', 'options')) : the_row(); ?>
                                            <div class="item-invista-hover">
                                                <i>

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                                        <path d="M9 14L12 17L17 10M25 13C25 14.5759 24.6896 16.1363 24.0866 17.5922C23.4835 19.0481 22.5996 20.371 21.4853 21.4853C20.371 22.5996 19.0481 23.4835 17.5922 24.0866C16.1363 24.6896 14.5759 25 13 25C11.4241 25 9.86371 24.6896 8.4078 24.0866C6.95189 23.4835 5.62902 22.5996 4.51472 21.4853C3.40042 20.371 2.5165 19.0481 1.91345 17.5922C1.31039 16.1363 1 14.5759 1 13C1 9.8174 2.26428 6.76516 4.51472 4.51472C6.76516 2.26428 9.8174 1 13 1C16.1826 1 19.2348 2.26428 21.4853 4.51472C23.7357 6.76516 25 9.8174 25 13Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </i>
                                                <p class="founders-grotesk"><?php echo get_sub_field('texto_lista_hover', 'options'); ?></p>
                                            </div>
                                    <?php endwhile;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="box-textos-mobile">
                                <div class="label-investimento-invista">
                                    <h4 class="terminal-test"><?php echo $labelTitulo ?></h4>
                                </div>
                                <div class="descricao-investimento-invista">
                                    <p class="founders-grotesk"> <?php echo $descricaoInvista ?></p>
                                </div>
                                <?php

                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a class="button-v2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <p class=""><?php echo esc_html($link_title); ?></p>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="box-textos">
                            <div class="label-investimento-invista">
                                <h4 class="terminal-test"><?php echo $labelTitulo ?></h4>
                            </div>
                            <div class="descricao-investimento-invista">
                                <p class="founders-grotesk"> <?php echo $descricaoInvista ?></p>
                            </div>
                            <?php

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
            <?php endwhile;
            endif; ?>
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
</section>
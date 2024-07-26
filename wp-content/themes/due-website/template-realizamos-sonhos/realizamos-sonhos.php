<section class="realizamos-sonho">

    <div class="boxs-sections">
        <div class="box box-left">


            <div class="box-svg">
                <?php $svg_file = get_field('svg_caixa', 'options');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo file_get_contents($svg_file['url']);
                } ?>
            </div>
            <div class="box-titulo">
                <h2 class="terminal-test"><?php echo get_field('titulo_realizamos_o_sonho', 'options'); ?></h2>
            </div>
            <div class="box-subtitulo">
                <p class="founders-grotesk"><?php echo get_field('subtitulo_realizamos_o_sonho', 'options'); ?></p>
            </div>

            <div class="box-list">
                <?php
                if (have_rows('lista_realizamos_o_sonho', 'options')) :
                    while (have_rows('lista_realizamos_o_sonho', 'options')) : the_row(); ?>
                        <div class="itens-list">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="10" viewBox="0 0 9 10" fill="none">
                                <circle cx="4.5" cy="4.83296" r="4.5" fill="#51848C" />
                            </svg>
                            <p class="founders-grotesk">
                                <?php echo get_sub_field('item_realizamos_o_sonho', 'options'); ?>
                            </p>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
            <?php
            $modalVideo = get_field('link_youtube', 'options');
            ?>
            <div class="button-icon-play js-modal-open" id="video-modal" data-src="<?php echo htmlspecialchars($modalVideo); ?>">
                <p><?php echo __('como funciona', 'due-website'); ?></p>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="19" viewBox="0 0 14 19" fill="none">
                    <path d="M1 17.5V6.13158V1.5L12.7895 9.5L1 17.5Z" stroke="#002D38" />
                </svg>
            </div>
            <div class="modal js-modal">
                <div class="modal__bg js-modal-close"></div>
                <div class="modal__content">
                    <div class="video-container"></div>

                </div>
                <span class="js-modal-close-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                        <g clip-path="url(#clip0_2145_7167)">
                            <path class="hover-line" d="M1 1L30.1161 28.983" stroke="white" stroke-width="2" />
                            <path class="hover-line" d="M1 28.9835L30.1161 1.0005" stroke="white" stroke-width="2" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2145_7167">
                                <rect width="31" height="30" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </span>
            </div>
        </div>

        <div class="box box-right">

            <div class="box-img">
                <?php
                $image = get_field('imagem_realizamos_o_sonho', 'options');
                if ($image) :
                    $image_url = $image['url'];
                    $image_alt = $image['alt']; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
            </div>
            <div class="box-svg-mobile">
                <?php $svg_file = get_field('svg_caixa_mobile', 'options');
                if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                    echo file_get_contents($svg_file['url']);
                } ?>
            </div>
        </div>
    </div>
</section>
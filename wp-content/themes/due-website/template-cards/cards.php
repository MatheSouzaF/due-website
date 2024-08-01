<section class="cards">
    <div class="wrapper">

        <div class="card-empreendimentos">
            <?php
            $link = get_sub_field('link_empreendimento');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="box-card" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <div class="box-midia">
                        <?php
                        $image = get_sub_field('imagem_nossos_club_resorts');
                        if ($image) :
                            $image_url = $image['url'];
                            $image_alt = $image['alt'];
                        ?>
                            <img class="imagem-empreendimento" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                        <?php endif; ?>

                        <video class="video-empreendimento" src="<?php echo get_sub_field('video_hover_empreendimento') ?>" muted loop playsinline></video>
                    </div>

                    <div class="box-label" style="background-color: <?php echo get_sub_field('background_label_card'); ?>;">
                        <p class="terminal-test label-informativo"><?php echo get_sub_field('label_informativo_card'); ?></p>
                    </div>

                    <div class="box-textos-empreendimentos">
                        <div class="container-text">

                            <div class="box-titulos">
                                <p class="localizacao-empreendimento terminal-test"><?php echo get_sub_field('localizacao_emprendimento'); ?></p>
                                <h4 class="nome-empreendimento founders-grotesk"><?php echo get_sub_field('nome_empreendimento'); ?></h4>
                            </div>
                            <div class="box-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="26" viewBox="0 0 43 26" fill="none">
                                    <path d="M-5.24537e-07 13L41.5 13M41.5 13L29.5 25M41.5 13L29.5 0.999999" stroke="white" />
                                </svg>
                            </div>
                        </div>
                        <div class="box-informacoes">
                            <?php
                            if (have_rows('informacoes_empreendimento')) :
                                while (have_rows('informacoes_empreendimento')) : the_row(); ?>

                                    <div class="informacoes">
                                        <div class="box-svg">
                                            <?php $svg_file = get_sub_field('svg_informacao_empreendimento');
                                            if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
                                                echo '<i class="element">';
                                                echo file_get_contents($svg_file['url']);
                                                echo '</i>';
                                            } ?>
                                        </div>
                                        <p class="founders-grotesk"><?php echo get_sub_field('texto_informacao_empreendimento'); ?></p>
                                    </div>
                            <?php endwhile;
                            endif; ?>
                        </div>
                    </div>
                </a>
            <?php endif; ?>

            <div class="box-valores">
                <div class="valores">
                    <p class="entradas founders-grotesk ">Entradas a partir de</p>
                    <p class="valor founders-grotesk">de R$ 4.200,00</p>
                </div>
                <div class="fale-com-time">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <circle cx="10" cy="10" r="5" fill="#8AC550" />
                        <circle cx="10" cy="10" r="9.5" stroke="#89C550" />
                    </svg>
                    <p class="texto-fale founders-grotesk">Fale com nosso time</p>
                </div>
            </div>
        </div>


        <div class="container-tipologias">



            <div class="card-tipologias">
                <?php
                $link = get_sub_field('link_empreendimento');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="box-card" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <div class="box-midia">
                            <?php
                            $image = get_sub_field('imagem_nossos_club_resorts');
                            if ($image) :
                                $image_url = $image['url'];
                                $image_alt = $image['alt'];
                            ?>
                                <img class="imagem-tipologias" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                            <?php endif; ?>

                        </div>

                        <div class="box-label" style="background-color: <?php echo get_sub_field('background_label_card'); ?>;">
                            <p class="terminal-test label-informativo"><?php echo get_sub_field('label_informativo_card'); ?></p>
                        </div>

                    </a>
                <?php endif; ?>

                <div class="box-textos-tipologias">
                    <div class="container-text">
                        <div class="box-container-svg">
                            <p class="localizacao-tipologias terminal-test">cais eco residencia</p>
                            <div class="fale-com-time">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <circle cx="10" cy="10" r="5" fill="#861D1D" />
                                    <circle cx="10" cy="10" r="9.5" stroke="#861D1D" />
                                </svg>
                                <p class="texto-fale founders-grotesk">Apenas 2 un.</p>
                            </div>
                        </div>
                        <h4 class="nome-tipologias founders-grotesk"><?php echo get_sub_field('nome_empreendimento'); ?></h4>
                        <div class="localizacao-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                                <path d="M9.93329 7.39984C9.93329 8.0788 9.66436 8.72994 9.18565 9.21004C8.70695 9.69013 8.05769 9.95984 7.38071 9.95984C6.70372 9.95984 6.05446 9.69013 5.57576 9.21004C5.09706 8.72994 4.82812 8.0788 4.82812 7.39984C4.82812 6.72089 5.09706 6.06974 5.57576 5.58965C6.05446 5.10956 6.70372 4.83984 7.38071 4.83984C8.05769 4.83984 8.70695 5.10956 9.18565 5.58965C9.66436 6.06974 9.93329 6.72089 9.93329 7.39984Z" stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.7629 7.4C13.7629 13.4945 7.38145 17 7.38145 17C7.38145 17 1 13.4945 1 7.4C1 5.70261 1.67233 4.07475 2.86908 2.87452C4.06584 1.67428 5.68899 1 7.38145 1C9.07392 1 10.6971 1.67428 11.8938 2.87452C13.0906 4.07475 13.7629 5.70261 13.7629 7.4Z" stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="localizacao-titulo founders-grotesk">Praia de Muro Alto - PE</p>
                        </div>
                    </div>
                    <div class="box-informacoes">
                        <?php
                        if (have_rows('informacoes_empreendimento')) :
                            while (have_rows('informacoes_empreendimento')) : the_row(); ?>

                                <div class="informacoes">
                                    <div class="box-svg">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="30" height="30" rx="15" fill="#FAF2EB" fill-opacity="0.7" />
                                            <g clip-path="url(#clip0_2244_4806)">
                                                <path d="M13.0365 13.4828C13.0365 14.7959 11.6151 15.6165 10.4778 14.96C9.95008 14.6553 9.625 14.0923 9.625 13.4828C9.625 12.1697 11.0465 11.3489 12.1837 12.0055C12.7115 12.3103 13.0365 12.8733 13.0365 13.4828Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.0625 10.4043V17.5467" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22.9385 20.1581V17.5474H7.0625V20.1581" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22.9385 17.5471V15.3068C22.9385 13.3585 21.3588 11.779 19.4105 11.7788H15.6055V17.5471" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2244_4806">
                                                    <rect width="16.875" height="10.6875" fill="white" transform="translate(6.5625 9.65625)" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                    </div>
                                    <p class="founders-grotesk"><?php echo get_sub_field('texto_informacao_empreendimento'); ?></p>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>

                    <div class="box-tipos">
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Piscina privativa</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Beira-mar</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Jardim integrado</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Sala ampliada</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-tipologias">
                <?php
                $link = get_sub_field('link_empreendimento');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="box-card" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <div class="box-midia">
                            <?php
                            $image = get_sub_field('imagem_nossos_club_resorts');
                            if ($image) :
                                $image_url = $image['url'];
                                $image_alt = $image['alt'];
                            ?>
                                <img class="imagem-tipologias" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                            <?php endif; ?>

                        </div>

                        <div class="box-label" style="background-color: <?php echo get_sub_field('background_label_card'); ?>;">
                            <p class="terminal-test label-informativo"><?php echo get_sub_field('label_informativo_card'); ?></p>
                        </div>

                    </a>
                <?php endif; ?>

                <div class="box-textos-tipologias">
                    <div class="container-text">
                        <div class="box-container-svg">
                            <p class="localizacao-tipologias terminal-test">cais eco residencia</p>
                            <div class="fale-com-time">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <circle cx="10" cy="10" r="5" fill="#861D1D" />
                                    <circle cx="10" cy="10" r="9.5" stroke="#861D1D" />
                                </svg>
                                <p class="texto-fale founders-grotesk">Apenas 2 un.</p>
                            </div>
                        </div>
                        <h4 class="nome-tipologias founders-grotesk"><?php echo get_sub_field('nome_empreendimento'); ?></h4>
                        <div class="localizacao-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                                <path d="M9.93329 7.39984C9.93329 8.0788 9.66436 8.72994 9.18565 9.21004C8.70695 9.69013 8.05769 9.95984 7.38071 9.95984C6.70372 9.95984 6.05446 9.69013 5.57576 9.21004C5.09706 8.72994 4.82812 8.0788 4.82812 7.39984C4.82812 6.72089 5.09706 6.06974 5.57576 5.58965C6.05446 5.10956 6.70372 4.83984 7.38071 4.83984C8.05769 4.83984 8.70695 5.10956 9.18565 5.58965C9.66436 6.06974 9.93329 6.72089 9.93329 7.39984Z" stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.7629 7.4C13.7629 13.4945 7.38145 17 7.38145 17C7.38145 17 1 13.4945 1 7.4C1 5.70261 1.67233 4.07475 2.86908 2.87452C4.06584 1.67428 5.68899 1 7.38145 1C9.07392 1 10.6971 1.67428 11.8938 2.87452C13.0906 4.07475 13.7629 5.70261 13.7629 7.4Z" stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="localizacao-titulo founders-grotesk">Praia de Muro Alto - PE</p>
                        </div>
                    </div>
                    <div class="box-informacoes">
                        <?php
                        if (have_rows('informacoes_empreendimento')) :
                            while (have_rows('informacoes_empreendimento')) : the_row(); ?>

                                <div class="informacoes">
                                    <div class="box-svg">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="30" height="30" rx="15" fill="#FAF2EB" fill-opacity="0.7" />
                                            <g clip-path="url(#clip0_2244_4806)">
                                                <path d="M13.0365 13.4828C13.0365 14.7959 11.6151 15.6165 10.4778 14.96C9.95008 14.6553 9.625 14.0923 9.625 13.4828C9.625 12.1697 11.0465 11.3489 12.1837 12.0055C12.7115 12.3103 13.0365 12.8733 13.0365 13.4828Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.0625 10.4043V17.5467" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22.9385 20.1581V17.5474H7.0625V20.1581" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22.9385 17.5471V15.3068C22.9385 13.3585 21.3588 11.779 19.4105 11.7788H15.6055V17.5471" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2244_4806">
                                                    <rect width="16.875" height="10.6875" fill="white" transform="translate(6.5625 9.65625)" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                    </div>
                                    <p class="founders-grotesk"><?php echo get_sub_field('texto_informacao_empreendimento'); ?></p>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>

                    <div class="box-tipos">
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Piscina privativa</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Beira-mar</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Jardim integrado</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Sala ampliada</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-tipologias">
                <?php
                $link = get_sub_field('link_empreendimento');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="box-card" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <div class="box-midia">
                            <?php
                            $image = get_sub_field('imagem_nossos_club_resorts');
                            if ($image) :
                                $image_url = $image['url'];
                                $image_alt = $image['alt'];
                            ?>
                                <img class="imagem-tipologias" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                            <?php endif; ?>

                        </div>

                        <div class="box-label" style="background-color: <?php echo get_sub_field('background_label_card'); ?>;">
                            <p class="terminal-test label-informativo"><?php echo get_sub_field('label_informativo_card'); ?></p>
                        </div>

                    </a>
                <?php endif; ?>

                <div class="box-textos-tipologias">
                    <div class="container-text">
                        <div class="box-container-svg">
                            <p class="localizacao-tipologias terminal-test">cais eco residencia</p>
                            <div class="fale-com-time">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <circle cx="10" cy="10" r="5" fill="#861D1D" />
                                    <circle cx="10" cy="10" r="9.5" stroke="#861D1D" />
                                </svg>
                                <p class="texto-fale founders-grotesk">Apenas 2 un.</p>
                            </div>
                        </div>
                        <h4 class="nome-tipologias founders-grotesk"><?php echo get_sub_field('nome_empreendimento'); ?></h4>
                        <div class="localizacao-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                                <path d="M9.93329 7.39984C9.93329 8.0788 9.66436 8.72994 9.18565 9.21004C8.70695 9.69013 8.05769 9.95984 7.38071 9.95984C6.70372 9.95984 6.05446 9.69013 5.57576 9.21004C5.09706 8.72994 4.82812 8.0788 4.82812 7.39984C4.82812 6.72089 5.09706 6.06974 5.57576 5.58965C6.05446 5.10956 6.70372 4.83984 7.38071 4.83984C8.05769 4.83984 8.70695 5.10956 9.18565 5.58965C9.66436 6.06974 9.93329 6.72089 9.93329 7.39984Z" stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.7629 7.4C13.7629 13.4945 7.38145 17 7.38145 17C7.38145 17 1 13.4945 1 7.4C1 5.70261 1.67233 4.07475 2.86908 2.87452C4.06584 1.67428 5.68899 1 7.38145 1C9.07392 1 10.6971 1.67428 11.8938 2.87452C13.0906 4.07475 13.7629 5.70261 13.7629 7.4Z" stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="localizacao-titulo founders-grotesk">Praia de Muro Alto - PE</p>
                        </div>
                    </div>
                    <div class="box-informacoes">
                        <?php
                        if (have_rows('informacoes_empreendimento')) :
                            while (have_rows('informacoes_empreendimento')) : the_row(); ?>

                                <div class="informacoes">
                                    <div class="box-svg">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="30" height="30" rx="15" fill="#FAF2EB" fill-opacity="0.7" />
                                            <g clip-path="url(#clip0_2244_4806)">
                                                <path d="M13.0365 13.4828C13.0365 14.7959 11.6151 15.6165 10.4778 14.96C9.95008 14.6553 9.625 14.0923 9.625 13.4828C9.625 12.1697 11.0465 11.3489 12.1837 12.0055C12.7115 12.3103 13.0365 12.8733 13.0365 13.4828Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.0625 10.4043V17.5467" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22.9385 20.1581V17.5474H7.0625V20.1581" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22.9385 17.5471V15.3068C22.9385 13.3585 21.3588 11.779 19.4105 11.7788H15.6055V17.5471" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2244_4806">
                                                    <rect width="16.875" height="10.6875" fill="white" transform="translate(6.5625 9.65625)" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                    </div>
                                    <p class="founders-grotesk"><?php echo get_sub_field('texto_informacao_empreendimento'); ?></p>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>

                    <div class="box-tipos">
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Piscina privativa</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Beira-mar</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Jardim integrado</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Sala ampliada</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-tipologias">
                <?php
                $link = get_sub_field('link_empreendimento');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="box-card" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <div class="box-midia">
                            <?php
                            $image = get_sub_field('imagem_nossos_club_resorts');
                            if ($image) :
                                $image_url = $image['url'];
                                $image_alt = $image['alt'];
                            ?>
                                <img class="imagem-tipologias" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                            <?php endif; ?>

                        </div>

                        <div class="box-label" style="background-color: <?php echo get_sub_field('background_label_card'); ?>;">
                            <p class="terminal-test label-informativo"><?php echo get_sub_field('label_informativo_card'); ?></p>
                        </div>

                    </a>
                <?php endif; ?>

                <div class="box-textos-tipologias">
                    <div class="container-text">
                        <div class="box-container-svg">
                            <p class="localizacao-tipologias terminal-test">cais eco residencia</p>
                            <div class="fale-com-time">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <circle cx="10" cy="10" r="5" fill="#861D1D" />
                                    <circle cx="10" cy="10" r="9.5" stroke="#861D1D" />
                                </svg>
                                <p class="texto-fale founders-grotesk">Apenas 2 un.</p>
                            </div>
                        </div>
                        <h4 class="nome-tipologias founders-grotesk"><?php echo get_sub_field('nome_empreendimento'); ?></h4>
                        <div class="localizacao-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                                <path d="M9.93329 7.39984C9.93329 8.0788 9.66436 8.72994 9.18565 9.21004C8.70695 9.69013 8.05769 9.95984 7.38071 9.95984C6.70372 9.95984 6.05446 9.69013 5.57576 9.21004C5.09706 8.72994 4.82812 8.0788 4.82812 7.39984C4.82812 6.72089 5.09706 6.06974 5.57576 5.58965C6.05446 5.10956 6.70372 4.83984 7.38071 4.83984C8.05769 4.83984 8.70695 5.10956 9.18565 5.58965C9.66436 6.06974 9.93329 6.72089 9.93329 7.39984Z" stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.7629 7.4C13.7629 13.4945 7.38145 17 7.38145 17C7.38145 17 1 13.4945 1 7.4C1 5.70261 1.67233 4.07475 2.86908 2.87452C4.06584 1.67428 5.68899 1 7.38145 1C9.07392 1 10.6971 1.67428 11.8938 2.87452C13.0906 4.07475 13.7629 5.70261 13.7629 7.4Z" stroke="#003B4B" stroke-width="0.842105" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="localizacao-titulo founders-grotesk">Praia de Muro Alto - PE</p>
                        </div>
                    </div>
                    <div class="box-informacoes">
                        <?php
                        if (have_rows('informacoes_empreendimento')) :
                            while (have_rows('informacoes_empreendimento')) : the_row(); ?>

                                <div class="informacoes">
                                    <div class="box-svg">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="30" height="30" rx="15" fill="#FAF2EB" fill-opacity="0.7" />
                                            <g clip-path="url(#clip0_2244_4806)">
                                                <path d="M13.0365 13.4828C13.0365 14.7959 11.6151 15.6165 10.4778 14.96C9.95008 14.6553 9.625 14.0923 9.625 13.4828C9.625 12.1697 11.0465 11.3489 12.1837 12.0055C12.7115 12.3103 13.0365 12.8733 13.0365 13.4828Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.0625 10.4043V17.5467" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22.9385 20.1581V17.5474H7.0625V20.1581" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22.9385 17.5471V15.3068C22.9385 13.3585 21.3588 11.779 19.4105 11.7788H15.6055V17.5471" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2244_4806">
                                                    <rect width="16.875" height="10.6875" fill="white" transform="translate(6.5625 9.65625)" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                    </div>
                                    <p class="founders-grotesk"><?php echo get_sub_field('texto_informacao_empreendimento'); ?></p>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>

                    <div class="box-tipos">
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Piscina privativa</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Beira-mar</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Jardim integrado</p>
                        </div>
                        <div class="linha-tipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="titulo-tipos founders-grotesk">Sala ampliada</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
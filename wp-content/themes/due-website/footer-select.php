</main>
<footer class="footer-select">
    <div class="wrapper">
        <div class="box-footer">
            <div class="box-titulo">
                <h2 class="titulo-footer-select"><?php echo get_field('titulo_select_footer', 'options'); ?></h2>
                <p class="subtitulo-footer-select founders-grotesk"><?php echo get_field('subtitulo_select_footer', 'options'); ?></p>
                <?php
                $link = get_field('link_footer_select', 'options');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="link-footer-select" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M19.0498 4.91005C18.1329 3.98416 17.0408 3.25002 15.8373 2.75042C14.6338 2.25081 13.3429 1.99574 12.0398 2.00005C6.5798 2.00005 2.1298 6.45005 2.1298 11.9101C2.1298 13.6601 2.5898 15.3601 3.4498 16.8601L2.0498 22.0001L7.2998 20.6201C8.7498 21.4101 10.3798 21.8301 12.0398 21.8301C17.4998 21.8301 21.9498 17.3801 21.9498 11.9201C21.9498 9.27005 20.9198 6.78005 19.0498 4.91005ZM12.0398 20.1501C10.5598 20.1501 9.1098 19.7501 7.8398 19.0001L7.5398 18.8201L4.4198 19.6401L5.2498 16.6001L5.0498 16.2901C4.22735 14.9771 3.79073 13.4593 3.7898 11.9101C3.7898 7.37005 7.4898 3.67005 12.0298 3.67005C14.2298 3.67005 16.2998 4.53005 17.8498 6.09005C18.6174 6.85392 19.2257 7.7626 19.6394 8.76338C20.0531 9.76417 20.264 10.8371 20.2598 11.9201C20.2798 16.4601 16.5798 20.1501 12.0398 20.1501ZM16.5598 13.9901C16.3098 13.8701 15.0898 13.2701 14.8698 13.1801C14.6398 13.1001 14.4798 13.0601 14.3098 13.3001C14.1398 13.5501 13.6698 14.1101 13.5298 14.2701C13.3898 14.4401 13.2398 14.4601 12.9898 14.3301C12.7398 14.2101 11.9398 13.9401 10.9998 13.1001C10.2598 12.4401 9.7698 11.6301 9.6198 11.3801C9.4798 11.1301 9.5998 11.0001 9.7298 10.8701C9.8398 10.7601 9.9798 10.5801 10.0998 10.4401C10.2198 10.3001 10.2698 10.1901 10.3498 10.0301C10.4298 9.86005 10.3898 9.72005 10.3298 9.60005C10.2698 9.48005 9.7698 8.26005 9.5698 7.76005C9.3698 7.28005 9.1598 7.34005 9.0098 7.33005H8.5298C8.3598 7.33005 8.0998 7.39005 7.8698 7.64005C7.6498 7.89005 7.0098 8.49005 7.0098 9.71005C7.0098 10.9301 7.89981 12.1101 8.0198 12.2701C8.1398 12.4401 9.7698 14.9401 12.2498 16.0101C12.8398 16.2701 13.2998 16.4201 13.6598 16.5301C14.2498 16.7201 14.7898 16.6901 15.2198 16.6301C15.6998 16.5601 16.6898 16.0301 16.8898 15.4501C17.0998 14.8701 17.0998 14.3801 17.0298 14.2701C16.9598 14.1601 16.8098 14.1101 16.5598 13.9901Z" fill="#003240" />
                            </svg>
                        </i>
                        <p class=""><?php echo esc_html($link_title); ?></p>
                    </a>
                <?php endif; ?>
            </div>
            <div class="label-select-footer">
                <p class="text-label founders-grotesk">

                    <?php echo __('ou via e-mail', 'due-website') ?>
            </div>
            </p>
            <div class="box-rd-select">
                <?php echo get_field('formulario_rd', 'options'); ?>
            </div>
            <div class="box-formulario-feedback">
                <div class="box-sucesso">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 12C2.25 6.615 6.615 2.25 12 2.25C17.385 2.25 21.75 6.615 21.75 12C21.75 17.385 17.385 21.75 12 21.75C6.615 21.75 2.25 17.385 2.25 12ZM15.61 10.186C15.67 10.1061 15.7134 10.0149 15.7377 9.91795C15.762 9.82098 15.7666 9.72014 15.7514 9.62135C15.7361 9.52257 15.7012 9.42782 15.6489 9.3427C15.5965 9.25757 15.5276 9.18378 15.4463 9.12565C15.3649 9.06753 15.2728 9.02624 15.1753 9.00423C15.0778 8.98221 14.9769 8.97991 14.8785 8.99746C14.7801 9.01501 14.6862 9.05205 14.6023 9.10641C14.5184 9.16077 14.4462 9.23135 14.39 9.314L11.154 13.844L9.53 12.22C9.38783 12.0875 9.19978 12.0154 9.00548 12.0188C8.81118 12.0223 8.62579 12.101 8.48838 12.2384C8.35097 12.3758 8.27225 12.5612 8.26882 12.7555C8.2654 12.9498 8.33752 13.1378 8.47 13.28L10.72 15.53C10.797 15.6069 10.8898 15.6662 10.992 15.7036C11.0942 15.7411 11.2033 15.7559 11.3118 15.7469C11.4202 15.738 11.5255 15.7055 11.6201 15.6519C11.7148 15.5982 11.7967 15.5245 11.86 15.436L15.61 10.186Z" fill="#003B4B" />
                    </svg>
                    <div class="box-conteudo">
                        <p class="titulo-sucesso"><?php echo __('Formulario enviado com sucesso!', 'due-website') ?></p>
                        <p class="subtitulo-sucesso"><?php echo __('Entraremos em contato em breve.', 'due-website') ?></p>
                    </div>
                    <svg class="close-feedback-sucesso" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M12 4L4 12M4 4L12 12" stroke="#003B4B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>

        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0/dist/lenis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    Fancybox.bind('[data-fancybox]', {});
</script>


</body>

</html>
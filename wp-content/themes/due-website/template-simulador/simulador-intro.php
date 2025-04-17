<?php
// Recupera os campos do ACF
$intro_title = get_field('intro_title');
$intro_description = get_field('intro_description');
$intro_background_image = get_field('intro_background_image');
$intro_cards = get_field('intro_cards');
?>

<section class="simulador-intro" style="background-image: url('<?= esc_url($intro_background_image['url'] ?? '') ?>');">
    <i class="logo-due">
        <?php include('wp-content/themes/due-website/assets/src/img/logo-due.svg') ?>
    </i>

    <div class="container">
        <div class="intro-content">
            <?php if ($intro_title): ?>
                <h1><?= esc_html($intro_title) ?></h1>
            <?php endif; ?>

            <?php if ($intro_description): ?>
                <p><?= esc_html($intro_description) ?></p>
            <?php endif; ?>

            <button class="start-simulador">
                Comece Agora
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                    <path d="M9.46387 11L14.4639 6M14.4639 6L9.46387 0.999999M14.4639 6L0.535297 6" stroke="#002B36" />
                </svg>
            </button>
        </div>

        <?php if ($intro_cards): ?>
            <div class="intro-benefits">
                <?php foreach ($intro_cards as $card): ?>
                    <div class="benefit">
                        <?php if (!empty($card['card_image'])): ?>
                            <img src="<?= esc_url($card['card_image']['url']) ?>"
                                alt="<?= esc_attr($card['card_title'] ?? 'Card Image') ?>">
                        <?php endif; ?>

                        <?php if (!empty($card['card_title'])): ?>
                            <h3><?= esc_html($card['card_title']) ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($card['card_description'])): ?>
                            <p><?= esc_html($card['card_description']) ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</section>
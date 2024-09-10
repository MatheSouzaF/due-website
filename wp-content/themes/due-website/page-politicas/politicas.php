<?php
//Template Name: Privacidade & Termos
get_header();
wp_enqueue_style('privacidade', get_template_directory_uri() . '/assets/dist/css/privacidade/privacidade.css', ['main'], ASSETS_VERSION);

?>
<section class="privacidade-termos">
    <div class="wrapper">

        <h1 class="title-privacidade terminal-test"> <?php echo get_field("titulo_privacidade") ?></h1>
        <div class="description-termos"> <?php echo get_field("descricao_privacidade") ?></div>
    </div>
</section>
<?php get_footer() ?>
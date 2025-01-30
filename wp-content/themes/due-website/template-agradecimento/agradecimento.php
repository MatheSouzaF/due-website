<?php
//Template Name: Agradecimento
wp_enqueue_style('agradecimento', get_template_directory_uri() . '/assets/dist/css/agradecimento/agradecimento.css', ['main'], ASSETS_VERSION);

get_header();
?>
<section class="container-404">
    <div class="wrapper">

        <div class="page-404">
            <h1 class="terminal-test titulo-error">Obrigado pelo seu interesse!</h1><br>
            <p class="founders-grotesk descricao-error">Em alguns instantes, você será direcionado para o whatsapp da DUE Incoporadora.</p>

            <a class="button" href="<?php echo home_url(); ?>">ir para a home</a>
        </div>
    </div>
</section>

<?php
get_footer();
?>
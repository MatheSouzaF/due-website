<?php
wp_enqueue_style('error404', get_template_directory_uri() . '/assets/dist/css/404/404.css', ['main'], ASSETS_VERSION);

get_header();
?>
<section class="container-404">
    <div class="wrapper">

        <div class="page-404">
            <h1 class="terminal-test titulo-error">404</h1>
            <h2 class="subtitulo-error">Página não encontrada</h2>
            <p class="founders-grotesk descricao-error">O URL que você tentou acessar não existe.<br>Verifique o endereço digitado ou volte para nossa Home.</p>
            <a class="button" href="<?php echo home_url(); ?>">ir para a home</a>
        </div>
    </div>
</section>

<?php
get_footer();
?>
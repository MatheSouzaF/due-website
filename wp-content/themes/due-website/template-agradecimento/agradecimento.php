<?php
//Template Name: Agradecimento
wp_enqueue_style('agradecimento', get_template_directory_uri() . '/assets/dist/css/agradecimento/agradecimento.css', ['main'], ASSETS_VERSION);

get_header();
?>
<section class="container-404">
    <div class="wrapper">

        <div class="page-404">
            <h1 class="terminal-test titulo-error">Obrigado pelo seu interesse!</h1><br>
            <p class="founders-grotesk descricao-error">Em breve, um de nossos consultores entrará em contato para te ajudar com o seu próximo investimento.<br><br>Precisa de ajuda agora mesmo?</p>

            <a class="button" href="https://api.whatsapp.com/send?phone=5581989619479" target="_blank">Clique e fale com um especialista</a>
        </div>
    </div>
</section>

<?php
get_footer();
?>
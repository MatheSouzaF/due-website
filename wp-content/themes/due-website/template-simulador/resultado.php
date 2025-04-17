<?php
/**
 * Template para exibir o resultado do simulador
 */
?>

<section class="resultado-simulador">
    <div class="container">
        <div class="resultado-header">
            <i class="logo-due">
                <?php include('wp-content/themes/due-website/assets/src/img/logo-due.svg') ?>
            </i>
            <h1>Obrigado por responder o nosso questionário!</h1>
            <p>Um dos nossos especialistas entrará em contato com você para apresentar a melhor opção DUE para o seu
                investimento.</p>

        </div>

        <div class="resultado-label-wrapper">
            <div class="resultado-label">Resultado do seu perfil</div>
        </div>

        <div class="resultado-lista">
            <h2>Encontramos 3 empreendimentos para o seu perfil:</h2>
            <div class="resultado-cards">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <div class="resultado-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/src/img/exemplo-imovel.jpg"
                            alt="Imagem do Imóvel">
                        <div class="card-content">
                            <h3>Praia do Cupe – PE</h3>
                            <p>Habitá</p>
                            <ul>
                                <li>2 a 6 quartos</li>
                                <li>84 a 230m²</li>
                            </ul>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>
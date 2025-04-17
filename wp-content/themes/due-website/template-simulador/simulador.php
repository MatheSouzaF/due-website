<?php
// Template Name: Simulador

wp_enqueue_style('simulador', get_template_directory_uri() . '/assets/dist/css/simulador/simulador.css', ['main'], ASSETS_VERSION);
wp_enqueue_script('simulador-js', get_template_directory_uri() . '/assets/dist/js/simulador.js', ['jquery'], ASSETS_VERSION, true);

get_header();

// Define os steps do simulador
$steps = [
    [
        'step' => 1,
        'pergunta' => 'Qual é o seu principal objetivo ao investir em imóveis?',
        'name' => 'objetivo',
        'opcoes' => [
            'renda-passiva' => 'Renda Passiva (Aluguéis)',
            'valorizacao' => 'Valorização Patrimonial',
            'diversificacao' => 'Diversificação de Portfólio',
            'outros' => 'Outros'
        ]
    ],
    [
        'step' => 2,
        'pergunta' => 'Qual tipo de imóvel você está buscando?',
        'name' => 'tipo-imovel',
        'opcoes' => [
            '1-pessoa' => 'Para 1 pessoa',
            'casal' => 'Para um casal',
            'familia-pequena' => 'Para uma família pequena',
            'familia-grande' => 'Para uma família grande',
        ]
    ],
    [
        'step' => 3,
        'pergunta' => 'Qual tipo de imóvel melhor atende sua estratégia de investimento?',
        'name' => 'estrategia-investimento',
        'opcoes' => [
            'studio' => 'Studios',
            'apartamento' => 'Apartamentos Padrão',
            'casa' => 'Casas',
            'cobertura' => 'Coberturas',
        ]
    ],
    [
        'step' => 4,
        'pergunta' => 'Qual localização você considera mais estratégica para seu investimento?',
        'name' => 'localizacao',
        'opcoes' => [
            'muro-alto' => 'Muro Alto – PE',
            'praia-cupe' => 'Praia do Cupe – PE',
            'praia-carneiros' => 'Praia dos Carneiros – PE',
            'maragogi' => 'Maragogi – AL',
            'praia-antunes' => 'Praia de Antunes – AL',
            'japaratinga' => 'Japaratinga – AL',
        ]
    ],
    [
        'step' => 5,
        'pergunta' => 'Qual prazo de retorno de investimento você está buscando?',
        'name' => 'prazo-retorno',
        'opcoes' => [
            'curto-prazo' => 'Curto prazo (Revenda rápida)',
            'medio-prazo' => 'Médio prazo (5 a 10 anos)',
            'longo-prazo' => 'Longo prazo (+10 anos)',
        ]
    ],
    [
        'step' => 6,
        'pergunta' => 'Qual faixa você pretende investir?',
        'name' => 'faixa-investimento',
        'opcoes' => [
            'ate-500mil' => 'Até R$ 500 mil',
            '500mil-1milhao' => 'De R$ 500 mil a R$ 1 milhão',
            'acima-1milhao' => 'Acima de R$ 1 milhão',
        ]
    ],
    [
        'step' => 7,
        'pergunta' => 'Estamos quase lá! Para descobrir o seu investimento ideal, insira os dados abaixo: ',
        'name' => 'dados-usuario',
        'opcoes' => []
    ]
];
?>

<?php get_template_part('template-simulador/simulador-intro'); ?>

<div class="simulador-wrapper">
    <section class="header-simulador">
        <i class="logo-due">
            <?php include('wp-content/themes/due-website/assets/src/img/logo-due.svg') ?>
        </i>

        <div class="step-indicator">
            <?php foreach ($steps as $step): ?>
                <?php if ($step['name'] !== 'dados-usuario'): // Ignora o step-dados-usuario ?>
                    <span class="step-circle <?= $step['step'] === 1 ? 'active' : '' ?>"><?= $step['step'] ?></span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="form-section">
        <form id="simuladorForm" action="">
            <?php foreach ($steps as $step): ?>
                <?php
                if ($step['step'] === 7) {
                    get_template_part('template-simulador/step-dados-usuario', null, $step);
                } else {
                    get_template_part('template-simulador/step', null, $step);
                }
                ?>
            <?php endforeach; ?>
        </form>
    </section>
</div>

<?php get_template_part('template-simulador/resultado'); ?>

<?php get_footer(); ?>
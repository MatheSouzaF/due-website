<?php
/**
 * Componente de passo do simulador
 *
 * @param array $args {
 *   @type int    $step         Número do passo.
 *   @type string $pergunta     Título da pergunta.
 *   @type string $name         Nome do grupo de radio.
 *   @type array  $opcoes       Lista de opções ['valor' => 'label'].
 * }
 */

$step = $args['step'] ?? 1;
$pergunta = $args['pergunta'] ?? '';
$name = $args['name'] ?? 'opcao';
$opcoes = $args['opcoes'] ?? [];
$activeClass = $step === 1 ? 'active' : '';
?>

<div class="form-step <?= $activeClass ?>" data-step="<?= esc_attr($step) ?>">
    <p class="step-title"><?= esc_html($pergunta) ?></p>

    <?php foreach ($opcoes as $valor => $label): ?>
        <div class="radio-card">
            <label class="radio-label">
                <input type="radio" name="<?= esc_attr($name) ?>" value="<?= esc_attr($valor) ?>" />
                <span class="custom-radio"></span>
                <?= esc_html($label) ?>
            </label>
        </div>
    <?php endforeach; ?>

    <div class="form-navigation">
        <?php if ($step > 1): ?>
            <button type="button" class="prev-step">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="16" viewBox="0 0 21 16" fill="none">
                    <path d="M8 1L1 8M1 8L8 15M1 8H20.5" stroke="#003B4B" />
                </svg>
                Voltar
            </button>
        <?php endif; ?>

        <button type="button" class="next-step" disabled>Avançar</button>
    </div>
</div>
<?php
/**
 * Último passo do simulador para capturar dados do usuário
 *
 * @param array $args {
 *   @type int    $step     Número do passo.
 *   @type string $pergunta Título da pergunta.
 * }
 */

$step = $args['step'] ?? 1;
$pergunta = $args['pergunta'] ?? '';
?>

<div class="form-step dados-cliente-step" data-step="<?= esc_attr($step) ?>">
    <p class="step-title"><?= esc_html($pergunta) ?></p>

    <div class="input-group">
        <input type="text" id="nome" name="nome" placeholder="Qual o seu nome?" required />
    </div>

    <div class="input-group">
        <input type="tel" id="telefone" name="telefone" placeholder="Qual o seu telefone?" required />
    </div>

    <div class="input-group">
        <input type="email" id="email" name="email" placeholder="Qual o seu email?" required />
    </div>

    <p class="privacy-policy">
        Ao informar meus dados, estou ciente das diretrizes da <a href="/politica-de-privacidade"
            target="_blank">Política de Privacidade</a>.
    </p>

    <div class="form-navigation">
        <button type="submit" class="next-step button-submit">Ver Resultado</button>

        <button class="simulate-submit">Simular Envio</button>
    </div>
</div>
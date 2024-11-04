<?php

/**
 * Classe TipologiaSinglePageController
 * 
 * Esta classe gerencia as tipologias e facilita a interação com os campos ACF.
 */
class TipologiaSinglePageController
{
    private $tipologiaController;

    /**
     * Construtor da classe TipologiaSinglePageController.
     * 
     * Inicializa a classe TipologiaController para acessar os tipologias.
     */
    public function __construct()
    {
        $this->tipologiaController = new TipologiaController();
    }

    /**
     * Carrega os tipologias como opções de seleção para um campo ACF.
     * 
     * Este método é usado em conjunto com um filtro do ACF para preencher um campo de escolha com tipologias.
     * 
     * @param array $field O array do campo ACF sendo carregado.
     * @return array O array do campo atualizado com as escolhas dos tipologias.
     */
    public function loadTipologiaSingleForACF($field)
    {
        // Inicializa o array de escolhas
        $field['choices'] = array();

        // Obtém todos os tipologias disponíveis
        $tipologias = $this->tipologiaController->getTipologiaOptions();

        // Preenche o campo com as escolhas dos tipologias
        foreach ($tipologias as $tipologiaId => $name) {
            $field['choices'][$tipologiaId] = $name;
        }

        return $field; // Retorna o campo atualizado
    }
}


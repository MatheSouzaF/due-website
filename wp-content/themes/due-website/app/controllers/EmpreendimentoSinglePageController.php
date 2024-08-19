<?php

/**
 * Classe EmpreendimentoSinglePageController
 * 
 * Esta classe gerencia as tipologias e facilita a interação com os campos ACF.
 */
class EmpreendimentoSinglePageController
{
    private $empreendimentoController;

    /**
     * Construtor da classe EmpreendimentoSinglePageController.
     * 
     * Inicializa a classe EmpreendimentoController para acessar os empreendimentos.
     */
    public function __construct()
    {
        $this->empreendimentoController = new EmpreendimentoController();
    }

    /**
     * Carrega os empreendimentos como opções de seleção para um campo ACF.
     * 
     * Este método é usado em conjunto com um filtro do ACF para preencher um campo de escolha com empreendimentos.
     * 
     * @param array $field O array do campo ACF sendo carregado.
     * @return array O array do campo atualizado com as escolhas dos empreendimentos.
     */
    public function loadProjectsSingleForACF($field)
    {
        // Inicializa o array de escolhas
        $field['choices'] = array();

        // Obtém todos os empreendimentos disponíveis
        $projects = $this->empreendimentoController->getProjectsOptions();

        // Preenche o campo com as escolhas dos empreendimentos
        foreach ($projects as $projectId => $name) {
            $field['choices'][$projectId] = $name;
        }

        return $field; // Retorna o campo atualizado
    }
}


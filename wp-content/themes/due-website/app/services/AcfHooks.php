<?php

/**
 * Classe ACFIntegration
 * 
 * Esta classe gerencia a integração com o ACF, registrando os hooks necessários.
 */
class ACFIntegration
{
    private $tipologiaController;
    private $empreendimentoSinglePageController;

    /**
     * Construtor da classe ACFIntegration.
     * 
     * Inicializa a classe TipologiaController para permitir o acesso aos empreendimentos.
     */
    public function __construct()
    {
        $this->tipologiaController = new TipologiaController();
        $this->empreendimentoSinglePageController = new EmpreendimentoSinglePageController();
        $this->tipologiaSinglePageController = new TipologiaSinglePageController();
    }

    /**
     * Registra os hooks do WordPress para integrar com o ACF.
     * 
     * Este método conecta os métodos da classe TipologiaController ao ACF, para carregar
     * os dados dos empreendimentos nos campos apropriados.
     */
    public function registerHooks()
    {
        // Registra o filtro para carregar os empreendimentos no campo ACF
        add_filter('acf/load_field/name=pertence_a_qual_empreendimento', [$this->tipologiaController, 'loadProjectsForACF']);
        add_filter('acf/load_field/name=empreendimento_single_page', [$this->empreendimentoSinglePageController, 'loadProjectsSingleForACF']);
        add_filter('acf/load_field/name=empreendimento_tipologia', [$this->empreendimentoSinglePageController, 'loadProjectsSingleForACF']);
        add_filter('acf/load_field/name=tipologia', [$this->tipologiaSinglePageController, 'loadTipologiaSingleForACF']);
    }
}

// Instancia a classe ACFIntegration e registra os hooks do WordPress
$acfIntegration = new ACFIntegration();
$acfIntegration->registerHooks();
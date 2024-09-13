<?php

/**
 * Classe EmpreendimentoRestController
 *
 * Controla as rotas da API REST relacionadas aos empreendimentos.
 */
class EmpreendimentoRestController
{
    private $empreendimentoController;

    /**
     * Construtor da classe EmpreendimentoRestController.
     * 
     * Inicializa a classe EmpreendimentoController para acesso aos dados dos empreendimentos.
     */
    public function __construct()
    {
        $this->empreendimentoController = new EmpreendimentoController();
        add_action('rest_api_init', array($this, 'register_routes'));
    }

    /**
     * Registra as rotas da API REST.
     */
    public function register_routes()
    {
        // Rota para obter todos os empreendimentos
        register_rest_route('v1', '/empreendimentos', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_all_available_projects'),
            'permission_callback' => '__return_true',
        ));

        // Rota para obter um empreendimento específico pelo ID
        register_rest_route('empreendimentos/v1', '/detalhes/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_project_by_id'),
            'permission_callback' => '__return_true',
        ));
    }

    /**
     * Retorna todos os empreendimentos.
     * 
     * Endpoint: /wp-json/empreendimentos/v1/all
     * 
     * @return WP_REST_Response Um array associativo contendo os dados de todos os empreendimentos.
     */
    public function get_all_available_projects()
    {
        $projects = $this->empreendimentoController->getAllAvailableProjects();

        if (!empty($projects)) {
            return new WP_REST_Response($projects, 200);
        } else {
            return new WP_REST_Response(array('message' => 'Nenhum empreendimento encontrado'), 404);
        }
    }

    /**
     * Retorna os detalhes de um empreendimento específico com base no ID.
     * 
     * Endpoint: /wp-json/empreendimentos/v1/detalhes/{id}
     * 
     * @param WP_REST_Request $request Requisição da API contendo o ID do empreendimento.
     * @return WP_REST_Response Um array associativo contendo os detalhes do empreendimento.
     */
    public function get_project_by_id($request)
    {
        $projectId = $request['id'];
        $projectDetails = $this->empreendimentoController->getProjectByID($projectId);

        if ($projectDetails) {
            return new WP_REST_Response($projectDetails, 200);
        } else {
            return new WP_REST_Response(array('message' => 'Empreendimento não encontrado'), 404);
        }
    }
}

// Instancia e registra as rotas da API REST
new EmpreendimentoRestController();

<?php

/**
 * Classe TipologiaRestController
 * 
 * Controla as rotas REST para as tipologias.
 */
class TipologiaRestController
{
    private $tipologiaController;

    /**
     * Construtor da classe TipologiaRestController.
     * 
     * Inicializa a classe TipologiaController para acessar as funcionalidades das tipologias.
     */
    public function __construct()
    {
        $this->tipologiaController = new TipologiaController();
        add_action('rest_api_init', array($this, 'register_routes'));
    }

    /**
     * Registra as rotas da API REST para as tipologias.
     */
    public function register_routes()
    {
        register_rest_route('tipologias/v1', '/all', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_all_tipologias'),
            'permission_callback' => '__return_true',
        ));

        register_rest_route('tipologias/v1', '/detalhes/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_tipologia_by_id'),
            'permission_callback' => '__return_true',
        ));
    }

    /**
     * Manipula a requisição para obter todas as tipologias.
     * 
     * @return WP_REST_Response A resposta REST contendo todas as tipologias.
     */
    public function get_all_tipologias()
    {
        $tipologias = $this->tipologiaController->getTipologiaOptions();

        if (!empty($tipologias)) {
            return new WP_REST_Response($tipologias, 200);
        } else {
            return new WP_REST_Response(array('message' => 'Nenhuma tipologia encontrada'), 404);
        }
    }

    /**
     * Manipula a requisição para obter uma tipologia específica pelo ID.
     * 
     * @param WP_REST_Request $request A requisição REST que contém o ID da tipologia.
     * @return WP_REST_Response A resposta REST contendo os detalhes da tipologia.
     */
    public function get_tipologia_by_id($request)
    {
        $tipologiaId = $request['id'];
        $tipologiaDetails = $this->tipologiaController->getTipologiaByID($tipologiaId);

        if ($tipologiaDetails) {
            return new WP_REST_Response($tipologiaDetails, 200);
        } else {
            return new WP_REST_Response(array('message' => 'Tipologia não encontrada'), 404);
        }
    }
}

// Inicializa o controlador de rotas REST para tipologias
add_action('rest_api_init', function() {
    new TipologiaRestController();
});

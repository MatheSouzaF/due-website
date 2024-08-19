<?php

/**
 * Classe TipologiaController
 * 
 * Esta classe gerencia as tipologias e facilita a interação com os campos ACF.
 */
class TipologiaController
{
    private $empreendimentoController;

    /**
     * Construtor da classe TipologiaController.
     * 
     * Inicializa a classe EmpreendimentoController para acessar os empreendimentos.
     */
    public function __construct()
    {
        $this->empreendimentoController = new EmpreendimentoController();
    }

    /**
     * Obtém todos os dados de um empreendimento específico.
     * 
     * @return array Um array associativo contendo as informações de um único empreendimento.
     */
    public function getTipologiaByID($tipologiaId)
    {
        // Define os argumentos para a consulta de um único empreendimento pelo ID
        $args = array(
            'post_type' => 'tipologias',
            'post__in' => array($tipologiaId), // Busca apenas pelo ID fornecido
            'post_status' => 'publish' // Apenas posts publicados
        );

        // Executa a consulta
        $query = new WP_Query($args);

        $tipologia = null; // Variável para armazenar o projeto encontrado

        // Se houver posts, percorre todos eles
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                // Obtém os campos ACF
                $name = get_field('nome_da_tipologia');
                $project = get_field('pertence_a_qual_empreendimento');
                $location = get_field('localizacao');
                $status = get_field('estagio_da_obra');
                $isStudio = get_field('e_um_studio');
                $rooms = get_field('quantidade_de_quartos');
                $size = get_field('metragem');
                $diffs = get_field('diferenciais');
                $photo = get_field('foto_empreendimento');

                // Adiciona os dados ao array de projeto
                $tipologia = array(
                    'ID' => $tipologiaId,
                    'name' => $name,
                    'project' => $project,
                    'location' => $location,
                    'isStudio' => $isStudio,
                    'rooms' => $rooms,
                    'size' => $size,
                    'status' => $status,
                    'diffs' => $diffs,
                    'photo' => $photo,
                );
            }
            wp_reset_postdata(); // Reseta os dados globais do post
        }

        return $tipologia; // Retorna o projeto encontrado
    }

    /**
     * Carrega os empreendimentos como opções de seleção para um campo ACF.
     * 
     * Este método é usado em conjunto com um filtro do ACF para preencher um campo de escolha com empreendimentos.
     * 
     * @param array $field O array do campo ACF sendo carregado.
     * @return array O array do campo atualizado com as escolhas dos empreendimentos.
     */
    public function loadProjectsForACF($field)
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

    /**
     * Obtém o nome e ID de todos os tipologias disponíveis.
     * 
     * @return array Um array associativo contendo os IDs e nomes de todos os tipologias.
     */
    public function getTipologiaOptions()
    {
        $projects = [];

        // Define os argumentos para a consulta de tipologias
        $args = array(
            'post_type' => 'tipologias',
            'posts_per_page' => -1, // Obtém todos os posts
            'post_status' => 'publish' // Apenas posts publicados
        );

        // Executa a consulta
        $query = new WP_Query($args);

        // Se houver posts, percorre todos eles
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                // Obtém o nome do empreendimento e o ID do post
                $name = get_field('nome_da_tipologia');
                $projectId = get_the_ID();

                // Se o nome não estiver vazio, adiciona-o ao array de tipologias
                if (!empty($name)) {
                    $projects[$projectId] = $name;
                }
            }
            wp_reset_postdata(); // Reseta os dados globais do post
        }

        return $projects; // Retorna o array de tipologias
    }
}


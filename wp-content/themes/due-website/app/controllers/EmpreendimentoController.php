<?php

/**
 * Classe EmpreendimentoController
 * 
 * Esta classe gerencia os empreendimentos, facilitando o acesso a seus detalhes
 * e oferecendo métodos para listar todos os empreendimentos disponíveis.
 */
class EmpreendimentoController
{
    private $projectDetails;

    /**
     * Construtor da classe EmpreendimentoController.
     * 
     * Inicializa a classe ProjectDetails para permitir o acesso aos dados dos empreendimentos.
     */
    public function __construct()
    {
        $this->projectDetails = new ProjectDetails();
    }

    /**
     * Obtém todos os detalhes de um empreendimento com base no ID.
     * 
     * @param int $projectId ID do post do empreendimento.
     * @return array Um array associativo contendo todos os campos e seus valores.
     */
    public function getProjectDetailsById($projectId)
    {
        return $this->projectDetails->getAllDetails($projectId);
    }

    /**
     * Obtém um campo específico de um empreendimento.
     * 
     * @param int $projectId ID do post do empreendimento.
     * @param string $fieldName Nome do campo ACF que se deseja obter.
     * @return mixed O valor do campo solicitado.
     */
    public function getSpecificField($projectId, $fieldName)
    {
        return $this->projectDetails->getField($fieldName, $projectId);
    }

    /**
     * Obtém todos os dados de todos os empreendimentos disponíveis.
     * 
     * @return array Um array associativo contendo as informações de todos os empreendimentos.
     */
    public function getAllProjects()
    {
        $projects = [];

        // Define os argumentos para a consulta de empreendimentos
        $args = array(
            'post_type' => 'empreendimentos',
            'posts_per_page' => -1, // Obtém todos os posts
            'post_status' => 'publish' // Apenas posts publicados
        );

        // Executa a consulta
        $query = new WP_Query($args);

        // Se houver posts, percorre todos eles
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                // Obtém o ID do post
                $projectId = get_the_ID();

                // Obtém os campos ACF
                $name = get_field('empreendimento_nome');
                $location = get_field('localizacao_emprendimento');
                $isStudio = get_field('e_um_studio');
                $rooms = get_field('quantidade_de_quartos');
                $status = get_field('estagio_da_obra');
                $offer = get_field('oferta');
                $photo = get_field('foto_empreendimento');
                $video = get_field('video_empreendimento');

                // Adiciona os dados ao array de projetos
                $projects[] = array(
                    'ID' => $projectId,
                    'name' => $name,
                    'location' => $location,
                    'isStudio' => $isStudio,
                    'rooms' => $rooms,
                    'status' => $status,
                    'offer' => $offer,
                    'photo' => $photo,
                    'video' => $video
                );
            }
            wp_reset_postdata(); // Reseta os dados globais do post
        }

        return $projects; // Retorna o array de empreendimentos
    }

    /**
     * Obtém todos os dados de um empreendimento específico.
     * 
     * @return array Um array associativo contendo as informações de um único empreendimento.
     */
    public function getProjectByID($projectId)
    {
        // Define os argumentos para a consulta de um único empreendimento pelo ID
        $args = array(
            'post_type' => 'empreendimentos',
            'post__in' => array($projectId), // Busca apenas pelo ID fornecido
            'post_status' => 'publish' // Apenas posts publicados
        );

        // Executa a consulta
        $query = new WP_Query($args);

        $project = null; // Variável para armazenar o projeto encontrado

        // Se houver posts, percorre todos eles
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                // Obtém os campos ACF
                $name = get_field('empreendimento_nome');
                $location = get_field('localizacao_emprendimento');
                $isStudio = get_field('e_um_studio');
                $rooms = get_field('quantidade_de_quartos');
                $status = get_field('estagio_da_obra');
                $offer = get_field('oferta');
                $photo = get_field('foto_empreendimento');
                $video = get_field('video_empreendimento');

                // Adiciona os dados ao array de projeto
                $project = array(
                    'ID' => $projectId,
                    'name' => $name,
                    'location' => $location,
                    'isStudio' => $isStudio,
                    'rooms' => $rooms,
                    'status' => $status,
                    'offer' => $offer,
                    'photo' => $photo,
                    'video' => $video
                );
            }
            wp_reset_postdata(); // Reseta os dados globais do post
        }

        return $project; // Retorna o projeto encontrado
    }

    /**
     * Obtém o nome e ID de todos os empreendimentos disponíveis.
     * 
     * @return array Um array associativo contendo os IDs e nomes de todos os empreendimentos.
     */
    public function getProjectsOptions()
    {
        $projects = [];

        // Define os argumentos para a consulta de empreendimentos
        $args = array(
            'post_type' => 'empreendimentos',
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
                $name = get_field('empreendimento_nome');
                $projectId = get_the_ID();

                // Se o nome não estiver vazio, adiciona-o ao array de empreendimentos
                if (!empty($name)) {
                    $projects[$projectId] = $name;
                }
            }
            wp_reset_postdata(); // Reseta os dados globais do post
        }

        return $projects; // Retorna o array de empreendimentos
    }
}


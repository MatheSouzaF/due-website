<?php

class ProjectDetails
{
    public function getLocation($projectId)
    {
        return get_field('localizacao_emprendimento', $projectId);
    }

    public function getConstructionStage($projectId)
    {
        return get_field('estagio_da_obra', $projectId);
    }
}

class ProjectsController
{
    private $projectDetails;

    public function __construct()
    {
        $this->projectDetails = new ProjectDetails();
    }

    public function loadProjectsForACF($field)
    {
        $field['choices'] = array();

        $args = array(
            'post_type' => 'empreendimentos',
            'posts_per_page' => -1, // Get all posts
            'post_status' => 'publish' // Only published posts
        );
        
        $projects = new WP_Query($args);

        if ($projects->have_posts()) {
            while ($projects->have_posts()) {
                $projects->the_post();

                $name = get_field('empreendimento_nome');

                if (!empty($name)) {
                    $field['choices'][$name] = $name;
                }
            }
            wp_reset_postdata();
        }

        return $field;
    }

    public function getProjectDetailsById($projectId)
    {
        return [
            'location' => $this->projectDetails->getLocation($projectId),
            'construction_stage' => $this->projectDetails->getConstructionStage($projectId),
        ];
    }
}

class ACFIntegration
{
    private $projectsController;

    public function __construct()
    {
        $this->projectsController = new ProjectsController();
    }

    public function registerHooks()
    {
        add_filter('acf/load_field/name=pertence_a_qual_empreendimento', [$this->projectsController, 'loadProjectsForACF']);
        add_action('acf/save_post', [$this, 'saveProjectDetails']);
    }

    public function saveProjectDetails($postId)
    {
        $projectId = $_POST['acf']['pertence_a_qual_empreendimento'];
        $details = $this->projectsController->getProjectDetailsById($projectId);

        if (!empty($details)) {
            update_field('localizacao', $details['location'], $postId);
            update_field('estagio_da_obra', $details['construction_stage'], $postId);
        }
    }
}

// Instance of the class
$acfIntegration = new ACFIntegration();
$acfIntegration->registerHooks();

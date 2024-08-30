<?php 
function ajax_get_project_by_id() {
  if (isset($_POST['project_id'])) {
      $projectId = intval($_POST['project_id']);

      $project = new EmpreendimentoController();
      
      $project = $project->getProjectByID($projectId);

      if ($project) {
          wp_send_json_success($project);
      } else {
          wp_send_json_error('Projeto não encontrado');
      }
  } else {
      wp_send_json_error('ID do projeto não fornecido');
  }
  wp_die();
}

function ajax_get_tipologia_by_id() {
  if (isset($_POST['tipologia_id'])) {
      $tipologiaId = intval($_POST['tipologia_id']);

      $tipologia = new TipologiaController();
      
      $tipologia = $tipologia->getTipologiaByID($tipologiaId);

      if ($tipologia) {
          wp_send_json_success($tipologia);
      } else {
          wp_send_json_error('Projeto não encontrado');
      }
  } else {
      wp_send_json_error('ID do projeto não fornecido');
  }
  wp_die();
}

function ajax_get_tipologias_by_empreendimento() {
    if (isset($_POST['empreendimento_name'])) {
        $empreendimentoName = intval($_POST['empreendimento_name']);

        $tipologiaController = new TipologiaController();
        
        $tipologias = $tipologiaController->getTipologiasByEmpreendimentoID($empreendimentoName);

        if ($tipologias) {
            wp_send_json_success($tipologias);
        } else {
            wp_send_json_error('Nenhuma tipologia encontrada para esse empreendimento');
        }
    } else {
        wp_send_json_error('ID do empreendimento não fornecido');
    }
    wp_die();
}

add_action('wp_ajax_get_project_by_id', 'ajax_get_project_by_id');
add_action('wp_ajax_get_tipologia_by_id', 'ajax_get_tipologia_by_id');
add_action('wp_ajax_get_tipologias_by_empreendimento', 'ajax_get_tipologias_by_empreendimento');

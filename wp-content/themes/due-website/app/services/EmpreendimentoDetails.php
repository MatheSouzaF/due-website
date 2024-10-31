<?php

/**
 * Classe ProjectDetails
 * 
 * Esta classe é responsável por fornecer detalhes de um empreendimento específico.
 * Pode retornar campos específicos ou todos os detalhes associados a um empreendimento.
 */
class ProjectDetails
{
    /**
     * Retorna o valor de um campo ACF específico de um empreendimento.
     * 
     * @param string $fieldName Nome do campo ACF que se deseja obter.
     * @param int $projectId ID do post do empreendimento.
     * @return mixed O valor do campo solicitado.
     */
    public function getField($fieldName, $projectId)
    {
        return get_field($fieldName, $projectId);
    }

    /**
     * Retorna todos os campos personalizados ACF de um empreendimento.
     * 
     * @param int $projectId ID do post do empreendimento.
     * @return array Um array associativo contendo todos os campos e seus valores.
     */
    public function getAllDetails($projectId)
    {
        $fields = get_fields($projectId);
        return $fields ? $fields : []; // Se não houver campos, retorna um array vazio
    }
}


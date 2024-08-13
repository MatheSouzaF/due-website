<?php

function acf_load_empreendimentos_field_choices($field)
{
	$field['pertence_a_qual_empreendimento'] = array();

	$choices = get_field('empreendimento_nome', 'option', false);

	$choices = explode("\n", $choices);

	$choices = array_map('trim', $choices);

	if (is_array($choices)) {

		foreach ($choices as $choice) {

			$field['pertence_a_qual_empreendimento'][$choice] = $choice;
		}
	}

	return $field;
}

add_filter('acf/load_field/name=pertence_a_qual_empreendimento', 'acf_load_empreendimentos_field_choices');
jQuery(document).ready(function ($) {
    $('select[name="acf[field_66b18b1766cb9]"').on('change', function () {
        var projectId = $(this).val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_project_by_id',
                project_id: projectId
            },
            success: function (response) {
                if (response.success) {
                    $('input[name="acf[field_66bbadb89514b]"]').val(response.data.location);
                    $('input[name="acf[field_66bbb17e285fa]"]').val(response.data.status);
                }
            }
        });
    });

    $('select[name="acf[field_66c0d4ddca8c7]"').on('change', function () {
        var projectId = $(this).val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_project_by_id',
                project_id: projectId
            },
            success: function (response) {
                if (response.success) {
                    var minRooms = response.data.rooms[0].minimo_de_quartos
                    var maxRooms = response.data.rooms[0].maximo_de_quartos

                    var minSize = response.data.size[0].metragem_minima
                    var maxSize = response.data.size[0].metragem_maxima

                    //Localização
                    $('input[name="acf[field_66c0d5e5ca8c9]"]').val(response.data.location);

                    // Quantidade de quartos
                    $('input[name="acf[field_66c0d5f4ca8ca]"]').val(minRooms + ' a ' + maxRooms + ' qtos');

                    //Metragem
                    $('input[name="acf[field_66c0d608ca8cb]"]').val(minSize + ' a ' + maxSize + 'm²');
                }
            }
        });
    });

    $('select[name="acf[field_66c23ba4e141f]"').on('input', function () {
        var tipologiaId = $(this).val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_tipologia_by_id',
                tipologia_id: tipologiaId
            },
            success: function (response) {
                if (response.success) {
                    var minRooms = response.data.rooms[0].minimo_de_quartos_tipologia
                    var maxRooms = response.data.rooms[0].maximo_de_quartos_tipologia

                    var minSize = response.data.size[0].metragem_minima_tipologia
                    var maxSize = response.data.size[0].metragem_maxima_tipologia

                    //Empreendimento
                    $('input[name="acf[field_66c23bf0e1421]"]').val(response.data.project);

                    //Localização
                    $('input[name="acf[field_66c23c09e1422]"]').val(response.data.location);

                    // Quantidade de quartos
                    $('input[name="acf[field_66c23c37e1424]"]').val(minRooms + ' a ' + maxRooms + ' qtos');

                    //Metragem
                    $('input[name="acf[field_66c23c3fe1425]"]').val(minSize + ' a ' + maxSize + 'm²');
                }
            }
        });
    });

    // [Singlepage da Tipologia] Seletor para buscar as tipologias do empreendimento selecionado 
    $('select[name="acf[field_66d1f9caec8ba]"]').on('change', function () {
        var empreendimentoNome = $(this).find("option:selected").text();
    
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'get_tipologias_by_empreendimento',
                empreendimento_name: empreendimentoNome
            },
            success: function (response) {
                if (response.success) {
                    var tipologias = response.data;
    
                    // Atualiza o campo ACF com as novas opções
                    var selectField = $('select[name="acf[field_66c23ba4e141f]"]');
                    selectField.empty(); // Limpa as opções existentes
                    selectField.append($('<option>', {
                        value: undefined,
                        text: '- Selecionar -',
                        selected: true
                    }));
    
                    $.each(tipologias, function (id, tipologia) {
                        console.log("🚀 ~ name:", tipologia.name)
                        selectField.append($('<option>', {
                            value: tipologia.id,
                            text: tipologia.name
                        }));
                    });
                } else {
                    console.error('Erro ao obter tipologias:', response.data);
                }
            },
            error: function () {
                console.error('Erro na requisição AJAX');
            }
        });
    });
});

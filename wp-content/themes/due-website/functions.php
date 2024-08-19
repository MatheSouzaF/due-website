<?php

// CPT
include('app/models/Empreendimento.php');
include('app/models/SingleEmpreendimento.php');
include('app/models/Tipologia.php');
include('app/models/SingleTipologia.php');

include('app/controllers/EmpreendimentoController.php');
include('app/controllers/TipologiaController.php');
include('app/controllers/EmpreendimentoSinglePageController.php');
include('app/controllers/TipologiaSinglePageController.php');

include('app/services/EmpreendimentoDetails.php');
include('app/services/AcfHooks.php');
include('app/services/InjectScripts.php');

include('app/states/AjaxMethods.php');

// CONFIG
include('configure/configure.php');

// JAVASCRIPT & CSS
include('configure/js-css.php');

// SHORTCODES
include('configure/shortcodes.php');

// ACF
include('configure/acf.php');

// HOOKS ADMIN
if (is_admin()) {
	include('configure/admin.php');
}

<?php

// CPT
include('app/models/empreendimento.php');
include('app/models/tipologia.php');
include('app/controllers/empreendimento-controller.php');
include('app/controllers/tipologia-controller.php');

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

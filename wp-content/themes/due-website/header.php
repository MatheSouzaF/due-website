<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
	
</head>

<?php
function generate_menu_links()
{
	if (have_rows('links_menu', 'options')) {
		$total_rows = count(get_field('links_menu', 'options'));
		$counter = 1;

		while (have_rows('links_menu', 'options')) {
			the_row();

			$link = get_sub_field('link', 'options');

			if ($link) {
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';

				$id = strtolower(str_replace(' ', '-', $link_title));

				$class = $counter === $total_rows ? 'btn-menu-navlink last-item' : 'btn-menu-navlink';

				if (!empty($link_url) && !empty($link_title)) {
					echo '<li id="' . esc_attr($id) . '" class="' . esc_attr($class) . '"><a class="button-menu" href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">' . esc_html($link_title) . '</a></li>';
				}
			}
			$counter++;
		}
	}
}
?>


<?php
function generate_navbar()
{
	echo '<div class="box-navbar-numeros">';

	if (have_rows('numeros_repetidor', 'options')) {
		while (have_rows('numeros_repetidor', 'options')) {
			the_row();

			$link = get_sub_field('numeros_menu_lateral', 'options');

			if ($link) {
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';

				// Adicione qualquer condição adicional necessária aqui
				if (!empty($link_url) && !empty($link_title)) {
					echo '<li class="link-numero">';
					echo '<a class="button-menu-numero" href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">';

					// Adiciona o SVG dentro do link
					$svg_file = get_sub_field('svg_numeros', 'options');
					if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
						echo '<i class="element">';
						echo file_get_contents($svg_file['url']);
						echo '</i>';
					}

					echo esc_html($link_title);
					echo '</a>';
					echo '</li>';
				}
			}
		}
	}
	echo '</div>';

	echo '<div class="box-navbar-menu">';

	if (have_rows('link_navbar', 'options')) {
		while (have_rows('link_navbar', 'options')) {
			the_row();

			$link = get_sub_field('link_navbar_menu', 'options');

			if ($link) {
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';

				// Adicione qualquer condição adicional necessária aqui
				if (!empty($link_url) && !empty($link_title)) {
					echo '<li class="links-menu"><a class="button-menu" href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">' . esc_html($link_title) . '</a></li>';
				}
			}
		}
	}
	echo '</div>';

	echo '<div class="box-opcionais">';
	if (have_rows('link_navbar_opcionais', 'options')) {
		while (have_rows('link_navbar_opcionais', 'options')) {
			the_row();

			$link = get_sub_field('link_opcionais', 'options');

			if ($link) {
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';

				// Adicione qualquer condição adicional necessária aqui
				if (!empty($link_url) && !empty($link_title)) {
					echo '<li class=""><a class="button-menu" href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">' . esc_html($link_title) . '</a></li>';
				}
			}
		}
	}
	echo '</div>';

	echo '<div class="box-navbar-redes-sociais">';
	echo '<div class="box-redes">';

	if (have_rows('repetidor_rede_sociais', 'options')) {
		while (have_rows('repetidor_rede_sociais', 'options')) {
			the_row();

			$link = get_sub_field('link_rede_sociais', 'options');

			if ($link) {
				$link_url = $link['url'];
				$link_target = $link['target'] ? $link['target'] : '_self';

				if (!empty($link_url)) {
					echo '<li class="link-numero">';
					echo '<a class="button-menu-numero" href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">';

					$svg_file = get_sub_field('svg_rede_sociais', 'options');
					if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
						echo '<i class="element">';
						echo file_get_contents($svg_file['url']);
						echo '</i>';
					}

					echo '</a>';
					echo '</li>';
				}
			}
		}
	}
	echo '</div>';
	$descubra = get_field('botao_label_newsletter', 'options');
	echo '<p class="receba-novidades">';
	echo $descubra;
	echo '</p>';
	echo '</div>';
}
?>


<body <?php body_class(""); ?>>
	<main class="main">
		<div class="mask-sidebar"></div>
		<header class="header" id="fixed-header">
			<nav class="box-navbar">
				<a class="link-logo-menu" href="<?php echo esc_url(home_url('/')); ?>">
					<div class="box-svg-header">
						<?php $svg_file = get_field('svg_logo', 'options');
						if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
							echo file_get_contents($svg_file['url']);
						} ?>
					</div>
				</a>
				<div class="box-sidebar">

					<ul class="navlinks">
						<?php generate_menu_links(); ?>
					</ul>
					<label for="menu-toggle" id="btn-navbar" class="navigation__menu-label">
						<span class="navigation__label-bar navigation__label-bar1 "></span>
						<span class="navigation__label-bar navigation__label-bar3"></span>
					</label>

					<ul class="sidebar">
						<?php generate_navbar(); ?>
					</ul>

				</div>


			</nav>
		</header>
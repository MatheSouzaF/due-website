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
					echo '<li class=""><a class="button-menu" href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">' . esc_html($link_title) . '</a></li>';
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
			<div class="box-video-destinos">
				<?php
				if (have_rows('videos_destino', 'options')) :
					while (have_rows('videos_destino', 'options')) : the_row(); ?>
						<?php
						$link = get_sub_field('link_descubra', 'options');
						if ($link) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self'; ?>
							<a class="row-videos" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<div class="box-imagem-destino">

									<?php
									$image = get_sub_field('imagem_background', 'options');
									if ($image) :
										$image_url = $image['url'];
										$image_alt = $image['alt']; ?>
										<img class="imagem-background" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
									<?php endif; ?>
								</div>
								<div class="box-conteudo">
									<div class="box-svg">
										<?php $svg_file = get_sub_field('svg_destino', 'options');
										if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
											echo '<i class="element">';
											echo file_get_contents($svg_file['url']);
											echo '</i>';
										} ?>
									</div>
									<h3 class="titulo-videos-destinos founders-grotesk"><?php echo get_sub_field('titulo_video_destino', 'options'); ?></h3>
									<p class="subtitulo-videos-destinos terminal-test"><?php echo get_sub_field('subtitulo_video_destino', 'options'); ?></p>

									<p class="text-link"><?php echo esc_html($link_title); ?></p>

								</div>
								<div class="box-cards-praia">
									<?php
									if (have_rows('cards_premios','options')) :
										$counter = 1;
										while (have_rows('cards_premios','options')) : the_row();
											$extra_class = ($counter === 2) ? 'bg-blue' : '';
									?>
											<div class="box-infos-cards <?php echo $extra_class; ?>">
												<p class="founders-grotesk titulo-infos-praia"><?php echo get_sub_field('titulo_card'); ?></p>
												<p class="founders-grotesk premio-infos-praia"><?php echo get_sub_field('titulo_premio'); ?></p>
											</div>
									<?php
											$counter++;
										endwhile;
									endif;
									?>
								</div>
							</a>
						<?php endif; ?>
				<?php endwhile;
				endif; ?>
			</div>
		</header>
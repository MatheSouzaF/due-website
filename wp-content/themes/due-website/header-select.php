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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

</head>

<body <?php body_class(""); ?>>
	<header class="header-select">
		<div class="box-svg">
			<?php $svg_file = get_field('logo_header', 'options');
			if ($svg_file && pathinfo($svg_file['url'], PATHINFO_EXTENSION) === 'svg') {
				echo '<i class="element">';
				echo file_get_contents($svg_file['url']);
				echo '</i>';
			} ?>
		</div>
		<?php
		$link = get_field('link_menu_select', 'options');
		if ($link) :
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self'; ?>
			<a class="link-due" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
				<p class="terminal-test"><?php echo esc_html($link_title); ?></p>
			</a>
		<?php endif; ?>
	</header>
	<main class="main">
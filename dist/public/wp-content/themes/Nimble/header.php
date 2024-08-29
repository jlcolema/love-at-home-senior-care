<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php elegant_titles(); ?></title>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action('et_head_meta'); ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55657237-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body <?php body_class(); ?>>

	<div id="pre-header">

		<div class="container">

			<div class="group">

				<div class="tel">

					<span>(509-474-0663)</span>

				</div>

				<div class="AP-Book">

					<span>Book Free Assessment</span>

				</div>

			</div>

		</div>

	</div>

	<?php do_action('et_header_top'); ?>

	<header id="main-header">
		<div class="container">
			<div id="top-area" class="clearfix">
				<?php $logo = ( ( $user_logo = et_get_option('nimble_logo') ) && '' != $user_logo ) ? $user_logo : get_template_directory_uri() . "/images/logo.png"; ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo"/></a>

				<?php do_action('et_header_menu'); ?>

				<nav id="top-menu">
					<?php
						$menuClass = 'nav';
						$primaryNav = '';

						if ( 'on' == et_get_option( 'nimble_disable_toptier' ) ) $menuClass .= ' et_disable_top_tier';

						$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );

						if ( '' == $primaryNav ) { ?>
							<ul class="<?php echo esc_attr( $menuClass ); ?>">
								<?php if ( 'on' == et_get_option( 'nimble_home_link' ) ) { ?>
									<li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e('Home','Nimble') ?></a></li>
								<?php } ?>

								<?php show_page_menu( $menuClass, false, false ); ?>
								<?php show_categories_menu( $menuClass, false ); ?>
							</ul>
					<?php }
						else echo($primaryNav);
					?>
				</nav>
			</div> <!-- end #top-area -->

			<?php if ( ! is_home() ) get_template_part( 'includes/top_info' ); ?>
		</div> <!-- end .container -->

		<?php if ( 'on' == et_get_option( 'nimble_featured', 'on' ) && is_home() ) get_template_part( 'includes/featured', 'home' ); ?>

		<?php if ( ! is_home() ) get_template_part( 'includes/breadcrumbs' ); ?>

	</header> <!-- end #main-header -->
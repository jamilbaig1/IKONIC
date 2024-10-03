<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ikonic_test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ikonic-test' ); ?></a>

	<div id="masthead" class="site-header">
		<div class="logo-header">
<?php
			
	if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
} else {
?>
	<h1 class="site-title-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php
}
?>
		</div><!-- .site-branding -->

<nav class="navbar navbar-expand-lg navbar-light header-nav">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'depth' => 2,
                'container' => false,
                'menu_class' => 'navbar-nav d-lg-flex flex-lg-row', // Flex for larger screens
                'walker' => new Bootstrap_NavWalker(),
            ));
            ?>
        </div>

        <!-- Mobile Menu Container -->
        <div class="mobile-menu" id="mobileMenu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'depth' => 2,
                'container' => false,
                'menu_class' => 'mobile-menu-items',
                'walker' => new Bootstrap_NavWalker(),
            ));
            ?>
        </div>
    </div>
</nav>




	</div><!-- #masthead -->

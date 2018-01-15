<?php

function add_my_js() {
	wp_enqueue_style("bootsrap", get_stylesheet_directory_uri() . "/css/bootstrap/bootstrap.min.css");
	wp_enqueue_script('bootsrap-bundle', get_stylesheet_directory_uri() . '/css/bootstrap/bootstrap.bundle.min.js');

    wp_enqueue_script('index_js', get_stylesheet_directory_uri() . '/js/index.js');
    return;
}
add_action( 'wp_enqueue_scripts', 'add_my_js' );

//function override_storefront_functions() {
//	add_action("override_product_search", "storefront_product_search");
//}
//add_action("override_storefront", "override_storefront_functions");

if ( ! function_exists( 'storefront_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_primary_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location'	=> 'primary',
					'container_class'	=> 'primary-navigation',
				)
			);

			wp_nav_menu(
				array(
					'theme_location'	=> 'handheld',
					'container_class'	=> 'handheld-navigation',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'storefront_primary_navigation_collapse_button' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_primary_navigation_collapse_button() {
		?>
		<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span><?php echo esc_attr( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span></button>
		<?php
	}
}
add_action("iconshop_primary_navigation_collapse_button", "storefront_primary_navigation_collapse_button");



add_action("iconshop_site_branding", "storefront_site_branding");
add_action("iconshop_product_search", "storefront_product_search");
add_action("iconshop_primary_navigation", "storefront_primary_navigation");
add_action("iconshop_header_cart", "storefront_header_cart");




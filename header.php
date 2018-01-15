<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

    <div class="top-menu-accent"></div>


    <div class="top-menu-stripe d-none d-md-block">
        <div class="container">
            <div id="tim-top-menu" class="row">
                <div class="col-5">
                    <div class="phones">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span class="phone-number-1">+7(978)726-44-08</span>
                        <span class="phone-number-2">+7(978)699-23-07</span>
                    </div>
                </div>
                <div class="col-7">
                    <ul class="top-menu nav pull-right">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url() . "/about/"; ?>">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url() . "/dostavka/"; ?>">Доставка</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url() . "/oplata/"; ?>">Оплата</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url() . "/contacts/"; ?>">Контакты</a>
                        </li>
						<?php if ( is_user_logged_in() ): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    &nbsp;Аккаунт
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo site_url() . "/my-account/"; ?>">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                        &nbsp;Кабинет
                                    </a>
                                    <a class="dropdown-item" href="<?php echo site_url() . "/cart/"; ?>">
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                        &nbsp;Корзина
                                    </a>
                                    <a class="dropdown-item" href="<?php echo wp_logout_url( home_url() ); ?>">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        &nbsp;Выход
                                    </a>
                                </div>
                            </li>
						<?php else: ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    &nbsp;Войти
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo wp_login_url(); ?>"
                                       title="Login">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                        &nbsp;Вход
                                    </a>
                                    <a class="dropdown-item" href="<?php echo wp_registration_url(); ?>">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        &nbsp;Регистрация
                                    </a>
                                </div>
                            </li>
						<?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
	                <?php do_action("iconshop_site_branding"); ?>
                </div>
                <div class="col-6 col-md-5 col-lg-6 d-none d-md-block"></div>
                <div class="col-6 col-sm-6 col-md-3">
                    <?php do_action("iconshop_product_search"); ?>
                    <?php do_action("iconshop_primary_navigation_collapse_button"); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
	                <?php do_action("iconshop_primary_navigation"); ?>
                </div>
                <div class="col-3 d-none d-sm-block">
	                <?php do_action("iconshop_header_cart"); ?>
                </div>
            </div>
        </div>
    </header>


    <div id="content" class="site-content" tabindex="-1">
        <div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_content_top
			 *
			 * @hooked woocommerce_breadcrumb - 10
			 */
			do_action( 'storefront_content_top' ); ?>



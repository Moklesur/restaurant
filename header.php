<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeTim_WordPress_Framework
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="themetim-loading animsition">
	<header class="header full-width">
		<!--------------- Header Bottom ---------------->
		<section class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<!--------------- Primary Menu ---------------->
						<nav class="navbar navbar-default primary-menu">
							<div class="pull-left logo">
								<?php
								if (get_theme_mod('site_logo') != '') : ?>
									<a href="<?php echo site_url('/'); ?>"><img src="<?php echo get_theme_mod('site_logo'); ?>" class="img-responsive" alt="" /></a>
								<?php else : ?>
									<h2 class="site-title margin-null"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'description' ); ?></a></p>
								<?php endif ?>
							</div>
							<div class="navbar-header">
								<button type="button" data-toggle="collapse" data-target="#navbar-collapse" class="navbar-toggle">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="pull-right text-right search-cart">
								<ul class="list-inline margin-null">
									<?php
									if ( class_exists( 'WooCommerce' ) ) {
									do_action('themetim_header_account');
									}
									if(get_theme_mod('bottom_header_search', '1')): ?>
										<li class="dropdown">
											<a data-toggle="dropdown" class="search-border" href="#" aria-expanded="true"><i class="fa fa-search"></i></a>
											<form role="search" method="get" class="navbar-form dropdown-menu search-fix" action="<?php echo home_url( '/' ); ?>">
												<input type="search" class="search-field form-control"
													   placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
													   value="<?php echo get_search_query() ?>" name="s" />
												<button type="submit" class="btn btn-primary"><i class="fa fa-long-arrow-right"></i></button>
											</form>
										</li>
									<?php endif ;
									if ( class_exists( 'WooCommerce' ) ) : if(get_theme_mod( 'cart_enable', '1' )) :
										?>
										<li class="padding-null mini-cart">
											<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-basket"></i></a>
										</li>
										<?php
									endif; endif;
									?>
								</ul>
							</div>
							<div id="navbar-collapse" class="navbar-collapse collapse pull-right padding-null text-capitalize">
								<?php
								if ( has_nav_menu( 'primary' ) ) :
									wp_nav_menu( array('menu' => 'primary', 'theme_location' => 'primary', 'depth'             => 5, 'container'         => '', 'menu_id' => 'primary-menu', 'container_class'   => 'collapse navbar-collapse', 'container_id' => 'bs-example-navbar-collapse-1', 'menu_class'        => 'nav navbar-nav', 'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 'walker' => new wp_bootstrap_navwalker()));
								else: echo '<p class="margin-top-10 pull-left text-capitalize">Please select <a href="/wp-admin/nav-menus.php" class="text-muted">Primary Menu</a> </p>';
								endif;
								?>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</section>
	</header>
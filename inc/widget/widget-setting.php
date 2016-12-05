<?php

/**
 * ThemeTim Widget Settings
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/widget/recent-products/recent-products.php';
    require get_template_directory() . '/inc/widget/featured-products/featured-products.php';
    require get_template_directory() . '/inc/widget/product-category/product-category.php';
    require get_template_directory() . '/inc/widget/categories-list/categories-list.php';
    require get_template_directory() . '/inc/widget/sale-products/sale-products.php';
    require get_template_directory() . '/inc/widget/best-selling-products/best-selling-products.php';
    require get_template_directory() . '/inc/widget/top-rated-products/top-rated-products.php';
}
require get_template_directory() . '/inc/widget/heading/heading.php';

/**
 * Load Theme SiteOrigin Widgets.
 */
if ( class_exists( 'SiteOrigin_Widget' ) ) {
    require get_template_directory() . '/inc/widget/menu/menu.php';
}
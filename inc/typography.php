<?php

/**
 * ThemeTim Typography & Color Settings
 *
 */

function themetim_typography_color($color) {

    wp_enqueue_style(
        'themetim',
        get_template_directory_uri() . '/assets/css/themetim.css'
    );

    $color = '';

    /*
     * General Section
     */
    $body_text_color = get_theme_mod( 'bg_text_color', '#000' );
    $body_font_size = get_theme_mod( 'body_font_size', '14' );
    $body_font_family = get_theme_mod( 'body_font_family', 'Open Sans' );

    $color .= "body { color:" . esc_attr($body_text_color) . "; font-size: " . esc_attr($body_font_size) . "px; font-family: ". esc_attr(str_replace('+', ' ', $body_font_family)) ."} ";

    $heading_color = get_theme_mod( 'heading_color', '#000' );
    $heading_font_family = get_theme_mod( 'heading_font_family', 'Open Sans' );
    $color .= ".widget-area .search-form .search-submit,.wpcf7 .wpcf7-submit,h1, h2, h3, h4, h5, h6 ,.btn,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{ font-family: ". esc_attr(str_replace('+', ' ', $heading_font_family)) ."} ";
    $color .= "h1, h2, h3, h4, h5, h6 { color:" . esc_attr($heading_color) . "} ";

    $link_color = get_theme_mod( 'link_color', '#000' );
    $color .= ".woocommerce ul.products li.product .price,.woocommerce ul.products li.product .price ins,a,.header-bottom .navbar-default .active a:hover,.header-bottom .navbar-default li> a,.woocommerce div.product .product_title,.woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce div.product form.cart .variations td.label { color:" . esc_attr($link_color) . "} ";

    $link_hover_color = get_theme_mod( 'link_hover_color', '#f93759' );
    $color .= ".woocommerce div.product p.price del, .woocommerce div.product span.price del,.footer-middle a:hover,.woocommerce ul.products li.product .price del,a:hover,.header-bottom .navbar-default .active a,.header-bottom .navbar-default .active a:hover,.header-bottom .navbar-default li> a:hover { color:" . esc_attr($link_hover_color) . "} ";

    /*
     * Header Section
     */
    $header_bg_color = get_theme_mod( 'header_bg_color', '#fff' );
    $header_text_color = get_theme_mod( 'header_text_color', '#000' );
    $color .= ".header { background:" . esc_attr($header_bg_color) . ";} ";
    $color .= ".header ,.header  a{ color: ". esc_attr($header_text_color) .";} ";

    /*
     * Footer Section
     */
    $footer_bg_color = get_theme_mod( 'footer_bg_color', '#30373b' );
    $footer_text_color = get_theme_mod( 'footer_text_color', '#fff' );
    $color .= ".footer-main { background:" . esc_attr($footer_bg_color) . ";} ";
    $color .= ".footer-main ,.footer-middle h4,.footer-middle a,.payment .fa{ color: ". esc_attr($footer_text_color) .";} ";

    /*
     * Default Button
     */
    $btn_default_bg = get_theme_mod( 'btn_default_bg', '#fff' );
    $btn_default_text = get_theme_mod( 'btn_default_text', '#f93759' );
    $btn_default_border = get_theme_mod( 'btn_default_border', '#f93759' );

    $color .= ".wpcf7 .wpcf7-submit,.btn-default, .btn-default.disabled,.woocommerce ul.products li.product .button,.widget-area .search-form .search-submit,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,.woocommerce div.product form.cart .button,.woocommerce #review_form #respond .form-submit input,.woocommerce input.button , .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,.woocommerce #payment #place_order ,.wpcf7-submit{ background-color:" . esc_attr($btn_default_bg) . "; color: " . esc_attr($btn_default_text) . ";border-color: " . esc_attr($btn_default_border) . "; } ";

    $btn_default_bg_hover = get_theme_mod( 'btn_default_bg_hover', '#f93759' );
    $btn_default_text_hover = get_theme_mod( 'btn_default_text_hover', '#fff' );
    $btn_default_border_hover = get_theme_mod( 'btn_default_border_hover', '#f93759' );

    $color .= ".btn-default.active, .btn-default.focus, .btn-default:active, .btn-default:focus, .btn-default:hover, .open>.dropdown-toggle.btn-default,.woocommerce ul.products li.product .button:hover,.widget-area .search-form .search-submit:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce div.product form.cart .button:hover ,.woocommerce #review_form #respond .form-submit input:hover,.woocommerce input.button:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce #payment #place_order:hover,.wpcf7-submit:hover{ background-color:" . esc_attr($btn_default_bg_hover) . "; color: " . esc_attr($btn_default_text_hover) . ";border-color: " . esc_attr($btn_default_border_hover) . "; } ";

    /*
     * Primary Button
     */
    $btn_primary_bg = get_theme_mod( 'btn_primary_bg', '#f93759' );
    $btn_primary_text = get_theme_mod( 'btn_primary_text', '#fff' );
    $btn_primary_border = get_theme_mod( 'btn_primary_border', '#f93759' );

    $color .= ".camera_wrap.main-slider .btn,.btn-primary, .btn-primary.disabled{ background-color:" . esc_attr($btn_primary_bg) . "; color: " . esc_attr($btn_primary_text) . ";border-color: " . esc_attr($btn_primary_border) . "; } ";

    $btn_primary_bg_hover = get_theme_mod( 'btn_primary_bg_hover', '#000' );
    $btn_primary_text_hover = get_theme_mod( 'btn_primary_text_hover', '#fff' );
    $btn_primary_border_hover = get_theme_mod( 'btn_primary_border_hover', '#000' );

    $color .= ".btn-primary.active, .btn-primary.focus, .btn-primary:active, .btn-primary:focus, .btn-primary:hover, .open>.dropdown-toggle.btn-primary,.camera_wrap.main-slider .btn:hover{ background-color:" . esc_attr($btn_primary_bg_hover) . "; color: " . esc_attr($btn_primary_text_hover) . ";border-color: " . esc_attr($btn_primary_border_hover) . "; } ";

    wp_add_inline_style( 'themetim', $color );
}
add_action( 'wp_enqueue_scripts', 'themetim_typography_color' );
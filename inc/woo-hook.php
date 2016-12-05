<?php
/**
 * ThemeTim WooCommerce Hook
 */

/**
 * Remove (shop & category)
 *
 * Price
 * Rating
 * Title
 *
 */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
/**
 * Add Action (shop & category)
 *
 * Title
 * Price
 */
add_action( 'woocommerce_shop_loop_item_title', 'themetim_product_title_description', 10 );
function themetim_product_title_description() { ?>
    <div class="product-title-hover">
        <h4 class="margin-null"><a href="<?php the_permalink();?>" class="text-capitalize"><?php the_title(); ?></a><?php woocommerce_template_loop_price();?></h4>
        <?php woocommerce_template_loop_rating();
        the_excerpt();
        ?>
    </div>
    <?php
}
/**
 * Remove Action (Category)
 *
 * Title (default)
 * Count (default)
 */
remove_action('woocommerce_shop_loop_subcategory_title','woocommerce_template_loop_category_title',10);
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
function woo_remove_category_products_count() {
    return;
}
/**
 * Add Action (Category)
 *
 * Title
 * Description
 * Category link
 */
add_action( 'woocommerce_after_subcategory', 'custom_add_product_description', 12);
function custom_add_product_description ($category) {
    $cat_id        =    $category->term_id;
    $prod_term    =    get_term($cat_id,'product_cat');
    $description=    $prod_term->description;
    $slug       =    $category->slug;
    $cat_url = get_term_link( $slug, 'product_cat' );

    echo '<div class="category-details">';
    echo '<h2><a href='.$cat_url.'>'.$prod_term->name.'</a></h2>';
    echo '<h4 class="cat-count"><span>'.$category->count.'</span></h4>';
    echo '<p>'.substr( $description,0,110 ).'</p>';
    echo "<a href='$cat_url' class='btn btn-default text-capitalize'><span>See Category</span></a>";
    echo "</div>";
}

/**
 * Themetim Product Columns
 */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 2; // 3 products per row
    }
}

/**
 * Themetim Ajax Cart
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-basket"></i></a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}
/**
 * Add Action
 *
 * Product Page (Meta)
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_before_add_to_cart_button', 'woocommerce_template_single_meta', 10 );

/**
 * Cart Page
 *
 * Remove Cross Sells From Default Position
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );
add_filter( 'woocommerce_cross_sells_columns', 'change_cross_sells_columns' );
function change_cross_sells_columns( $columns ) {
    return 2;
}

/**
 * Shop Page
 *
 * Number of products displayed per page
 */
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );

/**
 * Single Product Page
 *
 * Change number of thumbnails per row in product galleries
 */
add_filter ( 'woocommerce_product_thumbnails_columns', 'single_product_thumb' );
function single_product_thumb() {
    return 1;
}

/**
 * Category Archive Page
 *
 * Display Category Image on Category Archive
 */
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        if ( $image ) {
            echo '<img src="' . $image . '" alt="" class="img-responsive margin-bottom-20  margin-top-40" />';
        }
    }
}

/**
 * ThemeTim Shop Page
 * Remove woo #container
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/**
 * Breadcrumbs
 * Remove hook
 * Modify Breadcrumbs
 */
add_action( 'init', 'themetim_woo_breadcrumbs' );
function themetim_woo_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'themetim_modify_woocommerce_breadcrumbs' );
function themetim_modify_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<ul class="breadcrumb margin-null">',
        'wrap_after'  => '</ul>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    );
}

/**
 * ThemeTim
 * Changed product limit of shop page 9 to 12
 */

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

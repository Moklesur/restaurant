<?php
/**
 * ThemeTim Main Slider
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
add_action( 'init', 'themetim_main_slider' );
function themetim_main_slider() {
    $slider_labels = array(
        'name'               => _x( 'Slider', 'post type general name', 'themetim' ),
        'singular_name'      => _x( 'Slider', 'post type singular name', 'themetim' ),
        'menu_name'          => _x( 'Slider', 'admin menu', 'themetim' ),
        'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'themetim' ),
        'add_new'            => _x( 'Add New', 'Slider', 'themetim' ),
        'add_new_item'       => __( 'Add New Slider', 'themetim' ),
        'new_item'           => __( 'New Slider', 'themetim' ),
        'edit_item'          => __( 'Edit Slider', 'themetim' ),
        'view_item'          => __( 'View Slider', 'themetim' ),
        'all_items'          => __( 'All Slider', 'themetim' ),
        'search_items'       => __( 'Search Slider', 'themetim' ),
        'parent_item_colon'  => __( 'Parent Slider:', 'themetim' ),
        'not_found'          => __( 'No Slider found.', 'themetim' ),
        'not_found_in_trash' => __( 'No Slider found in Trash.', 'themetim' )
    );

    $slider_args = array(
        'labels'             => $slider_labels,
        'description'        => __( 'Description.', 'themetim' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'author', 'thumbnail'),
        'themetim_slider_meta_boxes' => 'themetim_slider_display_callback',
        'page'          => array( 'setting' ),

    );

    register_post_type( 'slider', $slider_args );
}
/**
 * ThemeTim Main Slider Meta Box
 */
function themetim_slider_meta_boxes() {
    add_meta_box( 'themetim-main-slider-id', __( 'Slider Text', 'themetim' ), 'themetim_slider_display_callback', 'slider','normal', 'high');
}
add_action( 'add_meta_boxes', 'themetim_slider_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function themetim_slider_display_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

    <div>
        <h4 class="prfx-row-title"><?php _e( 'Heading', 'text-domain' )?></h4>
        <input type="text" name="slider-heading" id="heading" class="widefat" value="<?php if ( isset ( $prfx_stored_meta['slider-heading'] ) ) echo $prfx_stored_meta['slider-heading'][0]; ?>" />
        <h4 class="prfx-row-title"><?php _e( 'Text', 'text-domain' )?></h4>
        <textarea name="slider-text" class="widefat" rows="6"><?php if ( isset ( $prfx_stored_meta['slider-text'] ) ) echo $prfx_stored_meta['slider-text'][0]; ?></textarea>

        <h4 class="prfx-row-title"><?php _e( 'Link', 'text-domain' )?></h4>
        <input type="text" name="slider-link-title" id="heading" class="widefat" value="<?php if ( isset ( $prfx_stored_meta['slider-link-title'] ) ) echo $prfx_stored_meta['slider-link-title'][0]; ?>" placeholder="Button Title" />

        <input type="text" name="slider-link" id="heading" class="widefat" value="<?php if ( isset ( $prfx_stored_meta['slider-link'] ) ) echo $prfx_stored_meta['slider-link'][0]; ?>" placeholder="Button Link" style="margin-top: 15px" />
    </div>

    <?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function themetim_slider_save_meta_box( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'slider-heading' ] ) ) {
        update_post_meta( $post_id, 'slider-heading', sanitize_text_field( $_POST[ 'slider-heading' ] ) );
    }

    if( isset( $_POST[ 'slider-text' ] ) ) {
        update_post_meta( $post_id, 'slider-text', sanitize_text_field( $_POST[ 'slider-text' ] ) );
    }
    if( isset( $_POST[ 'slider-link' ] ) ) {
        update_post_meta( $post_id, 'slider-link', sanitize_text_field( $_POST[ 'slider-link' ] ) );
    }
    if( isset( $_POST[ 'slider-link-title' ] ) ) {
        update_post_meta( $post_id, 'slider-link-title', sanitize_text_field( $_POST[ 'slider-link-title' ] ) );
    }
    // Retrieves the stored value from the database
    $meta_value = get_post_meta( get_the_ID(), 'slider-heading', true );
    $meta_value .= get_post_meta( get_the_ID(), 'slider-text', true );
    $meta_value .= get_post_meta( get_the_ID(), 'slider-link', true );
    $meta_value .= get_post_meta( get_the_ID(), 'slider-link-title', true );

    // Checks and displays the retrieved value
    if( !empty( $meta_value ) ) {
        echo $meta_value;
    }
}
add_action( 'save_post', 'themetim_slider_save_meta_box' );
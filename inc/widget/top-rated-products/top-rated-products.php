<?php
/**
 * ThemeTim Top Rated Products
 */
class TopRatedProducts_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'TopRatedProducts_Widget',
            __( 'ThemeTim Top Rated Products', 'text_domain' ),
            array( 'description' => __( 'Top Rated Products', 'text_domain' ), )
        );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args  Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        $product_carousel_enable = apply_filters( 'widget_text', $instance['product_carousel_enable'] );
        $carousel_class= '';
        if ( $product_carousel_enable ==  '1' ) {
            $carousel_class = 'recent-product-carousel';
        }
        $title = '';
        if ( ! empty( $instance['title'] ) ) {
            $title = '<h2 class="page-header">'. apply_filters( 'widget_title', $instance['title'] ).'</h2>';
        }
        $product_limit = apply_filters( 'widget_title', $instance['product_limit'] );
        $product_columns = apply_filters( 'widget_title', $instance['product_columns'] );
        ?>
        <div class="recent-product-widget default-widget <?php echo $carousel_class; ?>">
            <?php echo $title ?>
            <?php echo do_shortcode('[top_rated_products per_page='.$product_limit.' columns='.$product_columns.']'); ?>
        </div>
        <script>
            jQuery(function(){
                /*******************************************************************************
                 * Carousel Slider
                 *******************************************************************************/
                if(jQuery('.sale-product-carousel').length){
                    jQuery('.sale-product-carousel .products').owlCarousel({
                        loop:true,
                        margin:30,
                        responsiveClass:true,
                        items:4,
                        autoplay:true
                    });
                }
            });
        </script>
        <?php
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Top Rated Products', 'text_domain' );
        $product_limit = ! empty( $instance['product_limit'] ) ? $instance['product_limit'] : __( '4', 'text_domain' );
        $product_columns = ! empty( $instance['product_columns'] ) ? $instance['product_columns'] : __( '2', 'text_domain' );
        ?>
        <div class="widget-area">
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'product_limit' ); ?>"><?php _e( 'Product Limit:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'product_limit' ); ?>" name="<?php echo $this->get_field_name( 'product_limit' ); ?>" type="number" value="<?php echo esc_attr( $product_limit ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'product_columns' ); ?>"><?php _e( 'Product Columns:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'product_columns' ); ?>" name="<?php echo $this->get_field_name( 'product_columns' ); ?>" type="number" value="<?php echo esc_attr( $product_columns ); ?>">
            </p>
            <h2>Advance Option</h2>
            <p>
                <input class="widefat" id="<?php echo $this->get_field_id('product_carousel_enable'); ?>" name="<?php echo $this->get_field_name('product_carousel_enable'); ?>" type="checkbox" value="1" <?php checked( $instance['product_carousel_enable'], '1'); ?>  />
                <label for="<?php echo $this->get_field_id('product_carousel_enable'); ?>"><?php _e('Enable Slider'); ?></label>
                <br/><small>## if enable slider then please make Product Column 1.</small>
            </p>
        </div>

        <?php
    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['product_carousel_enable'] = ( ! empty( $new_instance['product_carousel_enable'] ) ) ? strip_tags( $new_instance['product_carousel_enable'] ) : '';
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['product_limit'] = ( ! empty( $new_instance['product_limit'] ) ) ? strip_tags( $new_instance['product_limit'] ) : '';
        $instance['product_columns'] = ( ! empty( $new_instance['product_columns'] ) ) ? strip_tags( $new_instance['product_columns'] ) : '';

        return $instance;
    }

} // class TopRatedProducts_Widget

// register TopRatedProducts_Widget widget
function regsiter_TopRatedProducts_widget() {
    register_widget( 'TopRatedProducts_Widget' );
}
add_action( 'widgets_init', 'regsiter_TopRatedProducts_widget' );
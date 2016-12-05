<?php
/**
 * Team widget.
 *
 * @package themetim
 */

class Themetim_Menu_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'themetim-menu-widget',
			__( 'ThemeTim Menu', 'themetim' ),
			array(
				'description' => __( 'Displays team member carousel', 'themetim' ),
			),
			array(),
			array(

				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'themetim' ),
				),
				'menus' => array(
					'type'       => 'repeater',
					'label'      => __( 'Menus', 'themetim' ),
					'item_name'  => __( 'Item', 'themetim' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-themetim-menus-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'menu_title' => array(
							'type'  => 'text',
							'label' => __( 'Title', 'themetim' ),
						),
						'menu_price' => array(
							'type'  => 'text',
							'label' => __( 'Price', 'themetim' ),
						),
						'texteditor' => array(
							'type' => 'tinymce',
							'label' => __( '', 'widget-form-fields-text-domain' ),
							'default' => '',
							'rows' => 10,
							'default_editor' => 'html',
							'button_filters' => array(
								'mce_buttons' => array( $this, 'filter_mce_buttons' ),
								'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
								'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
								'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
								'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
							),
						),
					),
				),
				'per_row' => array(
					'type'    => 'select',
					'label'   => __( 'Menus per row', 'themetim' ),
					'default' => 1,
					'options' => array(
						'12' => 1,
						'6' => 2,
						'3' => 3,
						'4' => 4,
					),
				),
			)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'themetim-menu-widget', __FILE__, 'Themetim_Menu_Widget' );

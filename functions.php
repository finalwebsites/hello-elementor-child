<?php

// Load child theme css
function fw_hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'fw-hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'fw_hello_elementor_child_enqueue_scripts', 99 );

function fw_footer_js() {
	// place here your JS code which appears at the end of the body section
	echo '';
}
add_action('wp_footer', 'fw_footer_js');

function fw_head_js() {
	// place here your JS code which appears in the head section
	echo '';
}
add_action('wp_head', 'fw_footer_js');

/* Elementor Pro Search for products only */
/*
add_action( 'elementor_pro/search_form/after_input', function( $form ) {
    echo '<input type="hidden" name="post_type" value="product" />';
}, 10, 1 );
*/



/* 
The code below ads the shortcode option as a dynamic tag for the image widget.
While using the shortcode option, the image widget (instance) doesn't support the responsive image features anymore.
Disclaimer: Use it with caution, the elementor team removed this option a several years ago.
*/
/*
use Elementor\Controls_Manager;
add_action( 'elementor/dynamic_tags/register_tags', function( $dynamic_tags ) {
	class Custom_Image_Tag extends Elementor\Core\DynamicTags\Data_Tag {

		public function get_name() {
			return 'shortcode-image';
		}

		public function get_categories() {
			return [ 'image' ];
		}

		public function get_group() {
			return [ 'site' ];
		}

		public function get_title() {
			return 'Shortcode Image';
		}

		protected function _register_controls() {
			$this->add_control(
				'shortcode',
				[
					'label' => __( 'Shortcode', 'elementor-pro' ),
					'type'  => Controls_Manager::TEXTAREA,
				]
			);
		}

		protected function get_value( array $options = [] ) {
			$settings = $this->get_settings();

			if ( empty( $settings['shortcode'] ) ) {
				return;
			}
			
			return [
				'url' => do_shortcode( $settings['shortcode'] ) // Your shortcode MUST return a full valid URL
			];
		}
	}
	$dynamic_tags->register_tag( 'Custom_Image_Tag' );
});
*/
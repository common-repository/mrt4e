<?php
/*
Plugin Name: MRT4E (More Responsive Tablet 4 Elementor)
Plugin URI:
Description: Add a more responsive support for tablet in Elementor plugin
Version: 1.0
Author: Nicolas ANDRÉ
Author URI:
License: GPLv2 or more
*/
/**
 *
 * Elementor Custom Breakpoint/Stacking Select
 * Issue: https://github.com/pojome/elementor/issues/418/
 * Inspired from :https://gist.github.com/carasmo/58fb8e5ea796ec56e8cb87f1f4fc2e38
 * @carasmo Thank you
 */
defined( 'ABSPATH' ) || exit;
add_action( 'elementor/element/before_section_end' , 'tablet_elementor_controls', 10, 3 );
function tablet_elementor_controls( $section, $section_id, $args ) {
	if( $section_id == 'section_responsive' ) :

		$point_name ='tablet_break';

		$section->add_control(
			$point_name,
			[
				'label' => __( 'Tablet Width', 'elementor' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Default', 'elementor' ),
					'custom' => __( 'Custom', 'elementor' ),
				],
				'description' => '',
				'classes' => '',
			]
		);
		$section->add_control(
			$point_name . '_width',
			[
				'label' => __( 'Column Width', 'elementor' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'options' => [
					'10' => '10%',
					'11' => '11%',
					'12' => '12%',
					'14' => '14%',
					'16' => '16%',
					'20' => '20%',
					'25' => '25%',
					'30' => '30%',
					'33' => '33%',
					'40' => '40%',
					'50' => '50%',
					'60' => '60%',
					'66' => '66%',
					'70' => '70%',
					'75' => '75%',
					'80' => '80%',
					'83' => '83%',
					'90' => '90%',
					'100' => '100%',
				],
				'default' => '100',
				'condition' => [
					$point_name => [ 'custom' ],
				],
				'prefix_class' => 'elementor-md-',
			]
		);
	endif; // Section Custom Controls
}


add_action( 'elementor/frontend/after_enqueue_styles', 'tablet_elementor_column_breakpoints', 11 );
function tablet_elementor_column_breakpoints() {
  wp_enqueue_style('errt', plugin_dir_url( __FILE__ ) . '/assets/css/style.css');
}

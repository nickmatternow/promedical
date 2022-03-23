<?php

/**
 * blockname Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blockname-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blockname';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
   
</div>


<!-- ***************************** MOVE TO FUNCTIONS.PHP --  gdt-custom.php ***************************-->

<?php 
// Register a blockname block.
add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'blockname',
            'title'             => __('Block Name'),
            'description'       => __('A custom  block.'),
            'render_template'   => 'template-part/blocks/blockname/blockname.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			'enqueue_assets' 	=> function(){
		
				// wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );

				wp_enqueue_style( 'block-blockname', get_template_directory_uri() . '/template-part/blocks/blockname/blockname.min.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-blockname', get_template_directory_uri() . '/template-part/blocks/blockname/blockname.min.js', array(), '1.0.0', true );
			  },
        ));
    }
}
; ?>
<!-- ***************************** MOVE TO FUNCTIONS.PHP --  gdt-custom.php ***************************-->
<?php
/**
 * All your Gutenbergs belong to GDT. What does that mean?
 * Anyway, theme support and custom stuff related to Gutenberg belongs below.
 */

// ++ NOTE: More theme support options are available. Info here: 
// https://developer.wordpress.org/block-editor/developers/themes/theme-support/



// ++ Add the corresponding classname to wide block wrappers ( alignwide or alignfull )
add_theme_support( 'align-wide' ); 
add_theme_support( 'responsive-embeds' );

// remove core block patterns
remove_theme_support('core-block-patterns');


// ++ Enqueue block editor customization file...That is where we do our Gutenberg hackin'
function gdt_customizing_blocks() {
  wp_enqueue_script(
      'gdt_customizing_blocks',
      get_stylesheet_directory_uri() . '/dist/gutenberg-custom.js' );
}
add_action( 'enqueue_block_editor_assets', 'gdt_customizing_blocks' );



/**
 * Add a block category for if it doesn't exist already.
 *
 * @param array $categories Array of block categories.
 *
 * @return array
 */
function lp_block_categories( $categories ) {
  $category_slugs = wp_list_pluck( $categories, 'slug' );
  return in_array( 'gwg', $category_slugs, true ) ? $categories : array_merge(
      $categories,
      array(
          array(
              'slug'  => 'myblocks',
              'title' => __( 'My Blocks', 'myblocks' ),
              'icon'  => null,
          ),
      )
  );
}
add_filter( 'block_categories', 'lp_block_categories' );



// Register my ACF blocks

function register_acf_block_types() {
  // register ICON block
  acf_register_block_type(array(
   'name'              => 'icon-block',
   'title'             => __('Icon'),
   'description'       => __('Icon selector'),
   'render_template'   => 'template-part/block/block-icon.php',
   'category'          => 'acton',
   'icon'              => 'admin-site',
   'keywords'          => array( 'cta', 'post' ),
 )); 
 
 


 
 //  Button Block
acf_register_block_type(array(
  'name'              => 'button-block',
  'title'             => __('Button'),
  'description'       => __('Custom Button'),
  'render_template'   => 'template-part/block/button/button.php',
  'category'          => 'oneper',
  'icon'              => 'admin-site',
  'supports'		=> [
		'align'			=> true
	],
  'keywords'          => array( 'button' ),
  'enqueue_assets' 	=> function(){
  wp_enqueue_script( 'block-button', get_template_directory_uri() . '/template-part/block/button/button.js', array(), '', true );
  }
));
 



        // register a hero block.
        acf_register_block_type(array(
            'name'              => 'Home Hero',
            'title'             => __('Home Hero Block'),
            'description'       => __('A Full height Hero Block.'),
            'render_template'   => 'template-part/block/hero/hero.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			'enqueue_assets' 	=> function(){
		 
				wp_enqueue_style( 'block-hero', get_template_directory_uri() . '/template-part/block/hero/hero.min.css', array(), '1.0.0' );
			  },
        ));


  // register a hover cta block.
  acf_register_block_type(array(
    'name'              => 'Hover CTA',
    'title'             => __('Hover CTA block'),
    'description'       => __('An interactive hover CTA'),
    'render_template'   => 'template-part/block/hovercta/hovercta.php',
'category'          => 'formatting',
'icon' 				=> 'images-alt2',
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'hovercta', get_template_directory_uri() . '/template-part/block/hovercta/hovercta.min.css', array(), '1.0.0' );
},
));

 // register a testimonial Slider block.
 acf_register_block_type(array(
  'name'              => 'Testimonial Slider',
  'title'             => __('Testimonial Slider'),
  'description'       => __('A vertical testimonial slider'),
  'render_template'   => 'template-part/block/testimonialslider/testimonialslider.php',
'category'          => 'formatting',
'icon' 				=> 'images-alt2',
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'testslidercss', get_template_directory_uri() . '/template-part/block/testimonialslider/testimonialslider.min.css', array(), '1.0.0' );
wp_enqueue_script( 'testsliderscript', get_template_directory_uri() . '/template-part/block/testimonialslider/testimonialslider.js', array(), '1.0.0', true );
wp_enqueue_script( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js', array('jquery'), '1.8.1', true );

},
));




 // register a testimonial Slider block.
 acf_register_block_type(array(
  'name'              => 'Timeline',
  'title'             => __('Timeline'),
  'description'       => __('A Timeline'),
  'render_template'   => 'template-part/block/timeline/timeline.php',
'category'          => 'formatting',
'icon' 				=> 'images-alt2',
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'timelinecss', get_template_directory_uri() . '/template-part/block/timeline/timeline.min.css', array(), '1.0.0' );
wp_enqueue_script( 'timelinescript', get_template_directory_uri() . '/template-part/block/timeline/timeline.js', array(), '1.0.0', true );

},
));


 // register a testimonial Slider block.
 acf_register_block_type(array(
  'name'              => 'stackslider',
  'title'             => __('stackslider'),
  'description'       => __('A stackslider'),
  'render_template'   => 'template-part/block/stackslider/stackslider.php',
'category'          => 'formatting',
'icon' 				=> 'images-alt2',
'enqueue_assets' 	=> function(){
  wp_enqueue_script( 'stackslide', get_template_directory_uri() . '/template-part/block/stackslider/stack-slider.min.js', array(), '1.0.0', true );

wp_enqueue_style( 'stackslidercss', get_template_directory_uri() . '/template-part/block/stackslider/stackslider.min.css', array(), '1.0.0' );
wp_enqueue_script( 'stacksliderscript', get_template_directory_uri() . '/template-part/block/stackslider/stackslider.js', array(), '1.0.0', true );

},
));



        
        
    // register a Slider block.
    acf_register_block_type(array(
      'name'              => 'mawslider',
      'title'             => __('Custom Slider'),
      'description'       => __('A custom Slider Block.'),
      'render_template'   => 'template-part/block/slider/slider.php',
'category'          => 'formatting',
'icon' 				=> 'images-alt2',
'align'				=> 'wide',
'enqueue_assets' 	=> function(){

  wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/js/splide.min.js', array('jquery'), '1.8.1', true );
  wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-part/block/slider/slider.min.css', array(), '1.0.0' );
  wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-part/block/slider/slider.min.js', array(), '1.0.0', true );
  },
  ));
 
 }



   

        
    


 // Check if function exists and hook into setup.
 if( function_exists('acf_register_block_type') ) {
  add_action('acf/init', 'register_acf_block_types');
}





?>

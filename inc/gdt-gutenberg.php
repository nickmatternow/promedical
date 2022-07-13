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
    'name'              => 'floating block',
    'title'             => __('Gold absolute positioned CTA'),
    'description'       => __('A Gold absolute positioned CTA.'),
    'render_template'   => 'template-part/block/floatingblock/floatingblock.php',
'category'          => 'formatting',
'icon' 				=> 'images-alt2',
'align'				=> 'full',
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'block-floatingblock', get_template_directory_uri() . '/template-part/block/floatingblock/floatingblock.min.css', array(), '1.0.0' );
},
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


             // register a hero block.
             acf_register_block_type(array(
              'name'              => 'Interior Hero',
              'title'             => __('Interior Hero Block'),
              'description'       => __('Your main starting Hero Block.'),
              'render_template'   => 'template-part/block/interior-hero/interior-hero.php',
        'category'          => 'formatting',
        'icon' 				=> 'images-alt2',
        'align'				=> 'full',
        'enqueue_assets' 	=> function(){
       
          wp_enqueue_style( 'block-interior-hero', get_template_directory_uri() . '/template-part/block/interior-hero/interior-hero.min.css', array(), '1.0.0' );
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
// wp_enqueue_script( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js', array('jquery'), '1.8.1', true );

},
));


// register ICON block
acf_register_block_type(array(
  'name'              => 'lp-icon-block',
  'title'             => __('Icon'),
  'description'       => __('Icon selector'),
  'render_template'   => 'template-part/block/icon/icon.php',
  'category'          => 'formatting',
  'icon' => array(
    // Specifying a background color to appear with the icon e.g.: in the inserter.
    'background' => '#2f638d',
    // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
    'foreground' => '#fff', 
    // Specifying a dashicon for the block
    'src' => 'star-filled',
),
  'keywords'          => array( 'icon' ),
)); 


// register CTA block
acf_register_block_type(array(
  'name'              => 'lp-cta-block',
  'title'             => __('Lower CTA'),
  'description'       => __('CTA for above footer'),
  'render_template'   => 'template-part/block/cta/cta.php',
  'category'          => 'formatting',
  'icon' => array(
    // Specifying a background color to appear with the icon e.g.: in the inserter.
    'background' => '#2f638d',
    // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
    'foreground' => '#fff', 
    // Specifying a dashicon for the block
    'src' => 'star-filled',
),
  'keywords'          => array( 'icon' ),
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

 // register a Map block
 acf_register_block_type(array(
  'name'              => 'map',
  'title'             => __('map'),
  'description'       => __('A map'),
  'render_template'   => 'template-part/block/map/map.php',
'category'          => 'formatting',
'icon' 				=> 'images-alt2',
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'mapcss', get_template_directory_uri() . '/template-part/block/map/map.min.css', array(), '1.0.0' );
wp_enqueue_script( 'mapscript', get_template_directory_uri() . '/template-part/block/map/map.js', array(), '1.0.0', true );

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

  // wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/js/splide.min.js', array('jquery'), '1.8.1', true );
  wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-part/block/slider/slider.min.css', array(), '1.0.0' );
  wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-part/block/slider/slider.min.js', array(), '1.0.0', true );
  },
  ));
 
 }



 // Check if function exists and hook into setup.
 if( function_exists('acf_register_block_type') ) {
  add_action('acf/init', 'register_acf_block_types'); 
}





// PATTERNS

// add block pattern categories 
function my_plugin_register_my_pattern_categories() {
  register_block_pattern_category(
    'containers',
    array( 'label' => __( 'Containers', 'promed-patterns' ) )
);
register_block_pattern_category(
  'images',
  array( 'label' => __( 'Images', 'promed-patterns' ) )
);
register_block_pattern_category(
  'ctas',
  array( 'label' => __( 'CTAs', 'promed-ctas' ) )
);
}
 
add_action( 'init', 'my_plugin_register_my_pattern_categories' );




function launchpad_register_blocks() {

  register_block_pattern(
    'promed/sixtyforty',
    array(
        'title'         => __( 'Sixty Forty', 'sfcontainer' ),
        'description'   => _x( 'Start Here','Container with 60-40' ),
        'content'       => trim('<!-- wp:generateblocks/container {"uniqueId":"c8bc1432","isDynamic":true,"blockVersion":2} -->
        <!-- wp:generateblocks/grid {"uniqueId":"2f19bbe5","columns":2,"horizontalGap":50,"verticalGap":30,"isDynamic":true,"blockVersion":2} -->
        <!-- wp:generateblocks/container {"uniqueId":"3789bec4","isGrid":true,"gridId":"2f19bbe5","width":60,"widthMobile":100,"isDynamic":true,"blockVersion":2} /-->
        
        <!-- wp:generateblocks/container {"uniqueId":"ef1c5cfd","isGrid":true,"gridId":"2f19bbe5","width":40,"widthMobile":100,"isDynamic":true,"blockVersion":2} /-->
        <!-- /wp:generateblocks/grid -->
        <!-- /wp:generateblocks/container -->'),
        'categories'    => array( 'containers' ),
        'keywords'      => array( 'containers,60-40' ),
    )
);

register_block_pattern(
  'promed/fortysixty',
  array(
      'title'         => __( 'Forty Sixty', 'fscontainer' ),
      'description'   => _x( 'Start Here','Container with 40-60' ),
      'content'       => trim('<!-- wp:generateblocks/container {"uniqueId":"c8bc1432","isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/grid {"uniqueId":"2f19bbe5","columns":2,"horizontalGap":50,"verticalGap":30,"isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/container {"uniqueId":"3789bec4","isGrid":true,"gridId":"2f19bbe5","width":40,"widthMobile":100,"isDynamic":true,"blockVersion":2} /-->
      
      <!-- wp:generateblocks/container {"uniqueId":"ef1c5cfd","isGrid":true,"gridId":"2f19bbe5","width":60,"widthMobile":100,"isDynamic":true,"blockVersion":2} /-->
      <!-- /wp:generateblocks/grid -->
      <!-- /wp:generateblocks/container -->'),
      'categories'    => array( 'containers' ),
      'keywords'      => array( 'container,40-60' ),
  )
);


register_block_pattern(
  'promed/grad',
  array(
      'title'         => __( 'Gradient BG', 'radialgrad' ),
      'description'   => _x( 'Radial Gradient','Extended Container with Radial Gradient' ),
      'content'       => trim('<!-- wp:generateblocks/container {"uniqueId":"c8bc1432","isDynamic":true,"blockVersion":2,"className":"c-bg-extend "} /-->'),
      'categories'    => array( 'containers' ),
      'keywords'      => array( 'container,gradient,extended' ),
  )
);

register_block_pattern(
  'promed/numbercta',
  array(
      'title'         => __( 'Number counter cta', 'ctacounter' ),
      'description'   => _x( 'Start Here','Number Counter with Description' ),
      'content'       => trim('<!-- wp:generateblocks/container {"uniqueId":"669fde43","width":25,"widthMobile":100,"isDynamic":true,"blockVersion":2,"className":"c-counter-cta "} -->
      <!-- wp:stackable/count-up {"contentAlign":"center","uniqueId":"3b5c3fa","blockMargin":{"bottom":""},"fontWeight":"700","textColorClass":"has-teal-color","textColor1":"#00b2c1"} -->
      <div class="wp-block-stackable-count-up stk-block-count-up stk-block stk-3b5c3fa" data-block-id="3b5c3fa"><style>.stk-3b5c3fa .stk-block-count-up__text{color:#00b2c1 !important;font-weight:700 !important}</style><div class="stk-block-count-up__text has-text-color has-teal-color has-text-align-center">15 MINS</div></div>
      <!-- /wp:stackable/count-up -->
      
      <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
      <p class="has-text-align-center has-small-font-size">Average time to <br>resolution</p>
      <!-- /wp:paragraph -->
      <!-- /wp:generateblocks/container -->'),
      'categories'    => array( 'ctas' ),
      'keywords'      => array( 'cta,counter' ),
  )
);


}



add_action( 'init', 'launchpad_register_blocks' );



?>

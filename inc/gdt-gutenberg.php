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

function custom_block_category( $categories ) {
  return array_merge(
      array(
          array(
              'slug' => 'promedical',
              'title' => __( 'Promedical Blocks', 'promedical' ),
          ),
      ),
      $categories
  );
}
add_filter( 'block_categories', 'custom_block_category', 10, 2 );



// Register my ACF blocks

function register_acf_block_types() {
  
 


 
 //  Button Block
acf_register_block_type(array(
  'name'              => 'button-block',
  'title'             => __('Button'),
  'description'       => __('Custom Button'),
  'render_template'   => 'template-part/block/button/button.php',
  'category'          => 'promedical',
  'icon' => array(
    'background' => '#000',
    'foreground' => '#fff', 
    'src' => 'button',
),
  'supports'		=> [
		'align'			=> true
	],
  'keywords'          => array( 'button' ),
  'enqueue_assets' 	=> function(){
  wp_enqueue_script( 'block-button', get_template_directory_uri() . '/template-part/block/button/button.js', array(), '', true );
  }
));
 



  // register a floating cta.
  acf_register_block_type(array(
    'name'              => 'floating block',
    'title'             => __('Gold absolute positioned CTA'),
    'description'       => __('A Gold absolute positioned CTA.'),
    'render_template'   => 'template-part/block/floatingblock/floatingblock.php',
'category'          => 'promedical',
'icon' => array(
  'background' => '#a57719',
  'foreground' => '#fff', 
  'src' => 'format-aside',
),
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
			'category'          => 'promedical',
      'icon' => array(
        'background' => '#000',
        'foreground' => '#fff', 
        'src' => 'admin-home',
    ),
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
        'category'          => 'promedical',
        'icon' => array(
          'background' => '#000',
          'foreground' => '#fff', 
          'src' => 'slides',
      ),
        'align'				=> 'full'
        // 'enqueue_assets' 	=> function(){
       
        //   wp_enqueue_style( 'block-interior-hero', get_template_directory_uri() . '/template-part/block/interior-hero/interior-hero.min.css', array(), '1.0.0' );
        //   },
          ));


  // register a hover cta block.
  acf_register_block_type(array(
    'name'              => 'Hover CTA',
    'title'             => __('Hover CTA block'),
    'description'       => __('An interactive hover CTA'),
    'render_template'   => 'template-part/block/hovercta/hovercta.php',
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'screenoptions',
),
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
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'testimonial',
),
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'testslidercss', get_template_directory_uri() . '/template-part/block/testimonialslider/testimonialslider.min.css', array(), '1.0.0' );
wp_enqueue_script( 'testsliderscript', get_template_directory_uri() . '/template-part/block/testimonialslider/testimonialslider.js', array(), '1.0.0', true );
// wp_enqueue_script( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js', array('jquery'), '1.8.1', true );

},
));


 // register a did you know Slider block.
 acf_register_block_type(array(
  'name'              => 'Did you Know',
  'title'             => __('Did you Know Fact'),
  'description'       => __('A custom fact block'),
  'render_template'   => 'template-part/block/didyouknow/didyouknow.php',
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'lightbulb',
),
'mode'        => 'edit',
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'testslidercss', get_template_directory_uri() . '/template-part/block/didyouknow/didyouknow.min.css', array(), '1.0.0' );
// wp_enqueue_script( 'testsliderscript', get_template_directory_uri() . '/template-part/block/didyouknow/didyouknow.js', array(), '1.0.0', true );
// wp_enqueue_script( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js', array('jquery'), '1.8.1', true );

},
));






// register a did you know Slider block.
acf_register_block_type(array(
  'name'              => 'Email Link',
  'title'             => __('Email Link'),
  'description'       => __('A custom email link'),
  'render_template'   => 'template-part/block/emaillink/emaillink.php',
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'email-alt',
),
'mode'        => 'edit',

));


// register ICON block
acf_register_block_type(array(
  'name'              => 'lp-icon-block',
  'title'             => __('Icon'),
  'description'       => __('Icon selector'),
  'render_template'   => 'template-part/block/icon/icon.php',
  'category'          => 'promedical',
  'icon' => array(
    'background' => '#000',
    'foreground' => '#fff', 
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
  'category'          => 'promedical',
  'icon' => array(
    // Specifying a background color to appear with the icon e.g.: in the inserter.
    'background' => '#00b2c1',
    // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
    'foreground' => '#fff', 
    // Specifying a dashicon for the block
    'src' => 'star-filled',
),
  'keywords'          => array( 'icon' ),
)); 

// register logogrid block
acf_register_block_type(array(
  'name'              => 'logogrid',
  'title'             => __('Logo Grid'),
  'description'       => __('Grid of client logos'),
  'render_template'   => 'template-part/block/logogrid/logogrid.php',
  'category'          => 'promedical',
  'icon' => array(
    // Specifying a background color to appear with the icon e.g.: in the inserter.
    'background' => '#00b2c1',
    // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
    'foreground' => '#fff', 
    // Specifying a dashicon for the block
    'src' => 'star-filled',
),
  'keywords'          => array( 'icon, logo, grid' ), 
  'enqueue_assets' 	=> function(){

    wp_enqueue_style( 'logogridcss', get_template_directory_uri() . '/template-part/block/logogrid/logogrid.min.css', array(), '1.0.0' );
    // wp_enqueue_script( 'testsliderscript', get_template_directory_uri() . '/template-part/block/didyouknow/didyouknow.js', array(), '1.0.0', true );
    // wp_enqueue_script( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js', array('jquery'), '1.8.1', true );
    
    },
)); 

// register finding block
acf_register_block_type(array(
  'name'              => 'finding',
  'title'             => __('finding block'),
  'description'       => __('Custom findings block'),
  'render_template'   => 'template-part/block/logogrid/logogrid.php',
  'category'          => 'promedical',
  'icon' => array(
    // Specifying a background color to appear with the icon e.g.: in the inserter.
    'background' => '#00b2c1',
    // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
    'foreground' => '#fff', 
    // Specifying a dashicon for the block
    'src' => 'search',
),
  'keywords'          => array( 'blog, finding' ), 
)); 



// register vertical Icon block
acf_register_block_type(array(
  'name'              => 'vis-block',
  'title'             => __('Vertical Icon Stack'),
  'description'       => __('Custom Vertical Icon Stack'),
  'render_template'   => 'template-part/block/vertical-icons/vertical-icons.php',
  'category'          => 'promedical',
  'icon' => array(
    // Specifying a background color to appear with the icon e.g.: in the inserter.
    'background' => '#00b2c1',
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
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'feedback',
),
'enqueue_assets' 	=> function(){

// wp_enqueue_style( 'timelinecss', get_template_directory_uri() . '/template-part/block/timeline/timeline.min.css', array(), '1.0.0' );
wp_enqueue_script( 'timelinescript', get_template_directory_uri() . '/template-part/block/timeline/timeline.js', array(), '1.0.0', true );

},
));

// register a circle-progress Slider block.
 acf_register_block_type(array(
  'name'              => 'circle-progress',
  'title'             => __('circle-progress'), 
  'description'       => __('A circle-progress'),
  'render_template'   => 'template-part/block/circle-progress/circle-progress.php',
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'admin-generic',
),
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'circle-progresscss', get_template_directory_uri() . '/template-part/block/circle-progress/circle-progress.min.css', array(), '1.0.0' ); 
wp_enqueue_script( 'circle-progressscript', get_template_directory_uri() . '/template-part/block/circle-progress/circle.js', array(), '1.0.0', true );
wp_enqueue_script( 'circle-progressscriptcustom', get_template_directory_uri() . '/template-part/block/circle-progress/circle-progress.js', array(), '1.0.0', true );

},
));



 // register a Calculator block.
 acf_register_block_type(array(
  'name'              => 'Calculator',
  'title'             => __('Calculator'),
  'description'       => __('Calculator block'),
  'render_template'   => 'template-part/block/calculator/calculator.php',
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'calculator',
),
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'calculatorcss', get_template_directory_uri() . '/template-part/block/calculator/calculator.min.css', array(), '1.0.0' );
wp_enqueue_style( 'calculatorbs', get_template_directory_uri() . '/template-part/block/calculator/bootstrap-grid.css', array(), '1.0.0' );
wp_enqueue_style( 'calculatorcssoriginal', get_template_directory_uri() . '/template-part/block/calculator/dattorto.css', array(), '1.0.0' );
wp_enqueue_script( 'calculatorvue', get_template_directory_uri() . '/template-part/block/calculator/vue.min.js', array(), '1.0.0', true );
wp_enqueue_script( 'calculatorscript', get_template_directory_uri() . '/template-part/block/calculator/dattorto.js', array(), '1.0.0', true );


},
));




 // register a Map block
 acf_register_block_type(array(
  'name'              => 'map',
  'title'             => __('map'),
  'description'       => __('A map'),
  'render_template'   => 'template-part/block/map/map.php',
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'admin-site',
),
'enqueue_assets' 	=> function(){

wp_enqueue_style( 'mapcss', get_template_directory_uri() . '/template-part/block/map/map.min.css', array(), '1.0.0' );
// wp_enqueue_script( 'mapscript', get_template_directory_uri() . '/template-part/block/map/map.js', array(), '1.0.0', true );

},
));


 // register a testimonial Slider block.
 acf_register_block_type(array(
  'name'              => 'stackslider',
  'title'             => __('stackslider'),
  'description'       => __('A stackslider'),
  'render_template'   => 'template-part/block/stackslider/stackslider.php',
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'format-gallery',
),
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
'category'          => 'promedical',
'icon' => array(
  'background' => '#000',
  'foreground' => '#fff', 
  'src' => 'embed-photo',
),
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



add_action( 'init', 'launchpad_register_blocks' );




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
  'promed/gradbg',
  array(
      'title'         => __( 'Gradient bg', 'gradcontainer' ),
      'description'   => _x( 'Start Here','Gradient bg container' ),
      'content'       => trim('<!-- wp:generateblocks/container {"uniqueId":"be87952d","isDynamic":true,"blockVersion":2,"className":"c-bg-extend "} /-->'),
      'categories'    => array( 'containers' ),
      'keywords'      => array( 'container,grad,gradient' ),
  )
);

register_block_pattern(
  'promed/bluebgc',
  array(
      'title'         => __( 'Blue BG container', 'bluebgcontainer' ),
      'description'   => _x( 'Blue Container','Blue BG container' ),
      'content'       => trim('<!-- wp:generateblocks/container {"uniqueId":"6be5e8ad","paddingTop":"45","paddingRight":"60","paddingBottom":"45","paddingLeft":"60","marginTop":"50","marginBottom":"50","backgroundColor":"#00b2c1","textColor":"#000000","isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/headline {"uniqueId":"ca4844f2","element":"h3","textColor":"#000000"} -->
      <h3 class="gb-headline gb-headline-ca4844f2 gb-headline-text">Header</h3>
      <!-- /wp:generateblocks/headline -->
      
      <!-- wp:paragraph -->
      <p>Eriorro verum ad exerum qui rest, aut et ressimet et fugitatem facerch iliqui autecab id evelend escius plandamus inctatur aperferio maximinis enis dolo blabo. Ibus nus quis corum nuscia di te volesed ut dolorite odis iur?</p>
      <!-- /wp:paragraph -->
      
      <!-- wp:paragraph -->
      <p>Iquaecaeror sandit, sum laboribus quisi natur? Qui opta cones dignimus ut unt ipsam apiduciunt officil itaque vollit fugit, verum que sum fuga. Et ea prehenit fugitame a dolupiciis ne reriatem aut dolum liquis magnamusam, inciis sum sum es sum aces dollab il esti consenditi tem qui</p>
      <!-- /wp:paragraph -->
      <!-- /wp:generateblocks/container -->'),
      'categories'    => array( 'containers' ),
      'keywords'      => array( 'container,grad,gradient' ),
  )
);

register_block_pattern(
  'promed/duallist',
  array(
      'title'         => __( 'Dual List Container', 'duallist' ),
      'description'   => _x( 'Dual list Container','dual list container' ),
      'content'       => trim('<!-- wp:generateblocks/container {"uniqueId":"699b3976","paddingTop":"40","paddingRight":"30","paddingBottom":"40","paddingLeft":"30","backgroundColor":"#5b6e74","textColor":"#ffffff","isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/grid {"uniqueId":"cc31665d","columns":2,"isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/container {"uniqueId":"9d666896","isGrid":true,"gridId":"cc31665d","width":50,"widthMobile":100,"paddingRight":"90","paddingRightTablet":"40","paddingRightMobile":"0","borderSizeRight":"1","borderSizeRightMobile":"0","isDynamic":true,"blockVersion":2} -->
      <!-- wp:paragraph -->
      <p><strong>Since partnering with ProMedical IT in 2018, RMC has:</strong></p>
      <!-- /wp:paragraph -->
      
      <!-- wp:list -->
      <ul class="wp-block-list"><li>Grown from seven locations to more than twenty</li><li>Registered 99.999% daily uptime</li><li>Increased both patient and staff satisfaction</li><li>Increased efficiency, productivity, and security</li></ul>
      <!-- /wp:list -->
      <!-- /wp:generateblocks/container -->
      
      <!-- wp:generateblocks/container {"uniqueId":"a60a44c1","isGrid":true,"gridId":"cc31665d","width":50,"widthMobile":100,"paddingLeft":"90","paddingLeftTablet":"40","paddingLeftMobile":"0","isDynamic":true,"blockVersion":2} -->
      <!-- wp:paragraph -->
      <p><strong>ProMedical IT’s solution implementation consisted of five key components:</strong></p>
      <!-- /wp:paragraph -->
      
      <!-- wp:list {"ordered":true} -->
      <ol class="wp-block-list"><li>Analysis and Roadmaps</li><li>Compliance Into Care</li><li>Technological Standards</li><li>Supporting Strategic Growth</li><li>White-Glove Service</li></ol>
      <!-- /wp:list -->
      <!-- /wp:generateblocks/container -->
      <!-- /wp:generateblocks/grid -->
      <!-- /wp:generateblocks/container -->'),
      'categories'    => array( 'containers' ),
      'keywords'      => array( 'container,blog' ),
  )
);

register_block_pattern(
  'promed/threecolgold',
  array(
      'title'         => __( 'Three Column gold', 'threegold' ),
      'description'   => _x( 'Three Column gold','Three Column gold' ),
      'content'       => trim('<!-- wp:generateblocks/container {"uniqueId":"8be58068","paddingTop":"45","paddingRight":"60","paddingBottom":"45","paddingLeft":"60","marginTop":"50","marginBottom":"50","backgroundColor":"#a57719","isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/grid {"uniqueId":"aa7de780","columns":3,"horizontalGap":80,"horizontalGapTablet":40,"verticalGapMobile":40,"isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/container {"uniqueId":"0361cf3a","isGrid":true,"gridId":"aa7de780","width":33.33,"widthMobile":100,"isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/headline {"uniqueId":"9b642a2e","element":"h3"} -->
      <h3 class="gb-headline gb-headline-9b642a2e gb-headline-text">Optional header here</h3>
      <!-- /wp:generateblocks/headline -->
      
      <!-- wp:paragraph -->
      <p>Eriorro verum ad exerum qui rest, aut et ressimet et fugitatem facerch iliqui autecab id evelend escius plandamus inctatur aperferio maximinis enis dolo blabo. Ibus nus quis corum nuscia di te </p>
      <!-- /wp:paragraph -->
      <!-- /wp:generateblocks/container -->
      
      <!-- wp:generateblocks/container {"uniqueId":"10ff2a90","isGrid":true,"gridId":"aa7de780","width":33.33,"widthMobile":100,"isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/headline {"uniqueId":"d8a0ad1a","element":"h3"} -->
      <h3 class="gb-headline gb-headline-d8a0ad1a gb-headline-text">Optional header here</h3>
      <!-- /wp:generateblocks/headline -->
      
      <!-- wp:paragraph -->
      <p>Eriorro verum ad exerum qui rest, aut et ressimet et fugitatem facerch iliqui autecab id evelend escius plandamus inctatur aperferio maximinis enis dolo blabo. Ibus nus quis corum nuscia di te </p>
      <!-- /wp:paragraph -->
      <!-- /wp:generateblocks/container -->
      
      <!-- wp:generateblocks/container {"uniqueId":"54b0ee96","isGrid":true,"gridId":"aa7de780","width":33.33,"widthMobile":100,"isDynamic":true,"blockVersion":2} -->
      <!-- wp:generateblocks/headline {"uniqueId":"3f929d68","element":"h3"} -->
      <h3 class="gb-headline gb-headline-3f929d68 gb-headline-text">Optional header here</h3>
      <!-- /wp:generateblocks/headline -->
      
      <!-- wp:paragraph -->
      <p>Eriorro verum ad exerum qui rest, aut et ressimet et fugitatem facerch iliqui autecab id evelend escius plandamus inctatur aperferio maximinis enis dolo blabo. Ibus nus quis corum nuscia di te </p>
      <!-- /wp:paragraph -->
      <!-- /wp:generateblocks/container -->
      <!-- /wp:generateblocks/grid -->
      <!-- /wp:generateblocks/container -->'),
      'categories'    => array( 'containers' ),
      'keywords'      => array( 'container,blog' ),
  )
);


register_block_pattern(
  'promed/paddedcontainer',
  array(
      'title'         => __( 'Padded Container', 'paddedcontainer' ),
      'description'   => _x( 'Start Here','Padded Container container' ),
      'content'       => trim('<!-- wp:generateblocks/container {"uniqueId":"f01cda1f","paddingTop":"120","paddingBottom":"120","paddingTopMobile":"50","paddingBottomMobile":"50","isDynamic":true,"blockVersion":2} /-->'),
      'categories'    => array( 'containers' ),
      'keywords'      => array( 'container,padded' ),
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

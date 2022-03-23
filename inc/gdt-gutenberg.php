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
 
 
 }
 
 // Check if function exists and hook into setup.
 if( function_exists('acf_register_block_type') ) {
     add_action('acf/init', 'register_acf_block_types');
 }



?>

<?php
/**
 * Custom functions for this project? If yes, drop them here!
 */

  // If using acf icon picker - https://github.com/houke/acf-icon-picker -  modify the path to the icons directory
  add_filter( 'acf_icon_path_suffix', 'acf_icon_path_suffix' );

  function acf_icon_path_suffix( $path_suffix ) {
      return 'img/icons/';
  }
  
//used for Stackable blocks support - match to wrapper width 
global $content_width;
$content_width = 1300;

// -- set default container width for GenerateBlocks ------------------------
add_filter( 'generateblocks_defaults', function( $defaults ) {
	$defaults['container']['containerWidth'] = 1300;
	return $defaults;
  });

  add_action( 'wp', function() {
    add_filter( 'generateblocks_media_query', function( $query ) {
        $query['desktop'] = '(min-width: 1300px)';
        $query['tablet'] = '(max-width: 1120px)';
        $query['tablet_only'] = '(max-width: 1120px) and (min-width: 768px)';
        $query['mobile'] = '(max-width: 767px)';

        return $query;
    } );
}, 20 );

// stop jump to top on SRA form.
add_filter( 'gform_confirmation_anchor_4', '__return_false' );





function add_default_thumbnail($post_ID) {
  
  $post_thumbnail = get_post_meta($post_ID, '_thumbnail_id', true); 
  if ($post_thumbnail) return;
  $attached_image = get_children( "post_parent=$post_ID&post_type=attachment&post_mime_type=image&numberposts=1" );
  if ($attached_image) {
      foreach ($attached_image as $attachment_id => $attachment) {
          set_post_thumbnail($post_ID, $attachment_id);
      }
  } else {
      set_post_thumbnail($post_ID, 'https://wordpress-795941-2726862.cloudwaysapps.com/wp-content/uploads/2022/08/9c7797d4-1b4e-3a0e-8cdd-76b241bde759.jpg');
  }
};

add_action( 'publish_post', 'add_default_thumbnail', 10, 1 );
?>

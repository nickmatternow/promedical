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
$id = 'logogrid-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-logogrid';
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
   <?php if( have_rows('client_logos') ): ?>
    <?php while( have_rows('client_logos') ): the_row(); ?>
   <div>
   <?php
   $image = get_sub_field('logo'); 
   $size = 'full';
   if($image){
    echo wp_get_attachment_image($image, $size);
   }
   ?>
   </div>
   <?php endwhile; ?>
   <?php endif; ?>
</div>

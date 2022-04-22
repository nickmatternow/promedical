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
$id = 'hovercta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-hover-cta';
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
   <?php if( have_rows('cta_items') ): ?>
    <?php $count = 1; ?>
    <?php while( have_rows('cta_items') ): the_row(); ?>
   
 <div>
     <div class="c-hover-cta-init  c-hover-cta-init-<?php echo $count;?>"><span><?php echo get_sub_field('initials'); ?></span></div>
     
       <div class="c-hover-cta-content c-hover-cta-content-<?php echo $count;?>">
        <h4><?php echo get_sub_field('title'); ?></h4>
        <p><?php echo get_sub_field('description'); ?></p>
        </div>
 </div>
   <?php $count ++; ?>
   <?php endwhile; ?>
   
   <?php endif; ?>
</div>



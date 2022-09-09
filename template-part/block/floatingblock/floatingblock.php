<?php

/**
 * c-offset-box Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'c-offset-box-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-offset-box';
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
<div style="<?php the_field('box_position'); ?>:-<?php the_field('box_overlap'); ?>px" id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

   <div class="c-offset-box-inner">
       <?php if( get_field('box_title') ) { echo '<p class="u-featured-text">' . get_field('box_title') . '</p>'; }?>
       <?php if( get_field('box_content') ) { echo '<p>' . get_field('box_content') . '</p>'; }?>
       <?php 
       $link = get_field('box_button');
       if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <div class="c-btn-primary  c-blk-btn--ghost"><a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
       <?php endif; ?>
   </div>
</div>


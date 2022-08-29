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
$id = 'c-vis-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-vis';
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
   <?php if( have_rows('icon_blocks') ): ?>
    <?php while( have_rows('icon_blocks') ): the_row(); ?>
    <?php $iconSelector = get_sub_field('vis_icon');  ; ?>
   <div>
   <div class="circle-icon">
       <span class="icon-color-<?php echo $iconColor;?>" style="font-size:<?php echo $iconSize;?>px; <?php if ($float) { echo 'float: left;'; } ?> ">
       <svg class="icon icon-<?php echo $iconSelector ;?>">
            <use xlink:href="<?php bloginfo('template_url') ?>/img/symbol-defs.svg#icon-<?php echo $iconSelector;?>"></use>
        </svg>
       </span>
   </div>
   <p><?php echo get_sub_field('vis_title'); ?></p>
   <span class="c-vis-span"><?php echo get_sub_field('vis_span'); ?></span>
   </div>
   <?php endwhile; ?>
   <?php endif; ?>
</div>


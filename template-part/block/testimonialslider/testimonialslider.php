
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
$id = 'testimonialslider-' . $block['id'];
$idclass = 'testimonialslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-testimonialslider wp-block';
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
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?><?php echo $idclass;?>">
<div class="c-testimonial-wrap">
    <div class="c-testimonial-icon  circle-icon">
    <span><svg class="icon icon-Icons_Quote2"><use xlink:href="<?php bloginfo('template_url') ?>/img/symbol-defs.svg#icon-Icons_Quote2"></use></svg></span>
    </div>
    <div class="c-testimonialslider-slide splide">
        <div class="splide__track">
                <div class="splide__list">
        <?php if( have_rows('slides') ): ?>
            <?php while( have_rows('slides') ): the_row(); ?>
           <div class="splide__slide">
           <span><?php echo get_sub_field('citation'); ?></span>
           <p><?php echo get_sub_field('quote'); ?></p>
        
           </div>
           <?php endwhile; ?>
        
           <?php endif; ?>
        </div>
        </div>
    </div>
</div>
</div>

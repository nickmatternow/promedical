<!-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script> -->
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
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="c-dyk-wrap">
    <div class="c-dyk-icon circle-icon">
        <span>
            <svg class="icon icon-Icons_Lightbulb"><use xlink:href="<?php bloginfo('template_url') ?>/img/symbol-defs.svg#icon-Icons_Lightbulb"></use></svg>
        </span>
    </div>
    
       
               
    <div class="c-dyk-content">
        
        
               <span>Did you know?</span>
               <p><?php echo get_field('dyk_content'); ?></p>
               <?php if( get_field('dyk_source') ) { echo '<span class="dyk-source">' . get_field('dyk_source') . '</span>'; }?>
    </div>
        
 
     
    
    
</div>
</div>

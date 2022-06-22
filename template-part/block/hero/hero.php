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
$id = 'c-home-hero' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-home-hero';
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
    <?php
        $image = get_field('hero_image');
        $size = 'full';
        if($image){
        echo wp_get_attachment_image($image, $size);
        }
    ?>
    <div class="o-wrapper">
    <div class="c-home-hero-content"  data-speed="1.2">
      <?php if( get_field('hero_title') ) { echo '<h1>' . get_field('hero_title') . '</h1>'; }?>
      <?php if( get_field('hero_description') ) { echo '<p class="mb-8 c-home-hero-content-intro">' . get_field('hero_description') . '</p>'; }?>
      <?php if( get_field('hero_content') ) { echo '<p>' . get_field('hero_content') . '</p>'; }?>
      <?php 
        $link = get_field('button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="c-btn-primary"><a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
        <?php endif; ?>
   </div>
    </div>
   
</div>


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
$id = 'blockname-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blockname';
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
    <div class="c-map-wrap">
    <img height="783" width="1400" src="<?php bloginfo( 'template_url' ) ?>/img/map-full.svg" alt="Map BG" />
    <span class="c-map-marker"><span class="c-inner-circle">1</span><span class="c-outer-circle"></span></span>
    <span class="c-map-marker"><span class="c-inner-circle">33</span><span class="c-outer-circle"></span></span>
    <span class="c-map-marker"><span class="c-inner-circle">3</span><span class="c-outer-circle"></span></span>

    </div>
</div>


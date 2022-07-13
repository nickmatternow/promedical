<?php
/**
 * Block template file: template-part/block/block-icon.php
 * 
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$iconSelector = get_field('icon');  
$iconSize = get_field('icon_size');
// Colors
$iconColor = get_field('icon_color');


// Create id attribute allowing for custom "anchor" value.

$id = 'c-icon-block' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'c-icon-block';
if( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>

<div id="<?php echo esc_attr( $id ); ?>" class=" <?php echo esc_attr( $classes ); ?> <?php echo esc_attr( $className ); ?>">
<span class="icon-color-<?php echo $iconColor;?>" style="font-size:<?php echo $iconSize;?>px; <?php if ($float) { echo 'float: left;'; } ?> ">
<svg class="icon icon-<?php echo $iconSelector ;?>">
        <use xlink:href="<?php bloginfo('template_url') ?>/img/symbol-defs.svg#icon-<?php echo $iconSelector;?>"></use>
    </svg>
</span>
   
</div>
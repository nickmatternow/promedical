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
$id = 'c-button-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-blk-btn';
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

<?php 
$link = get_field('button_link_full');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
<?php endif; ?>
 
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  <?php if( get_field('dark_button') ) { echo 'c-blk-btn--dark'; }?> <?php if( get_field('large_button') ) { echo 'c-blk-btn--large'; }?> <?php if( get_field('text_button_link_only') ) { echo 'c-btn-text-only'; }?>">


<a target="<?php echo $link_target ;?>" href="<?php echo $link_url ;?>"><?php echo $link_title; ?></a>

</div>

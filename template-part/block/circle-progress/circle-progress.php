<?php

/**
 * mawslider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'c-circle-progress-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-circle-progress';
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



<div <?php if( get_field('value') ) { echo 'data-value ="' . get_field('value') . '"'; }?> id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

<div class="progress"><span></span></div> 
<?php if( get_field('cpb_title') ) { echo '<p>' . get_field('cpb_title') . '</p>'; }?>
</div>

<script>

   
</script>


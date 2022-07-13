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


// Colors
$color = get_field('background_color');


// Create id attribute allowing for custom "anchor" value.

$id = 'c-lower-cta-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'c-lower-cta';
if( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}


if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<?php 
$link = get_field('button');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
   
<?php endif; ?>


<div id="<?php echo esc_attr( $id ); ?>" class="alignfull is-color-<?php echo $color;?> <?php echo esc_attr( $classes ); ?> <?php echo esc_attr( $className ); ?>">

<div class="o-wrapper">
    <div class="c-lower-cta-content">
        <div>
           <?php if( get_field('title') ) { echo '<h3>' . get_field('title') . '</h3>'; }?>
           <?php if( get_field('subtitle') ) { echo '<p>' . get_field('subtitle') . '</p>'; }?>
        </div>
        <div>
           <div class="c-btn-primary ">
           <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
           </div>
        </div>
    </div>
</div>
   
</div>
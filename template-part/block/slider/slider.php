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
$id = 'mawslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'mawslider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

// Load values and assign slider settings.
$dots = get_field('show_dots') ?: 'false';



?>



<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">


<div id="maw-slider" class="splide" data-splide='{"pagination":<?php echo $dots;?>}'>
  <div class="splide__track">
		<ul class="splide__list">
			<li class="splide__slide">
				<img src="https://picsum.photos/600/300">
			</li>
			<li class="splide__slide">
            <img src="https://picsum.photos/600/300">
			</li>
			<li class="splide__slide">
            <img src="https://picsum.photos/600/300">
			</li>
		</ul>
  </div>
</div>
<?php if( get_field('dot_position') ) {  }?>

<!-- Let Setup our block specific styles. -->
<style type="text/css">
/* Position Slider Dots */
<?php if( get_field('dot_position') == "Below Slider" ) { ?>
    #<?php echo $id;?> {
        padding-bottom: 20px;
    }
    #<?php echo $id;?> .splide__pagination {
        bottom: -20px;
    }
    .acf-block-preview #<?php echo $id;?> .splide__pagination {
        bottom: -40px;
    }
<?php }?>
           
        
    </style>

</div>



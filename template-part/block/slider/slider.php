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
$className = 'c-mawslider';
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


        <?php if( have_rows('slide_content') ): ?>
         <?php while( have_rows('slide_content') ): the_row(); ?>
        
         <li class="splide__slide">
            <?php
            $image = get_sub_field('slide_image');
            $size = 'large';
            if($image){
             echo wp_get_attachment_image($image, $size);
            }
            ?>
        </li>
        <?php endwhile; ?>
        <?php endif; ?>

	



		</ul>
  </div>
</div>

<?php if( get_field('dot_position') == "Below Slider" ) { ?>

<!-- Let Setup our block specific styles. -->
<style type="text/css">
/* Position Slider Dots */
    #<?php echo $id;?> {
        padding-bottom: 50px;
    }
    #<?php echo $id;?> .splide__pagination {
        bottom: -36px;
    }
    .acf-block-preview #<?php echo $id;?> .splide__pagination {
        bottom: -50px;
    }


        
    </style>
    <?php }; ?>

</div>



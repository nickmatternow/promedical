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
$id = 'c-stackslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-stackslider';
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



   <div id="slider"> 
  <div class="dp-wrap"> 
    <div id="dp-slider">
      <?php if( have_rows('stack_slider') ): ?>
        <?php $count = 1; ?>
       <?php while( have_rows('stack_slider') ): the_row(); ?>
       <div class="dp_item" data-class="<?php echo $count;?>" data-position="<?php echo $count;?>">
        <div class="dp-content">
        <div class="dp-img">
          <?php
          $image = get_sub_field('ss_image');
          $size = 'full';
          if($image){
           echo wp_get_attachment_image($image, $size, '', array( "class" => "img-fluid" ));
          }
          ?>
          <!-- <img class="img-fluid" src="https://picsum.photos/300/470" alt="investing"> -->
        </div>
          <div class="dp-content-inner">
          <h2><?php echo get_sub_field('ss_name'); ?></h2>
              <p><?php echo get_sub_field('ss_bio'); ?></p> 
          </div>
         
        </div>
      </div>
      
      <?php $count ++; ?>
      <?php endwhile; ?>

      <?php endif; ?>


      



    </div>
    
    <span id="dp-next">
    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
    </span>

    <span id="dp-prev">
    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
    </span>

    

    <ul id="dp-dots">
      <li data-class="1" class="active"></li>
      <li data-class="2"></li>
      <li data-class="3"></li>
      <li data-class="4"></li>


    </ul>
  </div>
</div>







</div>


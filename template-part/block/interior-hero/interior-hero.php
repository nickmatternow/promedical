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
$id = 'c-interior-hero' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-interior-hero';
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
                $image = get_field('hero_banner');
                $size = 'full';
                ;
                if($image){
                echo wp_get_attachment_image($image, $size, "", array( "class" => "c-interior-hero-img" ));
                }
                ?>

  <div class="o-wrapper u-relative">
      <div class="c-interior-hero-icon">
          <span></span>
      </div>
      <div class="grid-x">
          <div class="cell medium-5 c-interior-hero-content-wrap">
          <div class="c-interior-hero-content">
    <h1>
        <?php if( get_field('page_title') ) { echo  get_field('page_title'); }else{echo the_title();}?>
  
    </h1>
    <?php if( get_field('page_subtitle') ) { echo '<p class="c-page-sub-title">' . get_field('page_subtitle') . '</p>'; }?>
    </div>
          </div>
          <div class="cell medium-7">
              
            </div>
    
  </div>
</div>


          
   
</div>


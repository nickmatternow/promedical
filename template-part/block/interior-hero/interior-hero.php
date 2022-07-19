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

$iconname = get_field('hero_icon'); 

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
   
<div>

<?php
                $image = get_field('hero_banner');
                $size = 'full';
                ; 
                if($image){
                echo wp_get_attachment_image($image, $size, "", array( "class" => "c-interior-hero-img","loading" => "false", "data-speed" => "1.1" ));
                }
                ?>

  <div class="o-wrapper u-relative">
    <?php if( get_field('show_icon') ) { ?>
      <div class="c-interior-hero-icon">
          <span>
            <svg class="icon icon-<?php echo $iconname;?>"><use xlink:href="<?php bloginfo('template_url') ?>/img/symbol-defs.svg#icon-<?php echo $iconname;?>"></use></svg>
          </span>
      </div>
    <?php }; ?>
      <div class="grid-x pt-8" >
          <div class="cell medium-7 c-interior-hero-content-wrap">
          <div class="c-interior-hero-content">
    <h1>
        <?php if( get_field('page_title') ) { echo  get_field('page_title'); }else{echo the_title();}?>
  
    </h1>
    <?php if( get_field('page_subtitle') ) { echo '<p class="c-page-sub-title">' . get_field('page_subtitle') . '</p>'; }?>
    </div>
          </div>
          <div class="cell medium-5">
              
            </div>
    
  </div>
</div>


</div>  
   
</div>


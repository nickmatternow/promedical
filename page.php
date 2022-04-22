<?php get_header(); ?>

<div class="o-layout-row">
  <main class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">

  <div class="c-hero jarallax" data-jarallax data-speed="0.8" >

    <?php
    $image = get_field('hero_banner');
    $size = 'full';
   ;
      if($image){
      echo wp_get_attachment_image($image, $size, "", array( "class" => "jarallax-img" ));
      }
    ?>
      <div class="o-wrapper-wide">
        <div class="c-hero-content">
        <h1>
          <?php echo the_title(); ?>
        </h1>
        <?php if( get_field('page_subtitle') ) { echo '<p class="c-page-sub-title">' . get_field('page_subtitle') . '</p>'; }?>
        </div>
      </div>
    </div>

   

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <section class="editor-content  clearfix">
        <?php the_content(); ?>
      </section> 
      <!-- /editor-content -->
    <?php endwhile; endif; // END main loop (if/while) ?>
  </main>
  <!-- /container -->
</div>
<!-- /layout-row-->

<?php // IF USING PARTS -> get_template_part( 'template-part/name-of-part' ); ?>

<?php get_footer(); ?>

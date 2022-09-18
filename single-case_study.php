<?php get_header(); ?>

<div class="o-layout-row">
  
  <main class="mt-30 mb-20 " role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
  <div class="">  
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <header class="c-article-header">
       

           


      </header>
      <!-- /article-header -->
      <article <?php post_class('editor-content'); ?> role="article">
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
      <?php get_template_part( 'template-part/post/post-nav' ); ?>
    <?php else : ?>
      <?php get_template_part( 'template-part/post/not-found' ); ?>
    <?php endif; ?>

    <div class="u-padded-wrap">
      <div class="o-wrapper-narrow">
      <div class="c-back-links">
        <div class="c-btn-text-only"><a href="#">Back to Customer Success</a></div>
        <div class="c-btn-text-only"><a href="/resources/">Back to Resources</a></div>
      </div>
      </div>
    </div>

    </div>
  </main>
</div>
<!-- /layout-row-->

<?php get_footer(); ?>

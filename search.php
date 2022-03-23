<?php get_header(); ?>

<div class="o-layout-row">
  <main class="o-wrapper-wide" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">

    <h1 class=""><span>Search Results for:</span> <?php echo esc_attr(get_search_query()); ?></h1>
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?> role="article">
        <header class="c-article-header">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <?php get_template_part( 'template-part/post/entry-meta' ); ?>
        </header>
        <!-- /c-article-header -->
        <section class="c-excerpt-content">
          <?php the_excerpt(); ?>
        </section>
        <!-- /c-excerpt-content -->
      </article>
      <!-- /article -->
    <?php endwhile; ?>

      <?php get_template_part( 'template-part/post/post-nav' ); ?>

    <?php else : ?>
      <article class="PostNotFound">
        <header class="ArticleHeader">
          <h4><?php _e("Sorry, No Results.", "flexdev"); ?></h4>
        </header>
        <section class="EntryContent">
          <p><?php _e("Please try another search.", "flexdev"); ?></p>
        </section>
      </article>
    <?php endif; ?>

  </main>
</div>
<!-- /layout-row-->

<?php get_footer(); ?>

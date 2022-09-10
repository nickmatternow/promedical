<?php get_header(); ?>

<div class="o-layout-row">
  <main class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
<div class="editor-content">
<div id="" class="c-interior-hero alignfull">
   
   <div>
   
   <img src="https://wordpress-795941-2726862.cloudwaysapps.com/wp-content/uploads/2022/08/Healthcare_Hero_1920x7451.png" class="c-interior-hero-img" alt="" loading="false" data-speed="1.1" srcset="https://wordpress-795941-2726862.cloudwaysapps.com/wp-content/uploads/2022/08/Healthcare_Hero_1920x7451.png 1920w, https://wordpress-795941-2726862.cloudwaysapps.com/wp-content/uploads/2022/08/Healthcare_Hero_1920x7451-300x116.png 300w, https://wordpress-795941-2726862.cloudwaysapps.com/wp-content/uploads/2022/08/Healthcare_Hero_1920x7451-1024x397.png 1024w, https://wordpress-795941-2726862.cloudwaysapps.com/wp-content/uploads/2022/08/Healthcare_Hero_1920x7451-768x298.png 768w, https://wordpress-795941-2726862.cloudwaysapps.com/wp-content/uploads/2022/08/Healthcare_Hero_1920x7451-1536x596.png 1536w" sizes="(max-width: 1920px) 100vw, 1920px" style="opacity: 1; visibility: inherit;" width="1920" height="745">
     <div class="o-wrapper u-relative">
             <div class="grid-x pt-8">
             <div class="cell medium-7 c-interior-hero-content-wrap">
             <div class="c-interior-hero-content">
             <h1 class=""><span>Search Results for:</span> <?php echo esc_attr(get_search_query()); ?></h1>
               </div>
             </div>
             <div class="cell medium-5">
                 
               </div>
       
     </div>
   </div>
   
   
   </div>  
      
   </div>

    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?> role="article">
        <header class="c-article-header">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          
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
</div>
   

  </main>
</div>
<!-- /layout-row-->

<?php get_footer(); ?>

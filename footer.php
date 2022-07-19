  <footer class="o-section c-page-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
    <div class="c-page-footer-top">
      <div class="o-wrapper">
      <div class="footer-grid">
          <div class="cell    u-text-right">
          <div class="c-logo-footer">
          <a href="/" rel="nofollow">
            <img src="<?php bloginfo('template_url') ?>/img/ProMed_Logo.png" alt="<?php bloginfo('name'); ?>" />
          </a>
        </div> <!-- /c-main-logo -->
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
              <?php dynamic_sidebar( 'footer-1' ); ?>
            <?php endif; ?>
          </div>
          <div class="cell  ">
          <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
            <?php dynamic_sidebar( 'footer-2' ); ?>
          <?php endif; ?>
          </div>
          <div class="cell  ">
          <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
            <?php dynamic_sidebar( 'footer-3' ); ?>
          <?php endif; ?>
          </div>
          <div class="cell  ">
          <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
            <?php dynamic_sidebar( 'footer-4' ); ?>
          <?php endif; ?>
          </div>
          <div class="cell  ">
          <?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
            <?php dynamic_sidebar( 'footer-5' ); ?>
          <?php endif; ?>
          social block
          </div>
        </div>
      </div>
      <!-- /.o-wrapper-wide -->
    </div>
    <div class="c-lower-footer">
    <div class="o-wrapper">
        <div class="">
         Copyright &copy; <?php echo date('Y'); ?> LiV | Created by Matter Communications.
        </div>
    </div>
  </footer>
  <!-- /.c-page-footer -->

  <?php get_template_part( 'template-part/navigation/nav-modal' ); ?>

  <!-- all js scripts are loaded in lib/gdt-enqueues.php -->
  <?php wp_footer(); ?>
          <!-- smooth scroller -->
          </div>
          </div>
          <!-- smooth scroller -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>

</body>

</html> 

  <footer class="o-section c-page-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
    <div class="o-wrapper-wide">
    <div class="grid-x">
        <div class="cell  medium-3">
          <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
            <?php dynamic_sidebar( 'footer-1' ); ?>
          <?php endif; ?>
        </div>
        <div class="cell  medium-3">
        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
          <?php dynamic_sidebar( 'footer-2' ); ?>
        <?php endif; ?>
        </div>
        <div class="cell  medium-3">
        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
          <?php dynamic_sidebar( 'footer-3' ); ?>
        <?php endif; ?>
        </div>
        <div class="cell  medium-3">
        <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
          <?php dynamic_sidebar( 'footer-4' ); ?>
        <?php endif; ?>
        </div>
      </div>
      <!-- /.c-footer-widgets -->
      <div class="c-logo-copy-wrap  u-align-side-edges">
        <div>
          Logo or Something here....
        </div>
        <div class="">
          &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
        </div>
      </div>
      <!-- /.c-logo-copy-wrap -->
    </div>
    <!-- /.o-wrapper-wide -->
  </footer>
  <!-- /.c-page-footer -->

  <?php get_template_part( 'template-part/navigation/nav-modal' ); ?>

  <!-- all js scripts are loaded in lib/gdt-enqueues.php -->
  <?php wp_footer(); ?>

</body>
</html>

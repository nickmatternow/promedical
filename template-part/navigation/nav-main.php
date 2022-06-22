<nav id="site-navigation" class="c-main-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
  <?php // gdt_nav_menu( 'main-menu', 'c-main-menu' ); // Adjust using Menus in WordPress Admin ?>
  <?php 
  wp_nav_menu( array(
    'theme_location' => 'main-menu',
    'container_class' => 'FirstMenu',
    'depth'   => 2,
    'menu_class' => 'c-main-menu',
    'walker' => new Split_Menu_Walker
    ) );
  ; ?>
</nav>

<nav id="site-navigation" class="c-main-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
  <ul class="c-main-menu">
    <?php
    $pageargs = array(
      'depth' => 2,
      'exclude' => '',
      'title_li' => '',
      'sort_column' => 'menu_order',
      'sort_order' => 'asc',
    );
    wp_list_pages($pageargs);
    ?>
  </ul>
  <?php // gdt_nav_menu( 'main-menu', 'c-main-menu' ); // Adjust using Menus in WordPress Admin ?>
</nav>

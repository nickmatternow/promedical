<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  
  <?php // Are you using REAL FAVICON GENERATOR!? You should. If so...  ?>
  <?php // Put generated code in favicon-head.php file; then uncomment line below ?>
  <?php // get_template_part( 'template-part/favicon-head' ); ?>

  <?php // other html head stuff (before WP/theme scripts are loaded) ------- ?>
  <link rel="stylesheet" href="https://use.typekit.net/atj0ztq.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> 

  <?php wp_head(); // wordpress head functions -- DONOTREMOVE ?>

  <?php // START Google Analytics here ?>
  <?php // END Analytics ?>
</head>

<body <?php body_class(pretty_body_class()); ?> itemscope itemtype="https://schema.org/WebPage">
<div id="smooth-wrapper">
<div id="smooth-content">
  <header id="c-page-header" class="o-section c-page-header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
  <div class="c-page-header-upper">
  <div class="o-wrapper-wide  u-relative">
  <?php get_template_part( 'template-part/navigation/nav-tertiary' ); ?>
</div>
  </div> 
  <div class="o-wrapper-wide  u-relative">


      <?php get_template_part( 'template-part/navigation/nav-main' ); ?>

      <div class="c-mobile-logo">
<img src="<?php bloginfo( 'template_url' ) ?>/img/ProMed_Logo.png" alt="Promedical IT Logo - white" />
</div>  
     
<div class="c-modal-nav-button-wrap">
      <a class="toggle hc-nav-trigger mobile-nav" href="#" role="button" aria-label="Open Menu" aria-controls="hc-nav-1" aria-expanded="false">&#8801;</a>
      </div>
    </div>
    <!-- /o-wrapper-wide-->
    <div id="slide-search" class="c-slide-search">
      <div class="o-wrapper-wide  u-relative "> 
        <div class="grid-x pt-3">
          <div class="cell medium-5">
            <img src="<?php bloginfo( 'template_url' ) ?>/img/ProMed_Logo.png" alt="Promedical IT Logo - white" />

          </div>
          <div class="cell medium-7">
          <form role="search" method="get" id="search-form" class="c-search-form" action="<?php echo home_url( '/' ); ?>">
  <div>
    <label for="s" class="">Please type your search term here</label>
    <input type="search" id="s" name="s" value="" class="search-input" placeholder="Search here…" />
    <button type="submit" id="search-submit" class="search-submit"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392l.604.646l2.121-2.121l-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5s5 2.243 5 5s-2.243 5-5 5z"/></svg></button>
  </div>
</form>

          </div>
        </div>
        <span class="c-slide-close"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8L4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></span>
      </div>
    </div>
  </header> 
  <!-- /c-page-header -->

<?php
  
/*********************************************
 MENU SETUP - #navigation
**********************************************/


// setup wp_nav_menu stuff.............

// registering WP nav menus
register_nav_menus(
  array(
    'main-menu' => 'Primary Menu',           // main nav menu
    'tertiary-menu' => 'Tertiary Menu',      // tertiary nav menu
    'mobile-menu' => 'Mobile Menu'      // mobile nav menu
  )
);


/* usage: <?php gdt_nav_menu( 'main-menu', 'c-menu-main' ); ?> */
function gdt_nav_menu( $theme_location, $class )
{
  $menu = null;
  if (has_nav_menu( $theme_location )) {
    $menu = wp_nav_menu(array(
      'container' => false,
      'theme_location' => $theme_location,
      'menu_class' => $class . '',
      'echo' => 0,
    ));
  }
  echo $menu;
}




/*
 * Adds menu data support for HC Off-canvas Nav
 */

$hc_nav_menu_walker;

class HC_Walker_Nav_Menu extends Walker_Nav_Menu {

  public function start_lvl(&$output, $depth = 1, $args = array()) {
    global $hc_nav_menu_walker;
    $hc_nav_menu_walker->start_lvl($output, $depth, $args);
  }

  public function end_lvl(&$output, $depth = 0, $args = array()) {
    global $hc_nav_menu_walker;
    $hc_nav_menu_walker->end_lvl($output, $depth, $args);
  }

  public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $hc_nav_menu_walker;

    $item_output = '';

    $hc_nav_menu_walker->start_el($item_output, $item, $depth, $args, $id);

    if ($item->current_item_parent) {
      $item_output = preg_replace('/<li/', '<li data-nav-active', $item_output, 1);
    }

    if ($item->current) {
      $item_output = preg_replace('/<li/', '<li data-nav-highlight', $item_output, 1);
    }

    $output .= $item_output;
  }

  public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $hc_nav_menu_walker;
    $hc_nav_menu_walker->end_el($output, $item, $depth, $args, $id);
  }
}

add_filter('wp_nav_menu_args', function($args) {
  global $hc_nav_menu_walker;

  if (!empty($args['walker'])) {
    $hc_nav_menu_walker = $args['walker'];
  }
  else {
    $hc_nav_menu_walker = new Walker_Nav_Menu();
  }

  $args['walker'] = new HC_Walker_Nav_Menu();

  return $args;
});


// class Kvcodes_Split_nav_walker extends Walker_Nav_Menu {

//   var $current_menu = null;
//   var $break_point = null;
 
//   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
 
//   global $wp_query;
 
//   if( !isset( $this->current_menu ) ){
//   $this->current_menu = wp_get_nav_menu_object( $args->menu );
//   // echo json_encode($args)."-";
//   }
  
//   if( !isset( $this->break_point ) )
//   $this->break_point = ceil( $this->current_menu->count / 2 ) + 1; 
 
//   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
//   $class_names = $value = '';
//   // $this->break_point = 3; 
//   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
//   $classes[] = 'menu-item-' . $item->ID;
 
//   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
//   $class_names = ' class="' . esc_attr( $class_names ) . '"';
 
//   $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
//   $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 

//   if( $this->break_point == $item->menu_order )
//   $output .= $indent . '</li></ul> </div>
//   <div class="c-logo-main">
//   <a href="/" rel="nofollow">
//   <img src="'.get_bloginfo('template_url').'/img/ProMed_Logo.png" alt="" />
//   </a>
//   </div>
//   <div class="SecondMenu"><ul id="menu-main" class="c-main-menu"><li' . $id . $value . $class_names .'>';
//   else
//   $output .= $indent . '<li' . $id . $value . $class_names .'>';
 
//   $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
//   $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
//   $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
//   $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
 
//   $item_output = $args->before;
//   $item_output .= '<a'. $attributes .'>';
//   $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
//   $item_output .= '</a>';
//   $item_output .= $args->after;
 
//   $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//   }
//  }
  







 class Split_Menu_Walker extends Walker_Nav_Menu {

  public $break_point = null;
  public $displayed = 0; 

function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

  global $wp_query;

  if( !isset( $this->break_point ) ) {
      $menu_elements = wp_get_nav_menu_items( $args->menu );
      $top_level_elements = 0;

      foreach( $menu_elements as $el ) {
          if( $el->menu_item_parent === '0' ) {
              $top_level_elements++;
          }
      }
      $this->break_point = ceil( $top_level_elements / 2 ) ;
   }   

      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
      

      $class_names = $value = '';

      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID ;

      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = ' class="' . esc_attr( $class_names ) . '"';

      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $indent , $item, $args );
      $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

      if( $this->break_point == $this->displayed && $depth == 0 )
          $output .= $indent . '</ul></div><div class="c-logo-main"><a href="/" rel="nofollow"><img src="'.get_bloginfo('template_url').'/img/ProMed_Logo.png" alt="" /></a></div><div class="SecondMenu"><ul class="c-main-menu"><li' . $id . $value . $class_names .'>';
      else
          $output .= $indent . '<li' . $id . $value . $class_names .'>';

      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;

      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
      if( $item->menu_item_parent === '0' ) {
        $this->displayed++;
    }

    
  }
}


// </ul></div>
//           <div class="c-logo-main">
//           <a href="/" rel="nofollow">
//           <img src="'.get_bloginfo('template_url').'/img/ProMed_Logo.png" alt="" />
//           </a>
//           </div><div class="SecondMenu"><ul class="c-main-menu">








?>
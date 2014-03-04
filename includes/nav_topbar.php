<?php

$contact  = '<li class="has-dropdown not-click"><a href="/contact">Contact Us</a>'."\n";
$contact .= ' <ul class="dropdown">'."\n";
$contact .= '   <li><a href="mailto:'.bb_r( 'bb_theme_contact_email', 'customizer' ).'"">'.bb_r( 'bb_theme_contact_email', 'customizer' ).'</a></li>'."\n";
$contact .= '   <li><a>'.bb_r( 'bb_theme_contact_phone', 'customizer' ).'</a></li>'."\n";
$contact .= '   <li class="divider"></li>'."\n";
$contact .= '    <li><a href="/contact">Enquiry Form &rarr;</a></li>'."\n";
$contact .= ' </ul>'."\n";
$contact .= '</li>'."\n";

$args = array(
  'sort_order' => 'ASC',
  'sort_column' => 'menu_order',
  'hierarchical' => 1,
  'child_of' => 0,
  'parent' => 0,
  'post_type' => 'page',
  'post_status' => 'publish'
);
$pages = get_pages( $args );
//$pages = array_reverse( $pages );
foreach ( $pages as $page ) {
  unset( $liclass );
  unset( $sub );
  if ( $page->post_name !='contact' ) {
    //var_dump($page);
    $children = get_pages( 'child_of='.$page->ID.'&sort_order=ASC&sort_column=menu_order' );
    if( count( $children ) != 0 ) {
      $liclass = "has-dropdown";
      $sub .= '<ul class="dropdown">';
      foreach ( $children as $child ) {
        $sub .= '<li><a href="'.site_url().'/'.$child->post_name.'"';
        if ( is_page( $child->ID ) ) $sub .= ' class="current_page"';
        $sub .=  '>'.$child->post_title.'</a></li>';
      }
      // $sub.='<li class="divider"></li><li><a href="'.site_url().'/services">All Services &rarr;</a></li>';
      $sub .= '</ul>';
    }
    $menu .= '<li class="'.$liclass.'"><a href="'.site_url().'/'.$page->post_name.'"';
    if ( is_page( $page->ID ) || strpos( $sub, 'current_page' ) > 0 ) $menu .= ' class="current_page"';
    $menu .= '>';
    $menu .= $page->post_title;
    $menu .= '</a>'.$sub.'</li>';
  }
}
//var_dump($menu);
//var_dump( __( get_theme_mod( 'bb_theme_topbar_pages' ) ) );
?>
<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name hide-for-medium-up">
      <img src="<?php bb_e( 'bb_theme_image_logo_small', 'customizer' ); ?>" style="margin:5px;" >
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span><?php bb_e( 'bb_theme_topbar_title', 'customizer' ); ?></span></a></li>
      </ul>

      <section class="top-bar-section">
        <!-- Left Nav Section -->
        <ul class="left">
<?php if ( __( get_theme_mod( 'bb_theme_contact_position' ) ) == 'left' ) echo $contact; ?>
<?php if ( __( get_theme_mod( 'bb_theme_topbar_pages' ) ) == 1 ) echo $menu; ?>
<?php

$menu_name = 'top_bar_left';
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ 'top_bar_left' ] ) ) {
  $menu = wp_get_nav_menu_object( $locations[ 'top_bar_left' ] );
  $menu_items = wp_get_nav_menu_items( $menu->term_id );

  foreach ( (array) $menu_items as $key => $menu_item ) {
      $title = $menu_item->title;
      $url = $menu_item->url;
      echo '<li><a href="' . $url . '">' . $title . '</a></li>';
  }
} ?>
        </ul>

        <!-- Right Nav Section -->
        <ul class="right">
<?php if ( __( get_theme_mod( 'bb_theme_topbar_pages' ) ) == 2 ) echo $menu; ?>
<?php

$menu_name = 'top_bar_right';
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ 'top_bar_right' ] ) ) {
  $menu = wp_get_nav_menu_object( $locations[ 'top_bar_right' ] );
  $menu_items = wp_get_nav_menu_items($menu->term_id);

  foreach ( (array) $menu_items as $key => $menu_item ) {
      $title = $menu_item->title;
      $url = $menu_item->url;
      echo '<li><a href="' . $url . '">' . $title . '</a></li>';
  }
}
?>

<?php if ( __( get_theme_mod( 'bb_theme_contact_position' ) ) == 2 ) echo $contact; ?>
        </ul>
      </section>
    </nav>
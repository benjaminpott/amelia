<?php

/*
 * last updated: 31/03/2014
 *
 */

function fx_theme_row( $partname, $class='', $path='', $type = 0 ){
  fx_theme_part( 'row', $partname, $class, $path, $type );
}

function fx_theme_section( $partname, $class='', $path='', $type = 0 ){
  fx_theme_part( 'section', $partname, $class, $path, $type );
}

function fx_theme_part($part, $partname, $class='', $path='', $type = 0 ){

  // $type = 0 = to be managed by theme customizer
  // $type = 1 = full width
  // $type = 2 = within a row

  if ( __( get_theme_mod( 'bb_theme_'.$partname.'_show' ) ) != 0 ) { // <-- hide row

    if ( ( $partname != 'topbar' && $path != 'includes/nav-topbar.php' ) || $type == 0 ) fx_theme_part_style( $part, $partname ) ; // <-- add style block from customizer
    fx_theme_part_start( $part, $partname, $class, $type ); // <-- open the wrapper
    fx_theme_part_content ( $partname, $path ); // <-- gets the theme part
    fx_theme_part_end ( $part, $partname );  // <-- close the wrapper

  }
  return;

}

function fx_theme_part_style( $part, $partname ){

  // setup the css
   _e( "<style>"."\n" );
   _e( "  #'".$part."-".$partname." {"."\n" );
   _e( "    background-color: ".__( get_theme_mod( 'bb_theme_'.$partname.'_bg_color' ) ).";"."\n" );
   _e( "    background-image: url(".__( get_theme_mod( 'bb_theme_'.$partname.'_bg_image' ) ) .");"."\n" );
   _e( "    backgound: ".__( get_theme_mod( 'bb_theme_'.$partname.'_bg_css' ) )."; }"."\n" );
   _e( "  }"."\n" );
   _e( "</style>"."\n" );

}

function fx_theme_part_start( $part, $partname, $class, $type ){

  // setup the wrapper
  _e( "\n".'<!-- '.$partname.' row -->'."\n", 'bb_' );
  _e( '<div class="full-row '.$class.'" id="row-'.$partname.'">'."\n", 'bb_' );
  if ( __( get_theme_mod( 'bb_theme_'.$partname.'_show' ) ) == 1 || $type == 1 ) _e( ' <div>'."\n" );
  if ( __( get_theme_mod( 'bb_theme_'.$partname.'_show' ) ) == 2 || $type == 2 ) _e( ' <div class="row ">'."\n" ); // <-- inner row

}

function fx_theme_part_content( $partname, $path='' ){

    // get the template
    if ( substr( $path, -3 ) == 'php' ) {
      include( $path ); // <-- use row_templatename.php & ensure template in the incldues directory
    } else {
      get_template_part( $partname ); // <-- get the template as a theme part from the root directory
    }

}

function fx_theme_part_end ( $part, $partname ){

  _e( ' </div>'."\n", 'bb_' );
  _e( '</div>'."\n", 'bb_' );
  _e( '<!-- end '.$partname.' row -->'."\n", 'bb_' );

}
function fx_theme_part_row_shortcode( $atts, $content = null ) {

  extract( $atts );
  $part = 'row';

  fx_theme_part_start( $part, $name, $class, $type );
  _e( $content , 'bb_' );
  fx_theme_part_end ( $part, $name );

}
function fx_theme_part_section_shortcode( $atts, $content = null ) {

  extract( $atts );
  $part = 'section';

  fx_theme_part_start( $part, $name, $class, $type );
  _e( $content , 'bb_' );
  fx_theme_part_end ( $part, $name );

}
add_shortcode( 'row', 'fx_theme_part_row_shortcode' );
add_shortcode( 'section', 'fx_theme_part_section_shortcode' );

?>
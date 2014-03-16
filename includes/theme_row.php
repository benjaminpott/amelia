<?php

/*
 * last updated: 16/03/2014
 *
 */

function fx_theme_row( $rowname, $class='', $path='', $type=0 ){

  // $type = 0 = hidden
  // $type = 1 = full width
  // $type = 2 = within a row

  if ( __( get_theme_mod( 'bb_theme_'.$rowname.'_show' ) ) != 0 ) { // <-- hide row

    if ( ( $rowname != 'topbar' && $path != 'includes/nav-topbar.php' ) || $type == 0 ) fx_theme_row_style( $rowname ) ; // <-- add style block from customizer
    fx_theme_row_start( $rowname, $class, $type ); // <-- open the wrapper
    fx_theme_row_part ( $rowname, $path ); // <-- gets the theme part
    fx_theme_row_end ( $rowname );  // <-- close the wrapper

  }
  return;

}

function fx_theme_row_style( $rowname ) {

  // setup the css
   _e( "<style>"."\n" );
   _e( "  #row-".$rowname." {"."\n" );
   _e( "    background-color: ".__( get_theme_mod( 'bb_theme_'.$rowname.'_bg_color' ) ).";"."\n" );
   _e( "    background-image: url(".__( get_theme_mod( 'bb_theme_'.$rowname.'_bg_image' ) ) .");"."\n" );
   _e( "    backgound: ".__( get_theme_mod( 'bb_theme_'.$rowname.'_bg_css' ) )."; }"."\n" );
   _e( "  }"."\n" );
   _e( "</style>"."\n" );

}

function fx_theme_row_start( $rowname, $class, $type ) {

  // setup the wrapper
  _e( "\n".'<!-- '.$rowname.' row -->'."\n", 'bb_' );
  _e( '<div class="full-row '.$class.'" id="row-'.$rowname.'">'."\n", 'bb_' );
  if ( __( get_theme_mod( 'bb_theme_'.$rowname.'_show' ) ) == 1 || $type == 1 ) _e( ' <div>'."\n" );
  if ( __( get_theme_mod( 'bb_theme_'.$rowname.'_show' ) ) == 2 || $type == 2 ) _e( ' <div class="row ">'."\n" ); // <-- inner row

}

function fx_theme_row_part ( $rowname, $path='' ) {

    // get the template
    if ( substr( $path, -3 ) == 'php' ) {
      include( $path ); // <-- use row_templatename.php & ensure template in the incldues directory
    } else {
      get_template_part( $rowname ); // <-- get the template as a theme part from the root directory
    }

}

function fx_theme_row_end ( $rowname ) {

  _e( ' </div>'."\n", 'bb_' );
  _e( '</div>'."\n", 'bb_' );
  _e( '<!-- end '.$rowname.' row -->'."\n", 'bb_' );

}

?>
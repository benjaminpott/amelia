<!doctype html>
<html>

  <head>
    <title><?php bb_e( 'site_title' ) ?></title>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="TBD">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="<?php bb_e( 'bb_theme_image_favicon', 'customizer' ); ?>" type="image/png" />
    <link rel="stylesheet" href="<?php bb_e( 'theme_url' ); ?>/css/foundation.css" />
    <link rel="stylesheet" href="<?php bb_e( 'theme_url' ); ?>/css/normalize.css" />
    <link rel="stylesheet" href="<?php bb_e( 'theme_url' ); ?>/css/theme.css?v=<?php _e( date('c') ); ?>" />

<?php if(get_option('bb_gf1')) bb_e( '    <link href="'.get_option('bb_gf1').'" rel="stylesheet" type="text/css">' ); ?>
<?php if(get_option('bb_gf2')) bb_e( '    <link href="'.get_option('bb_gf2').'" rel="stylesheet" type="text/css">' ); ?>
<?php if(get_option('bb_gf3')) bb_e( '    <link href="'.get_option('bb_gf3').'" rel="stylesheet" type="text/css">' ); ?>

    <link rel="stylesheet" href="<?php bb_e( 'theme_url' ); ?>/icons/foundation-icons.css" />
    <link rel="stylesheet" href="<?php bb_e( 'theme_url' ); ?>/icons/foundation-icons.eot" />

    <script src="<?php bb_e( 'theme_url' ); ?>/js/modernizr.js"></script>

<?php wp_head(); ?>
  </head>
  <body>

    <!-- start everything -->
    <div class="s-everything">

<?php // shows logo row based on theme customiser
if ( __( get_theme_mod( 'bb_theme_toprow_show' ) ) != 0 ) { ?>
      <!-- logo row -->
      <div class="hide-for-small show-for-medium-up" id="toprow">
<?php if ( __( get_theme_mod( 'bb_theme_toprow_show' ) ) == 2 ) {
    _e( '<div class="row ">'."\n" );
  } else {
    _e( '<div>' );
  } ?>
          <!-- logo -->
          <div class="clearfix hide-for-small show-for-medium hide-for_large-up" style="padding:<?php bb_e( 'bb_theme_image_logo_medium_padding' ,'customizer' ); ?>;display:inline-block;float:left; width: <?php bb_e( 'bb_theme_image_logo_medium_width' ,'customizer' ); ?>;">
            <a href="<?php bb_e( 'home_url' ); ?>" rel="home">
              <img id="bb-logo-medium" src="<?php bb_e( 'bb_theme_image_logo_medium', 'customizer' ); ?>" alt="Logo" title="<?php bb_e( 'site_name' ); ?> Logo" />
            </a>
          </div>
          <div class="clearfix hide-for-small hide-for-medium show-for-large-up" style="padding:<?php bb_e( 'bb_theme_image_logo_large_padding' ,'customizer' ); ?>;display:inline-block;float:left; width: <?php bb_e( 'bb_theme_image_logo_large_width' ,'customizer' ); ?>;">
            <a href="<?php bb_e( 'home_url' ); ?>" rel="home">
              <img id="bb-logo-large" src="<?php bb_e( 'bb_theme_image_logo_large', 'customizer' ); ?>" alt="Logo" title="<?php bb_e( 'site_name' ); ?> Logo" />
            </a>
          </div>
          <div id="cta" class="panel" style="display:inline-block;float:right;" <?php fx_onclick( bb_r( 'bb_theme_cta_click' ,'customizer' ) ); ?> >
            Call to Action
          </div>
        </div>
      </div>
      <!-- end logo row -->
<?php } ?>

<?php // shows Topbar based on theme customiser
if ( __( get_theme_mod( 'bb_theme_topbar_show' ) ) != 0 ) { ?>
      <div id="topbar">
<?php if ( __( get_theme_mod( 'bb_theme_topbar_show' ) ) == 2 ) {
    _e( '<div class="row ">'."\n" );
  } else {
    _e( '<div>' );
  } ?>
<?php include( 'includes/nav_topbar.php' ); ?>
        </div>
      </div>
<?php } ?>

<?php // shows Topbar based on theme customiser
if ( __( get_theme_mod( 'bb_theme_herorow_show' ) ) != 0 ) { ?>
      <!-- hero -->
      <div class="hide-for-small show-for-medium-up" id="herorow">
<?php if ( __( get_theme_mod( 'bb_theme_herorow_show' ) ) == 2 ) {
    _e( '<div class="row ">'."\n" );
  } else {
    _e( '<div class="row collapse" style="min-width: 100% !important;">' );
  } ?>
          <div class="hide-for-small medium-12 medium-centered large-12 large-centered columns" style="text-align:center;">
<?php if( intval( get_theme_mod( 'bb_theme_hero_image_cat' ) ) > 0 ) {
  fx_orbit( 'img_cat', get_theme_mod( 'bb_theme_hero_image_cat' ) );
} else { ?>
            <img id="hero" src="<?php _e( esc_url( get_theme_mod( 'bb_theme_hero_image' ) ) ); ?>" alt="Hero" title="<?php bb_e( 'site_name' ); ?> Hero" />
<?php } ?>
          </div>
        </div>
      </div>
      <!-- end hero -->
<?php } ?>
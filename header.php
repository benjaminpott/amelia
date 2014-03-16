<!doctype html>
<html>

  <head>
    <title><?php bb_e( 'site_title' ) ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php bb_e( 'bb_theme_image_favicon', 'customizer' ); ?>" type="image/png" />

<?php wp_head(); ?>
  </head>
  <body>

    <!-- start everything -->
    <div class="s-everything">

<?php fx_theme_row( 'toprow' , 'hide-for-small show-for-medium-up' ); ?>
<?php fx_theme_row( 'topbar' , '', 'nav_topbar.php'); ?>
<?php fx_theme_row( 'herorow' , 'hide-for-small show-for-medium-up' ); ?>

<?php // --> index.php or page template. ?>
<?php // --> see https://codex.wordpress.org/Template_Hierarchy ?>
<?php // --> finsh with footer.php ?>
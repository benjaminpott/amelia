          <div class="hide-for-small medium-12 medium-centered large-12 large-centered columns" style="text-align:center;">
<?php if( intval( get_theme_mod( 'bb_theme_hero_image_cat' ) ) > 0 ) {
  fx_orbit( 'img_cat', get_theme_mod( 'bb_theme_hero_image_cat' ) );
} else { ?>
            <img id="hero" src="<?php _e( esc_url( get_theme_mod( 'bb_theme_hero_image' ) ) ); ?>" alt="Hero" title="<?php bb_e( 'site_name' ); ?> Hero" />
<?php } ?>
          </div>
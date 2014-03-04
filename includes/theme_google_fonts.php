<?php

// create custom plugin settings menu
add_action('admin_menu', 'create_bb_google_fonts');

function create_bb_google_fonts() {

	//create new top-level menu
	add_menu_page('Google Fonts', 'Google Fonts', 'manage_options', 'bb_google_fonts', 'bb_google_fonts_page');
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

	//call register settings function
	add_action( 'admin_init', 'register_bb_google_fonts' );
}


function register_bb_google_fonts() {

	//register our settings
	$fields = array ('bb_gf1','bb_gf1','bb_gf1');
	foreach ($fields as $field) register_setting( 'bb-google-fonts-group', $field );

}

function bb_google_fonts_page() {
?>
<div class="wrap">
<h2>Google Fonts</h2>
<hr style="margin: 20px 0;border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); "/>
<form method="post" action="options.php">

    <table class="form-table">

    	<tr valign="top">
        <th scope="row">Primary Font</th>
        <td><input type="text" name="bb_gf1" size="100" placeholder="http://..." value="<?php echo get_option('bb_gf1'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Secondary Font</th>
        <td><input type="text" name="bb_gf2" size="100" placeholder="http://..."  value="<?php echo get_option('bb_gf2'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Tertiary Font</th>
        <td><input type="text" name="bb_gf3" size="100" placeholder="http://..." value="<?php echo get_option('bb_gf3'); ?>" /></td>
        </tr>

    </table>
    <?php submit_button(); ?>
    <?php settings_fields( 'bb-google-fonts-group' ); ?>
</form>
</div>
<?php } ?>
<?php

function theme_styles(){
	// get default style
	$bb_style = file_get_contents( bb_r( 'css_path' ).'style.css' );

	// create style attributes based on conditions
//	#logo-row {overflow: ". __( $overflow )."; ".__( get_theme_mod( 'bb_theme_header_height_type' ) .':". __( get_theme_mod( 'bb_theme_header_height' ), 'bb_' ).';';
//$style .= 'background: ". __( __( get_theme_mod( 'bb_theme_header_bg_color' ).' url('.get_theme_mod( 'bb_theme_header_bg_image' ).') '.get_theme_mod( 'bb_theme_header_bg_position' ).' '.get_theme_mod( 'bb_theme_header_bg_repeat' ), 'bb_' ).';';
//}
	// create dynamic style
	$bb_style .="

/* topbar style */
	.top-bar.expanded {display: inline;}
	.top-bar.expanded .title-area, .top-bar-section ul li:hover > a {background: ".__( get_theme_mod( 'bb_theme_topbar_bg_color_hover' ) ).";}
	.top-bar.expanded .toggle-topbar a{color:".__( get_theme_mod( 'bb_theme_topbar_bg_color_hover' ) ).";}
	.top-bar.expanded .toggle-topbar a span{box-shadow: 0 10px 0 1px #FFFFFF, 0 16px 0 1px #FFFFFF, 0 22px 0 1px #FFFFFF;}
	.top-bar, .top-bar-section ul {background:none;}
	#bb-top-bar {height: 80px;overflow: hidden;}
	#row-topbar { border-top: 1px solid rgba(0,0,0,0.10);	height: 46px;	width: 100%;}
	#row-topbar .row.collapse.fixed { top: 109px; }
	#row-topbar, .top-bar, .top-bar-section li a:not(.button) { background: none repeat scroll 0 0 ".__( get_theme_mod( 'bb_theme_topbar_bg_color' ) )."; color: ".__( get_theme_mod( 'bb_theme_topbar_font_color' ) )."}
	.top-bar-section li a:hover:not(.button) { background: none repeat scroll 0% 0% ".__( get_theme_mod( 'bb_theme_topbar_bg_color_hover' ) )."!important; color: ".__( get_theme_mod( 'bb_theme_topbar_font_color_hover' ) )."}
	.top-bar-section .divider { border-bottom: 1px solid ".__( get_theme_mod( 'bb_theme_topbar_divide_color' ) )."!important; border-top: 1px solid rgba(0,0,0,0.1)!important; clear: both; height: 1px; width: 100%; }
";

	// write full style to style.css
	file_put_contents( bb_r( 'css_path' ).'theme.css', $bb_style );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

?>
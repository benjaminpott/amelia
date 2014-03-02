<?php

function theme_styles(){
	// get default style
	$tn_style = file_get_contents( tn_r( 'css_path' ).'style.css' );

	// create style attributes based on conditions
//	#logo-row {overflow: ". __( $overflow )."; ".__( get_theme_mod( 'tn_theme_header_height_type' ) .':". __( get_theme_mod( 'tn_theme_header_height' ), 'tn_' ).';';
//$style .= 'background: ". __( __( get_theme_mod( 'tn_theme_header_bg_color' ).' url('.get_theme_mod( 'tn_theme_header_bg_image' ).') '.get_theme_mod( 'tn_theme_header_bg_position' ).' '.get_theme_mod( 'tn_theme_header_bg_repeat' ), 'tn_' ).';';
//}
	// create dynamic style
	$tn_style .="

	body {background: ".__( get_theme_mod( 'tn_theme_body_bg_color' ) )." url(".__( get_theme_mod( 'tn_theme_body_bg_image' ) ).") ".__( get_theme_mod( 'tn_theme_body_bg_position' ) )." / ".__( get_theme_mod( 'tn_theme_body_bg_size' ) )." ".__( get_theme_mod( 'tn_theme_body_bg_repeat' ) ).";}
	#toprow {overflow:hidden; display: block; ".__( get_theme_mod( 'tn_theme_toprow_height_type' ) ).": ".__( get_theme_mod( 'tn_theme_toprow_height' ) )."; background: ".__( get_theme_mod( 'tn_theme_toprow_bg_color' ) )." url(".__( get_theme_mod( 'tn_theme_toprow_bg_image' ) ).") ".__( get_theme_mod( 'tn_theme_toprow_bg_position' ) )." / ".__( get_theme_mod( 'tn_theme_toprow_bg_size' ) )." ".__( get_theme_mod( 'tn_theme_toprow_bg_repeat' ) ).";}
 #topbar {background: ".__( get_theme_mod( 'tn_theme_topbar_bg_color' ) ).";}
	#herorow {display: block; background: ".__( get_theme_mod( 'tn_theme_herorow_bg_color' ) )." url(".__( get_theme_mod( 'tn_theme_herorow_bg_image' ) ).") ".__( get_theme_mod( 'tn_theme_herorow_bg_position' ) )." / ".__( get_theme_mod( 'tn_theme_herorow_bg_size' ) )." ".__( get_theme_mod( 'tn_theme_herorow_bg_repeat' ) ).";}
 #cta {border:none; background:".__( get_theme_mod( 'tn_theme_cta_bg_color' ) ).";color:".__( get_theme_mod( 'tn_theme_cta_font_color' ) ).";margin:".__( get_theme_mod( 'tn_theme_cta_padding' ) ).";}
 #cta:hover {cursor:pointer;background:".__( get_theme_mod( 'tn_theme_cta_bg_color_hover' ) ).";color:".__( get_theme_mod( 'tn_theme_cta_font_color_hover' ) ).";}
	/* topbar style */
	.top-bar.expanded {display: inline;}
	.top-bar.expanded .title-area, .top-bar-section ul li:hover > a {background: ".__( get_theme_mod( 'tn_theme_topbar_bg_color_hover' ) ).";}
	.top-bar.expanded .toggle-topbar a{color:".__( get_theme_mod( 'tn_theme_topbar_bg_color_hover' ) ).";}
	.top-bar.expanded .toggle-topbar a span{box-shadow: 0 10px 0 1px #FFFFFF, 0 16px 0 1px #FFFFFF, 0 22px 0 1px #FFFFFF;}
	.top-bar, .top-bar-section ul {background:none;}
	#tn-top-bar {height: 80px;overflow: hidden;}
	#menu-wrapper { border-top: 1px solid rgba(0,0,0,0.10);	height: 46px;	width: 100%;}
	#menu-wrapper .row.collapse.fixed { top: 109px; }
	#menu-wrapper, .top-bar, .top-bar-section li a:not(.button) { background: none repeat scroll 0 0 ".__( get_theme_mod( 'tn_theme_topbar_bg_color' ) )."; color: ".__( get_theme_mod( 'tn_theme_topbar_font_color' ) )."}
	.top-bar-section li a:hover:not(.button) { background: none repeat scroll 0% 0% ".__( get_theme_mod( 'tn_theme_topbar_bg_color_hover' ) )."!important; color: ".__( get_theme_mod( 'tn_theme_topbar_font_color_hover' ) )."}
	.top-bar-section .divider { border-bottom: 1px solid ".__( get_theme_mod( 'tn_theme_topbar_divide_color' ) )."!important; border-top: 1px solid rgba(0,0,0,0.1)!important; clear: both; height: 1px; width: 100%; }
";

	// write full style to style.css
	file_put_contents( tn_r( 'css_path' ).'theme.css', $tn_style );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

?>
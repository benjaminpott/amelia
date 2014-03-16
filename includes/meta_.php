<?php

// find'n replace Mycpts & Mycpt (as cpt). *Remember to preseve case
// include in functions.php
// add custom meta to cpt_mycpt_box_content & cpt_mycpt_meta_box_save functions

function cpt_mycpt_box() {
	add_meta_box(
		'cpt_mycpt_box',
		__( 'Mycpt', '' ),
		'cpt_mycpt_box_content',
		'mycpt',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'cpt_mycpt_box' );

function cpt_mycpt_box_content( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'cpt_mycpt_box_content_nonce' );

	// custom fields here!
	// mycpt_meta_field($title,$name,$size,$type='text',$placeholder);
	/* for type='textarea' do this: mycpt_meta_field($itle,$name,$size='100%,70px','textarea');
	/*for type='select', send $placeholder as an array of objects with id and title as attributes for the object

	 example:    $placeholder=array();

			     $placeholder=array(
						     (object) array(
						          'id' => '1',
						          'title' => 'My title'
						      )
			           );
    */


}

function mycpt_meta_field($title,$name,$size,$type='text',$placeholder=''){

	$title = ucfirst(strtolower($title));

	switch ($type) {

		case 'select':

			$current = get_post_meta( $_GET[post], $name, true ) ;

			echo '	<tr valign="top" >'."\n";
			echo '  	<td style="padding:10px 0;">'."\n";
			echo '<select name="'.$name.'" id="'.$name.'">'."\n";

			foreach($placeholder as $selected){
				var_dump($selected->id);
			   echo ' 		<option value="'.$selected->id.'"' .selected( $selected->id, $current, false ). '>' .__( $selected->title, 'bb_' ). '</option>'."\n";
			}

			echo  '</select>'."\n";
		    echo  '<sub style="color:rgba(0,0,0,0.75);">'.$title.'</sub>'."\n";
			echo '  	</td>'."\n";
			echo '	</tr>'."\n";

			break;

		case 'checkbox':

			$checked = ( get_post_meta( $_GET[post], $name, true )=='true') ? 'checked="'.get_option($name) .'"' : '' ;

			echo '	<tr valign="top" >'."\n";
			echo '  	<td style="padding:10px 0;">'."\n";
			echo ' 		<input type="checkbox" name="'.$name.'" value="true" '.$checked.' style="margin: 0 5px 0 0;"/><sub style="color:rgba(0,0,0,0.75);">'.$title.'</sub>'."\n";
			echo '  	</td>'."\n";
			echo '	</tr>'."\n";

			break;

	    case 'textarea':
            echo '	<tr valign="top" >'."\n";
			echo '  	<td style="padding:5px 0px;">'."\n";
			echo '			<label for="'.$name.'">'."\n";
			echo '				<sub style="color:rgba(0,0,0,0.75);display:block;">'.$title.'</sub>'."\n";
			echo '			</label>'."\n";


				$size = explode(',', $size);
				$style = 'width:'.$size[0].';height:'.$size[1];


			echo '   	   <textarea id="'.$name.'" name="'.$name.'" style="'.$style.';" placeholder="'.$placeholder.'" >'.esc_attr( get_post_meta( $_GET[post], $name, true ) ).'</textarea>'."\n";

			echo '  	</td>'."\n";
			echo '	</tr>'."\n";

			break;

		case 'text':
		default:

			echo '	<tr valign="top" >'."\n";
			echo '  	<td style="padding:5px 0px;">'."\n";
			echo '			<label for="'.$name.'">'."\n";
			echo '				<sub style="color:rgba(0,0,0,0.75);display:block;">'.$title.'</sub>'."\n";
			echo '			</label>'."\n";
			echo '   	   <input type="'.$type.'" id="'.$name.'" name="'.$name.'" style="display:block;width:'.$size.';" placeholder="'.$placeholder.'" value="'.esc_attr( get_post_meta( $_GET[post], $name, true ) ).'" />'."\n";
			echo '  	</td>'."\n";
			echo '	</tr>'."\n";

			break;

	}
}

function cpt_mycpt_meta_box_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if ( !wp_verify_nonce( $_POST['cpt_mycpt_colors_box_content_nonce'], plugin_basename( __FILE__ ) ) &&
			!wp_verify_nonce( $_POST['cpt_mycpt_box_content_nonce'], plugin_basename( __FILE__ ) ) 	 )
	return;

	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
		return;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
		return;
	}

	$custom_meta_fields = array(
	'cpt_mycpt_meta_' // <-- add each meta to this array
	);
	foreach ( $custom_meta_fields as $custom_meta_feild ) {
		$custom_meta_value = $_POST[$custom_meta_feild];
		update_post_meta( $post_id, $custom_meta_feild, sanitize_text_field( $custom_meta_value ) );
	}
}

add_action( 'save_post', 'cpt_mycpt_meta_box_save' );

?>
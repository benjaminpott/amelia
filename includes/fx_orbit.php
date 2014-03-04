<?php

function fx_orbit( $taxonomy='',$term='',$posts_per_page=5,$post_type='attachment',$field='id' ) {
	echo '<ul class="s-orbit" data-orbit data-options="navigation_arrows:false;">'."\n";

  $args = array(
    'posts_per_page'  => $posts_per_page,
    'post_type'       => $post_type,
    'orderby'         => 'menu_order',
    'order'           => 'ASC',  // 0 at the top - bigger the number the lower on the page
    'tax_query'       => array(
      array(
        'taxonomy'    => $taxonomy,
        'field'       => $field,
        'terms'       => $term
      )
    )
  );
	$slides = get_posts( $args );
	foreach ( $slides as $slide ) {
		$alt = get_post_meta( $slide->ID, '_wp_attachment_image_alt', true );
		$alt = ( strlen( $alt ) > 0 ) ? $alt : $slide->post_title ;
		echo '  <li>'."\n";
		echo '    <img src="'.get_the_permlink( $slide->ID ).'" alt="'.$alt.'" title="'.$slide->post_content.'" style=" "/>'."\n";
		echo '  </li>'."\n";
	}
	echo '</ul>'."\n";
}

?>
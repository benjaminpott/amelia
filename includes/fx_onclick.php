<?php

function fx_onclick( $url, $target='' ) {
  if ( $target == '' ) {
			$location = "location.href='$url';";
  } else {
   $location = "window.open('$url','$target')";
  }
  _e( 'onclick="'.$location.'" ' );
}

?>
<?php

function fx_debug_d( $value ) {
	fx_debug( $value )
	die();
}

function fx_debug( $value, $delimter = '<hr>' ) {
	_e( '<pre>', 'bb_' );
	var_dump( $value );
	_e( '</pre>', 'bb_' );
	_e( $delimter, 'bb_' );
}

?>
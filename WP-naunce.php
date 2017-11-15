<?php

class WP-naunces implements IWP-naunces {
	
	
	public function  wp_nonce_url( $actionurl, $action = -1, $name = '_wpnonce' )
	{
		$actionurl = str_replace( '&amp;', '&', $actionurl );
		return esc_html( add_query_arg( $name, wp_create_nonce( $action ), $actionurl ) );
	}
	
	
	function wp_nonce_tick() {
		/**
		 * Filters the lifespan of nonces in seconds.
		 *
		 * @since 2.5.0
		 *
		 * @param int $lifespan Lifespan of nonces in seconds. Default 86,400 seconds, or one day.
		 */
		$wphHookFunctions = new WP_Hook ();
		$nonce_life =$wphHookFunctions->apply_filters( 'nonce_life', DAY_IN_SECONDS );
	
		return ceil(time() / ( $nonce_life / 2 ));
	}
	
	/*
	* @since 2.0.4
	*
	* @param int|string $action  Optional. Action name. Default -1.
	* @param string     $name    Optional. Nonce name. Default '_wpnonce'.
	* @param bool       $referer Optional. Whether to set the referer field for validation. Default true.
	* @param bool       $echo    Optional. Whether to display or return hidden form field. Default true.
	* @return string Nonce field HTML markup.
	*/
	function wp_nonce_field( $action = -1, $name = "_wpnonce", $referer = true , $echo = true ) {
		
		
		$name = esc_attr( $name );
		$nonce_field = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . wp_create_nonce( $action ) . '" />';
	
		if ( $referer )
			$nonce_field .= wp_referer_field( false );
	
		if ( $echo )
			echo $nonce_field;
	
		return $nonce_field;
	}
	
}
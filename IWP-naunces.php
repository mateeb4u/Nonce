<?php
// Declare the interface 'iTemplate'
interface IWP_naunces
{
	public function wp_nonce_url( $actionurl, $action = -1, $name = '_wpnonce' );
	public function wp_nonce_tick();
	public function wp_nonce_field( $action = -1, $name = "_wpnonce", $referer = true , $echo = true );
}
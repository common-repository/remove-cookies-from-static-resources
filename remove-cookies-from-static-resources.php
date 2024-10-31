<?php
/*
Plugin Name: Remove cookies from static resources
Description: It removes cookies from the requests to static resources for the modern browsers.
Author: Jose Mortellaro
Author URI: https://josemortellaro.com/
Domain Path: /languages/
Text Domain: remove-cookies-from-static-resources
Version: 0.0.1
*/
/*  This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

add_action( 'wp_head','eos_rcfsr_ob_start',0 );
add_action( 'wp_footer','eos_rcfsr_ob_start',0 );

function eos_rcfsr_ob_start(){
    ob_start();
}

add_action( 'wp_head','eos_rcfsr_add_crossorigin_to_head_and_footer',PHP_INT_MAX );
add_action( 'wp_footer','eos_rcfsr_add_crossorigin_to_head_and_footer',PHP_INT_MAX );

function eos_rcfsr_add_crossorigin_to_head_and_footer(){
    $html = ob_get_clean();
    $html = eos_rcfsr_add_crossorigin_to_tag( $html,array( 'script','link' ) );
    echo $html;
}

add_filter( 'the_content',function( $content ){
    $content = eos_rcfsr_add_crossorigin_to_tag( $content,array( 'img' ) );
    return $content;
} );

function eos_rcfsr_add_crossorigin_to_tag( $html,$tags ){
    foreach( $tags as $tag ){
        $pattern = in_array( $tag,array( 'script' ) ) ? sprintf( '/<%s((?!crossorigin).)+%s>/i',$tag,$tag ) : sprintf( '/<%s((?!crossorigin).)+>/i',$tag );
        preg_match_all( $pattern,$html,$arr );
        if( $arr && is_array( $arr ) && isset( $arr[0] ) ){
            foreach( $arr[0] as $l ){
                if( false !== strpos( $l,'src' ) || false !== strpos( $l,'href' ) ){
                    $nl = str_replace( '<'.$tag,'<'.$tag.' crossorigin="anonymous"',$l );
                    $html = str_replace( $l,$nl,$html );
                }
            }
        }
    }
    return $html;
}
<?php

function foundation_column( $atts, $content ) {
    $atts = shortcode_atts( array(
        'small' => 12,
        'medium' => null,
        'large' => null
    ), $atts );

    $atts['medium'] = ( $atts['medium'] == null ) ? $atts['small'] : $atts['medium'];
    $atts['large'] = ( $atts['large'] == null ) ? $atts['medium'] : $atts['large'];

    extract( $atts );

    $sizes = 'small-' . $small . ' medium-' . $medium . ' large-' . $large;

    return '<div class="columns ' . $sizes . '">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'column', 'foundation_column');

function foundation_row( $atts, $content ) {
	$content = preg_replace( "/\[\/column\](\<br \/\>|\<\/p\>.?\<p\>).?\[column/s", '[/column][column', $content );
   	return '<div class="row">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'row', 'foundation_row' );

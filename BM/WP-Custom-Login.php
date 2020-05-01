<?php

/* Login Page */
add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('". \NV\Theme\Core::i()->urls->img ."logo.png') no-repeat scroll center #0f1539;
    height: 110px;
    width: 100%;
    background-size: 90% auto;
    -webkit-background-size: 90% auto;
    -moz-background-size: 90% auto;
    -o-background-size: 90% auto;
    margin-bottom: 0px;
	}
	body{
		background: #fff url('". \NV\Theme\Core::i()->urls->img ."home-bg-bottom.png') no-repeat scroll center top / cover;
	}
	.login #backtoblog a,
	.login #nav a,
	.login h1 a {
		color: #fff;
		text-shadow: 1px 1px 0 #000;
	}
	.login #backtoblog a:hover,
	.login #nav a:hover,
	.login h1 a:hover {
		color: #c0a051;
	}
	</style>
	";
}

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_option( 'blogname' );
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

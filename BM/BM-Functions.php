<?php

function resolve_images_url($filename) {
	return \NV\Theme\Core::i()->urls->img . $filename;
}


function lfs_get_assets($filespecs) {
	return \NV\Theme\Core::i()->urls->assets . $filespecs;
}


// Adding a reset button to Gravity form
// add_filter( 'gform_submit_button_1', 'form_submit_button', 10, 2 );


function form_submit_button( $button, $form ) {
	$button .= '<input class="reset-button" type="reset" value="Reset">';
	return $button;
}


function remove_wp_editor() {
	$pages = array(
		'overrides/home.php',
		'overrides/practice.php',
		// 'overrides/why-choose-us.php',
		// 'overrides/team.php',
		// 'overrides/testimonial.php',
		// 'overrides/contact.php',
	);

	if (in_array(get_page_template_slug($_GET['post']), $pages)) {
		remove_post_type_support('page', 'editor');
	}
}
add_action('init', 'remove_wp_editor');


add_post_type_support( 'page', 'excerpt' );


function format_phone_number($number) {
	return preg_replace('/[^0-9]/', '', $number);
}


function div_html($atts, $content = null) {
  extract(shortcode_atts(array(
    'class' => '',
  ), $atts));

  $class = $class ? " class=\"$class\"" : NULL;

  return "<div$class>$content</div>";
}
add_shortcode('div', 'div_html');


function practice_areas() {
	$out = '';
  $entries = get_field('practice');

	$out = '<ul class="practice-list">';

	foreach ($entries as $entry) {
		$permalink = get_permalink($entry['page']->ID);
		$title = get_the_title($entry['page']->ID);
		$thumb = $entry['image']['url'];
		$out .= "<li><a href='$permalink' style='background-image: url($thumb)'><div class='overlay'>$title</div></a></li>";
	}

	$out .= "</ul>";

  return $out;
}
add_shortcode('practice-areas', 'practice_areas');


function attorney_profile($atts) {
	$out = '';
  $entries = get_field('attorneys');

	extract(shortcode_atts(array(
    'id' => '',
		'direction' => ''
  ), $atts));

	$attorney = $entries[$id - 1];

	if ($direction) $class = 'attorney-profile--reverse';

	$phone = format_phone_number($attorney['info']['phone']);

	$out .= "<div class='attorney-profile $class'>";
	$out .= '<div class="attorney-info">';
	$out .= "<h3>{$attorney['info']['name']}</h3>";
	$out .= "<p class='position'>{$attorney['info']['position']}</p>";
	$out .= "<p>Email: <a href='mailto:{$attorney['info']['email']}'>{$attorney['info']['email']}</a></p>";
	$out .= "<p>Phone: <a href='tel:+1{$phone}'>{$attorney['info']['phone']}</a></p>";
	$out .= "<p>Download: <a href='{$attorney['info']['vcard']['url']}' target='_blank'>vCard</a></p>";
	$out .= '</div>';
	$out .= '<div class="attorney-image">';
	$out .= "<img src='{$attorney['image']['url']}' alt='{$attorney['image']['alt']}'>";
	$out .= '</div>';
	$out .= '</div>';

  return $out;
}
add_shortcode('attorney-profile', 'attorney_profile');


function new_excerpt_more($more) {
  return '';
}

function the_excerpt_more_link( $excerpt ){
  $post = get_post();
  $excerpt .= '... <a class="read-more" href="'. get_permalink($post->ID) . '">Read more</a>';
  return $excerpt;
}

function custom_excerpt() {
	if (is_home()) {
		add_filter('excerpt_more', 'new_excerpt_more', 21 );
		add_filter( 'get_the_excerpt', 'the_excerpt_more_link', 21 );
	}
}
add_action('wp', 'custom_excerpt');

<?php

class BM_Custom_Excerpt {

	private $length;
	private $label;

	function __construct() {
		$this->excerpt_length = 21;
		$this->label = 'Read more';

		add_action('wp', [$this, 'wp']);
	}

	function wp() {
		if (is_home()) {
			add_filter('excerpt_more', [$this, 'excerpt_more'], $this->length);
			add_filter('get_the_excerpt', [$this, 'get_the_excerpt'], $this->length);
		}
	}

	function excerpt_more($more) {
	  return '';
	}

	function get_the_excerpt($excerpt) {
	  $post = get_post();
	  $excerpt .= '... <a class="read-more" href="'. get_permalink($post->ID) . '">' . $label . '</a>';
	  return $excerpt;
	}
}

new BM_Custom_Excerpt;

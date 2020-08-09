<?php
/**
* Template Name: Builder Page
*/

get_header();
the_post();
?>

<main class="main">
	<?php get_template_part('parts/builder', 'index') ?>
</main>

<?php get_footer() ?>

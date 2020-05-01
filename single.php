<?php

get_header();
the_post();

?>

<main class="main">
	<section class="blog-single">
		<div class="grid-container">
			<article class="article-content">
				<?php get_template_part('parts/blog', 'single') ?>
			</article>
		</div>
	</section>
</main>

<?php get_footer() ?>

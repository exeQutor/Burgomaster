<?php

get_header();
the_post();

?>

<main class="main">
	<section class="page-default">
		<div class="grid-container">
			<article class="article-content">
				<?php get_template_part('parts/page', 'default') ?>
			</article>
		</div>
	</section>
</main>

<?php get_footer() ?>

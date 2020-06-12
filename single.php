<?php

get_header();
the_post();

?>

<main class="main">
	<section class="blog-single">
		<div class="grid-container">
			<div class="grid-x">
				<div class="cell">
					<?php get_template_part('parts/blog', 'single') ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer() ?>

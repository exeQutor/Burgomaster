<?php get_header() ?>

<main class="main">
	<?php if (have_posts()): ?>
		<section class="blog-index">
			<div class="grid-container">
				<?php while (have_posts()): the_post() ?>
					<article class="article-content">
						<?php get_template_part('parts/blog', 'index') ?>
					</article>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif ?>
</main>

<?php get_footer() ?>

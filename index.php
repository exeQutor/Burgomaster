<?php get_header() ?>

<main class="main">
	<?php if (have_posts()): ?>
		<section class="blog">
			<?php while (have_posts()): the_post() ?>
				<article class="blog-post">
					<?php get_template_part('parts/blog', 'index') ?>
				</article>
			<?php endwhile; ?>
		</section>
	<?php endif ?>
</main>

<?php get_footer() ?>

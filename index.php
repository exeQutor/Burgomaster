<?php get_header() ?>

<main class="main">
	<?php if (have_posts()): ?>
		<section class="blog-index">
			<div class="grid-container">
				<div class="grid-x">
					<div class="cell">
						<?php while (have_posts()): the_post() ?>
							<?php get_template_part('parts/blog', 'index') ?>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif ?>
</main>

<?php get_footer() ?>

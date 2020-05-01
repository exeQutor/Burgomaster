<header class="header header--inner">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell large-6">
				<h1 class="header-title"><a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a></h1>
				<p class="header-tagline"><?php bloginfo('description') ?></p>
			</div>

			<div class="cell large-6">
				<?php wp_nav_menu(array(
					'menu' => 'header-nav',
					'menu_class' => 'header-nav-list',
					'container' => 'nav',
					'container_class' => 'header-nav'
				)) ?>
			</div>
		</div>
	</div>
</header>

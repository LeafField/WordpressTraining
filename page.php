<?php get_header(); ?>
	<div id="container" class="container_page w_inner">
		<main>
			<?php if(have_posts()) : ?>
				<h1 class="page_head"><?php the_title(); ?></h1>
				<?php while(have_posts()) : the_post(); ?>
					<div class="article">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
<?php get_header(); ?>
	<div id="container" class="container_contact w_inner">
		<main>
			<?php if(have_posts()) : ?>
				<h1 class="page_head"><?php the_title(); ?></h1>
				<?php while(have_posts()) : the_post(); ?>
					<div class="article">
						<?php the_content(); ?>
						<!-- 下記ショートコードは実際にコピーしたものに書き換えてください（クォーテーションの中にショートコードを入れます） -->
						<?php echo do_shortcode('[contact-form-7 id="99" title="資料請求・お問合わせ"]'); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
<?php get_header(); ?>
<div id="container" class="container_front">
	<main>
		<!-- イベント -->
		<section class="front_important_news w_inner">
			<div class="important_news_wrap">
				<div class="head">イベント</div>
				<?php
        $args = [
        	'post_type' => 'post',
        	'category_name' => 'event',
        	'posts_per_page' => 3,
        	'orderby' => 'meta_value',
        	'meta_key' => 'event_date',
        	'meta_value' => date('Ymd'),
        	'meta_compare' => '>',
        	'order' => 'ASC'
        ];
        $the_query = new WP_Query($args);
        ?>
				<?php if ($the_query->have_posts()): ?>
				<ul>
					<?php while ($the_query->have_posts()):
		        $the_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="date">
								<?php echo get_the_date('Y.m.d'); ?>
							</div>
							<div class="ttl">
								<?php the_title(); ?>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
				<?php endif; ?>
			</div>
		</section>

		<!-- 重要なお知らせ -->
		<section class="front_important_news w_inner">
			<div class="important_news_wrap">
				<div class="head">重要なお知らせ</div>
				<?php
        $args = [
        	'post_type' => 'post',
        	'category_name' => 'important',
        	'posts_per_page' => 3
        ];
        $the_query = new WP_Query($args);
        ?>
				<?php if ($the_query->have_posts()): ?>
				<ul>
					<?php while ($the_query->have_posts()):
		        $the_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="date">
								<?php echo get_the_date('Y.m.d'); ?>
							</div>
							<div class="ttl">
								<?php the_title(); ?>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
				<?php endif; ?>
			</div>
		</section>


		<!-- ブログ（特定の条件で絞る） -->
		<section class="front_important_news w_inner">
			<div class="important_news_wrap">
				<div class="head">高三向け勉強方法</div>
				<?php
        $args = [
        	'post_type' => 'blog',
        	'relation' => 'AND',
        	'tax_query' => [
        		[
        			'taxonomy' => 'blog_category',
        			'field' => 'slug',
        			'terms' => 'study'
        		],
        		[
        			'taxonomy' => 'blog_tag',
        			'field' => 'slug',
        			'terms' => 'school-year3'
        		],
        	],
        	'posts_per_page' => 5,
        ];
        $the_query = new WP_Query($args);
        ?>
				<?php if ($the_query->have_posts()): ?>
				<ul>
					<?php while ($the_query->have_posts()):
		        $the_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="date">
								<?php echo get_the_date('Y.m.d'); ?>
							</div>
							<div class="ttl">
								<?php the_title(); ?>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
				<?php endif; ?>
			</div>
		</section>


		<!-- ============= コース ============= -->
		<section class="front_course w_inner">
			<h2 class="section_head">コース</h2>
			<div class="col_3_wrap">
				<?php
        $args = [
        	'taxonomy' => 'school-year'
        ];
        $terms = get_terms($args);
        ?>
				<?php foreach ($terms as $term): ?>
				<a class="course_card" href="<?php echo get_term_link($term->term_id); ?>">
					<div class="img">
						<?php $img = get_field('img', $term); ?>
						<img src="<?php echo $img ?>" alt="">
					</div>
					<div class="course_name">
						<?php echo $term->name; ?>向けコース
					</div>
					<div class="explain">
						<?php echo $term->description; ?>
					</div>
					<div class="btn_common">詳しくみる</div>
				</a>
				<?php endforeach; ?>
			</div>
		</section>

		<!-- 短期集中コース -->
		<section class="front_news w_inner">
			<h2 class="section_head">短期集中コース</h2>
			<?php
      $args = [
      	'post_type' => 'course',
      	'tax_query' => [
      		[
      			'taxonomy' => 'period',
      			'field' => 'slug',
      			'terms' => 'short'
      		],
      	],
      	'posts_per_page' => -1
      ];
      $the_query = new WP_Query($args);
      ?>
			<?php if ($the_query->have_posts()): ?>
			<div class="col_3_wrap">
				<?php while ($the_query->have_posts()):
		      $the_query->the_post(); ?>
				<a class="course_card" href="<?php the_permalink(); ?>">
					<div class="img">
						<?php if (has_post_thumbnail()): ?>
						<?php the_post_thumbnail(); ?>
						<?php else: ?>
						<img src="<?php echo esc_url(get_theme_file_uri('/img/noimage.jpg')); ?>" alt="">
						<?php endif; ?>
						<div class="course_name">
							<?php the_title() ?>
						</div>
						<div class="explain">
							<?php the_excerpt() ?>
						</div>
						<div class="btn_common">詳しく見る</div>
					</div>

				</a>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<?php endif; ?>
		</section>

		<!-- ブログ -->
		<!-- ============= ブログ ============= -->
		<section class="front_blog w_inner">
			<h2 class="section_head">ブログ</h2>
			<?php
      $args = [
      	'post_type' => 'blog',
      	'posts_per_page' => 4
      ];
      $the_query = new WP_Query($args);
      ?>
			<?php if ($the_query->have_posts()): ?>
			<ul class="col_4_wrap">
				<?php while ($the_query->have_posts()):
		      $the_query->the_post(); ?>
				<li>
					<a class="article_card" href="<?php the_permalink() ?>">
						<div class="img">
							<?php if (has_post_thumbnail()): ?>
							<?php the_post_thumbnail('blog2'); ?>
							<?php else: ?>
							<img src="<?php echo esc_url(get_theme_file_uri('img/noimage.jpg')); ?>">
							<?php endif; ?>
						</div>
						<div class="txtarea">
							<div class="date">
								<?php echo get_the_date('Y.m.d'); ?>
							</div>
							<div class="ttl">
								<?php the_title(); ?>
							</div>
							<div class="excerpt">
								<?php the_excerpt(); ?>
							</div>
							<div class="btn_read">続きをみる</div>
						</div>
					</a>
				</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
			<?php else: ?>
			<!-- 投稿が無い場合の内容 -->
			<?php endif; ?>
			<div class="to_blog_list">
				<a class="btn_common" href="<?php echo esc_url(home_url('/blog')); ?>">ブログ一覧をみる</a>
			</div>
		</section>

		<!-- ============= お知らせ ============= -->
		<section class="front_news w_inner">
			<h2 class="section_head">お知らせ</h2>
			<div class="news_list_wrap">
				<?php
        $args = [
        	'post_type' => 'post',
        	'cat' => -9,
        	'posts_per_page' => 3
        ];
        $the_query = new WP_Query($args);
        ?>
				<?php if ($the_query->have_posts()): ?>
				<ul>
					<?php while ($the_query->have_posts()):
		        $the_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="date">
								<?php echo get_the_date('Y.m.d') ?>
							</div>
							<div class="ttl">
								<div class="cat">
									<?php $terms = get_the_terms($post, "category");
		        foreach ($terms as $term): ?>
									<span>
										<?php echo $term->name ?>
									</span>
									<?php endforeach; ?>
								</div>
								<?php the_title(); ?>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
				<?php else: ?>
				<!-- 投稿が無い場合の内容 -->
				<?php endif; ?>
			</div>
			<a class="btn_common" href="<?php echo esc_url(home_url('/news')); ?>">一覧をみる</a>
		</section>
	</main>
</div>
<?php get_footer(); ?>

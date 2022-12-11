<aside class="container_side">

	<?php
  if (is_active_sidebar('sidebar-widgets')) {
	  echo '<ul>';
	  dynamic_sidebar('sidebar-widgets');
	  echo '</ul>';
  } ?>

	<div class="container_side_item side_course">
		<h2 class="head">学年別コース</h2>
		<div class="course_archive_by_year">
			<ul>
				<?php
        $args = [
        	'taxonomy' => 'school-year',
        ];
        $terms = get_terms($args);
        foreach ($terms as $term): ?>
				<li><a href="<?php echo get_term_link($term->term_id) ?>">
						<?php echo $term->name; ?>向けコース一覧
					</a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>


	<div class="container_side_item side_course">
		<h2 class="head">開講中の短期集中コース</h2>

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
		<ul>
			<?php while ($the_query->have_posts()):
		    $the_query->the_post(); ?>
			<li class="">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>




	<div class="container_side_item side_news">
		<div class="head">お知らせ</div>
		<div class="container_side_category">
			<div class="label">カテゴリー</div>
			<div class="category_list">
				<ul>
					<?php
          $categories = get_categories();
          foreach ($categories as $category) {
	          echo '<li><a href="' . get_category_link($category->term_id) . '">';
	          echo $category->name;
	          echo '</li></a>';
          }
          ?>
				</ul>
			</div>
		</div>
		<div class="container_side_tag">
			<div class="label">タグ</div>
			<div class="tag_list">
				<ul>
					<?php
          $tags = get_tags();
          foreach ($tags as $tag) {
	          echo '<li><a href="' . get_tag_link($tag->term_id) . '">';
	          echo $tag->name;
	          echo '</li></a>';
          }
          ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="container_side_item side_blog">
		<div class="head">ブログ</div>
		<div class="container_side_category">
			<div class="label">カテゴリー</div>
			<div class="category_list">
				<ul>
					<li>
						<a href="<?php echo esc_url(home_url('/blog')) ?>">すべて</a>
					</li>
					<?php
          $args = [
          	'taxonomy' => 'blog_category',
          	'orderby' => 'count',
          	'order' => 'ASC'

          ];
          $terms = get_terms($args);
          foreach ($terms as $term) {
	          echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
          }
          ?>
				</ul>
			</div>
		</div>

		<div class="side_item container_side_tag">
			<div class="label">タグ</div>
			<div class="tag_list">
				<ul>
					<?php
          $args = [
          	'taxonomy' => 'blog_tag'
          ];
          $terms = get_terms($args);
          foreach ($terms as $term) {
	          echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
          }
          ?>

				</ul>
			</div>
		</div>
	</div>
	<?php get_search_form(); ?>
</aside>

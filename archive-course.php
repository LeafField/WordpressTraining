<?php get_header(); ?>
<div id="container" class="container_archive_course w_inner">
  <main class="container_article_list">
    <h1 class="page_head">コース紹介</h1>
    <ul class="course_list">
      <?php
      $args = [
        'taxonomy' => 'school-year'
      ];
      $terms = get_terms($args);
      foreach ($terms as $term): ?>
      <h2>
        <?php echo $term->name ?>向けコース
      </h2>
      <?php
        $args = [
          'post_type' => 'course',
          'tax_query' => [
            [
              'taxonomy' => 'school-year',
              'field' => 'slug',
              'terms' => $term->slug
            ],
          ],
          'posts_per_page' => -1
        ];
        $the_query = new WP_Query($args);
      ?>
      <?php if ($the_query->have_posts()): ?>
      <?php while ($the_query->have_posts()):
            $the_query->the_post(); ?>
      <li>
        <a class="article_card" href="<?php the_permalink() ?>">
          <div class="img">
            <?php if (has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('course'); ?>
            <?php } else { ?>
            <img src="<?php echo esc_url(get_theme_file_uri('/img/noimage.jpg')); ?>">
            <?php } ?>
          </div>
          <div class="txtarea">
            <div class="related_terms">
              <?php
            $terms = get_the_terms(get_the_ID(), 'school-year');
            foreach ($terms as $term) {
              echo '<span>' . $term->name . '</span>';
            }
              ?>
              <?php
            $terms = get_the_terms(get_the_ID(), 'period');
            foreach ($terms as $term) {
              echo '<span>' . $term->name . '</span>';
            }
              ?>
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
      <?php endif; ?>

      <?php endforeach; ?>
    </ul>
  </main>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>
<div id="container" class="container_archive_course w_inner">
  <main class="container_article_list">
    <h1 class="page_head">
      <?php single_term_title() ?>向けのコース紹介
    </h1>
    <?php if (have_posts()): ?>
    <ul class="course_list">
      <?php while (have_posts()):
        the_post(); ?>
      <li>
        <a class="article_card" href="<?php the_permalink() ?>">
          <div class="img">
            <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('course'); ?>
            <?php else: ?>
            <img src="<?php echo esc_url(get_theme_file_uri('img/noimage.jpg')); ?>">
            <?php endif; ?>
          </div>
          <div class="txtarea">
            <div class="related_terms">
              <?php
        $terms = get_the_terms($post, 'school-year');
        foreach ($terms as $term) {
          echo '<span>' . $term->name . '</span>';
        }
              ?>
              <?php
        $terms = get_the_terms($post, 'period');
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
    </ul>
    <?php endif; ?>
  </main>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>
<div id="container" class="container_archive_blog w_inner">
  <main class="container_article_list">
    <h1 class="page_head">ブログ</h1>
    <div class="selected_category">
      <?php
      if (is_tax('blog_category')) {
        single_term_title('カテゴリー：');
      } elseif (is_tax('blog_tag')) {
        single_term_title('タグ：');
      }
      ?>
    </div>
    <?php if (have_posts()): ?>
    <ul class="col_3_wrap">
      <?php while (have_posts()):
        the_post(); ?>
      <li>
        <a class="article_card" href="<?php the_permalink() ?>">
          <div class="img">
            <?php if (has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('blog'); ?>
            <?php } else { ?>
            <img src="<?php echo esc_url(get_theme_file_uri('/img/noimage.jpg')); ?>">
            <?php } ?>
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
    </ul>
    <!-- ============= ページング ============= -->
    <?php
      $args = [
        'mid_size' => 2,
        'prev_text' => '前',
        'next_text' => '後',
        'screen_reader_text' => 'ページャー'
      ];
      the_posts_pagination($args);
    ?>
    <?php else: ?>
    <!-- 投稿が無い場合の内容 -->
    <?php endif; ?>
  </main>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

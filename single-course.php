<?php get_header() ?>
<div id="container" class="container_single container_course_detail w_inner">
  <main>
    <article class="article">
      <?php if (have_posts()): ?>
      <?php while (have_posts()):
          the_post(); ?>
      <h1>
        <?php the_title(); ?>
      </h1>
      <div class="related_terms">
        <?php $terms = get_the_terms($post, 'school-year');
          foreach ($terms as $term): ?>
        <span>
          <?php echo $term->name; ?>
        </span>
        <?php endforeach; ?>

        <?php $terms = get_the_terms($post, 'period');
          foreach ($terms as $term): ?>
        <span>
          <?php echo $term->name; ?>
        </span>
        <?php endforeach; ?>
      </div>
      <div class="container">
        <section class="content_course_outline">
          <h2 class="content_head">コースの内容</h2>

          <div class="block">
            <div class="img">
              <img src="<?php echo esc_url(the_field('img_target')); ?>">
            </div>
            <div class="txtarea">
              <div class="head">対象</div>
              <div class="txt">
                <?php echo nl2br(esc_html(get_field('target'))); ?>
              </div>
            </div>
          </div>

          <?php $feature = get_field('feature'); ?>
          <?php if ($feature): ?>
          <div class="block">
            <div class="img">
              <?php
            $img_id = get_field('img_feature');
            $img_attr = wp_get_attachment_image_src($img_id, 'course_target_feature');
              ?>
              <img src="<?php echo $img_attr[0]; ?>" alt="コースの特長">
            </div>
            <div class="txtarea">
              <div class="head">特徴</div>
              <div class="txt">
                <?php echo nl2br(esc_html($feature)); ?>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php endif; ?>

      <?php endwhile; ?>
      <?php endif; ?>
      <?php get_template_part('parts/content', 'frow'); ?>


      <section class="container_archive_course">
        <h2 class="content_head">同じ対象学年のコース</h2>
        <ul class="course_list">
          <?php
          $terms = get_the_terms(get_the_ID(), 'school-year');
          foreach ($terms as $term):
          ?>
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
              'post__not_in' => [get_the_ID()],
              'posts_per_page' => -1,
            ];
            $the_query = new WP_Query($args);
          ?>
          <?php if ($the_query->have_posts()): ?>
          <?php while ($the_query->have_posts()):
                $the_query->the_post(); ?>
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
                $terms = get_the_terms($post->ID, 'school-year');
                foreach ($terms as $term) {
                  echo '<span>' . $term->name . '</span>';
                }
                  ?>
                  <?php
                $terms = get_the_terms($post->ID, 'period');
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
          <?php else: ?>
          <!-- 投稿が無い場合の内容 -->
          <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </section>

    </article>
  </main>
</div>
<?php get_footer() ?>

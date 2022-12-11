<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>
		<?php
    wp_title('|', true, 'right');
    bloginfo('name');
    ?>
	</title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header>
		<div class="header_top w_inner">
			<div class="logo">
				<h1 class="tagline">
					<?php bloginfo('description'); ?>
				</h1>
				<div class="img">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img src="<?php echo esc_url(get_theme_file_uri('/img/logo.svg')); ?>" alt="AZゼミ">
					</a>
				</div>
			</div>

			<?php
      $args = [
      	'theme_location' => 'header_menu'
      ];
      wp_nav_menu($args);
      ?>

			<div class="nav_wrap">
				<input id="nav_input" type="checkbox" class="nav_hidden">
				<label id="nav_open" for="nav_input"><span></span></label>
				<nav>
					<ul>
						<li><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
						<li><a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a></li>
						<li><a href="<?php echo esc_url(home_url('/course')); ?>">コース紹介</a></li>
						<li><a href="<?php echo esc_url(home_url('/school-bldg')); ?>">校舎案内</a></li>
						<li><a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a></li>
						<li><a href="<?php echo esc_url(home_url('/contact')); ?>">資料請求・お問合せ</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<div id="wrapper">
		<?php if (is_front_page()) { ?>
		<div class="top_key_visual"></div>
		<?php } elseif (is_post_type_archive('course') || is_tax(['school-year', 'period']) || is_singular('course')) { ?>
		<div class="subpage_key_visual header_course"></div>
		<?php } elseif (is_post_type_archive('blog') || is_tax(['blog_category', 'blog_tag']) || is_singular('blog')) { ?>
		<div class="subpage_key_visual header_blog"></div>
		<?php } elseif (is_home() || is_category() || is_tag() || is_singular('post')) { ?>
		<div class="subpage_key_visual header_news"></div>
		<?php } elseif (is_page('school-bldg')) { ?>
		<div class="subpage_key_visual header_school_bldg"></div>
		<?php } elseif (is_page('contact')) { ?>
		<div class="subpage_key_visual header_contact"></div>
		<?php } else { ?>
		<div class="subpage_key_visual header_sub"></div>
		<?php } ?>




		<?php if (!is_front_page()) { ?>
		<?php if (function_exists('bcn_display')) { ?>
		<div id="breadcrumb" class="w_inner" vocab="http://schema.org/" typeof="BreadcrumbList">
			<?php bcn_display(); ?>
		</div>
		<?php } ?>
		<?php } ?>

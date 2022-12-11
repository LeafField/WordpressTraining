<?php
/*
function post_has_archive($args, $post_type){
if('post' == $post_type){
$args['rewrite'] = true;
$args['has_archive'] = 'news';
$args['label'] = 'お知らせ';
}
return $args;
}
add_filter('register_post_type_args','post_has_archive',10,2);
*/

/* --------------------------------------------
 * 　メインクエリの変更
 * -------------------------------------------- */
/*
function change_set_post($query) {
if ( is_admin() || ! $query->is_main_query() ){
return;
}
if ( $query->is_front_page() ) {
$query->set( 'posts_per_page', '3' );
return;
}
}
add_action( 'pre_get_posts', 'change_set_post' );
*/

/* --------------------------------------------
 * 　scriptとcssを読み込む
 * -------------------------------------------- */
function my_theme_scripts()
{
	wp_enqueue_style('pc', get_theme_file_uri('/css/style.css'));
	wp_enqueue_style('sp', get_theme_file_uri('/css/sp-style.css'), ['pc'], '1.0');
	wp_enqueue_script('allpage', get_theme_file_uri('/js/common.js'), ['jquery'], '1.0');
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

function change_set_blog($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	if ($query->is_post_type_archive('blog') || is_tax(['blog_category', 'blog_tag']) || is_search()) {
		$query->set('posts_per_page', '9');
		return;
	}
}

add_action('pre_get_posts', 'change_set_blog');


function change_excerpt_length($length)
{
	$length = 80;
	if (is_post_type_archive('blog') || is_tax(['blog_category', 'blog_tag'])) {
		return 50;
	}
	return $length;
}
add_filter('excerpt_length', 'change_excerpt_length', 999);

function cpt_register_course()
{
	$args = [
		'label' => 'コース',
		'labels' => [
			'singular_name' => 'コース',
			// 'edit_item' => 'コースを編集',
			// 'add_new_item' => '新規コースを追加'

		],
		'public' => true,
		//カスタム投稿タイプを一般に公開するかどうか
		'show_in_rest' => true,
		//REST APIにカスタム投稿タイプを含めるかどうか → カスタム投稿タイプでブロックエディタを使うならtrue
		'has_archive' => true,
		//アーカイブページを持つかどうか
		'delete_with_user' => false,
		//ユーザーを削除した後、コンテンツも削除するかどうか
		'exclude_from_search' => false,
		//検索から除外するかどうか
		'hierarchical' => false,
		//階層化するかどうか
		'query_var' => true,
		//クエリパラメーターを使えるようにする → プレビュー画面を使うためにはtrue
		'menu_position' => 5,
		//管理画面に表示するメニューの位置
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'custom-fields'
		], //カスタム投稿タイプがサポートする機能

	];
	register_post_type('course', $args);
}
add_action('init', 'cpt_register_course');


function tax_register_school_year()
{
	$args = [
		'label' => '学年',
		'labels' => [
			'singular_name' => '学年',
			'edit_item' => '学年を編集',
			'add_new_item' => '新規学年を追加'
		],
		'hierarchical' => true,
		//階層化するかどうか（カテゴリー的に使うならtrue、タグ的に使うならfalse）
		'query_var' => true,
		//クエリパラメーターを使えるようにする
		'show_in_rest' => true //REST APIにカスタムタクソノミーを含めるかどうか、グーテンベルクのブロックエディターで分類を使用するにはtrue

	];
	register_taxonomy('school-year', 'course', $args);
}
add_action('init', 'tax_register_school_year');

function tax_register_period()
{
	$args = [
		'label' => '期間',
		'labels' => [
			'singular_name' => '期間',
			'edit_item' => '期間を編集',
			'add_new_item' => '新規期間を追加'
		],
		'hierarchical' => true,
		'query_var' => true,
		'show_in_rest' => true
	];
	register_taxonomy('period', 'course', $args);
}
add_action('init', 'tax_register_period');

function change_set_course($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	if ($query->is_post_type_archive('course') || $query->is_tax(['school-year'])) {
		$query->set('posts_per_page', '-1');
		return;
	}
}
add_action('pre_get_posts', 'change_set_course');

add_theme_support('post-thumbnails', ['blog', 'course']);
add_image_size('blog', 270, 200, true);
add_image_size('blog2', 540, 500, true);
add_image_size('blog3', 140, 400, true);
add_image_size('course_target_feature', 600, 400, true);

function img_uncompressed()
{
	return 100;
}
add_filter('jpeg_quality', 'img_uncompressed');


function setup_html5_form()
{
	add_theme_support('html5', ['search-form']);
}

add_action('after_setup_theme', 'setup_html5_form');

// 管理画面にメニュー編集機能を追加

function register_my_menus()
{
	$args = [
		'header_menu' => 'ヘッダー',
		'footer_menu' => 'フッター'
	];
	register_nav_menus($args);
}

add_action('after_setup_theme', 'register_my_menus');

// ウィジェットを追加
function my_widgets_register()
{
	$args = [
		'name' => 'サイドバーウィジェット',
		'id' => 'sidebar-widgets'
	];
	register_sidebar($args);
}

add_action('widgets_init', 'my_widgets_register');

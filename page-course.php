<?php get_header(); ?>
	<div id="container" class="container_course w_inner">
		<main>
			<h1 class="page_head">コース紹介</h1>
			<article class="course_wrap">
				<a href="<?php echo esc_url( home_url('/high-1st') ); ?>">
					<div class="img">
						<img src="<?php echo esc_url(get_theme_file_uri('/img/course-thumb-1st.jpg')); ?>"
							  srcset="<?php echo esc_url(get_theme_file_uri('/img/course-thumb-1st@2x.jpg')); ?> 2x" alt="">
					</div>
					<div class="txtarea">
						<h2 class="course_name">高１コース</h2>
						<div class="explain">高校に入学した時点から大学受験に向けての競争が始まっています。早い段階から受験を見据えて戦略的な学習計画を立てることで、余裕を持って大学受験を迎えることができます。早くから準備にとりかかりましょう。</div>
						<div class="btn_common">詳細をみる</div>
					</div>
				</a>
			</article>
			<article class="course_wrap">
				<a href="<?php echo esc_url( home_url('/high-2nd') ); ?>">
					<div class="img">
						<img src="<?php echo esc_url(get_theme_file_uri('/img/course-thumb-2nd.jpg')); ?>"
							  srcset="<?php echo esc_url(get_theme_file_uri('/img/course-thumb-2nd@2x.jpg')); ?> 2x" alt="">
					</div>
					<div class="txtarea">
						<h2 class="course_name">高２コース</h2>
						<div class="explain">高校２年生になるとある程度成績の優劣がついてきます。もし成績が志望校に対して届いていなくてもまだまだ挽回が可能です。志望校対策も高２から始めれば多くのことができますので、今から具体的な志望校対策を始めましょう。</div>
						<div class="btn_common">詳細をみる</div>
					</div>
				</a>
			</article>
			<article class="course_wrap">
				<a href="<?php echo esc_url( home_url('/high-3rd') ); ?>">
					<div class="img">
						<img src="<?php echo esc_url(get_theme_file_uri('/img/course-thumb-3rd.jpg')); ?>"
							  srcset="<?php echo esc_url(get_theme_file_uri('/img/course-thumb-3rd@2x.jpg')); ?> 2x" alt="">
					</div>
					<div class="txtarea">
						<h2 class="course_name">高３コース</h2>
						<div class="explain">いよいよ受験に向けて最終調整を行う時期がやってきました。志望校に対して成績が振るわない生徒さんもまだまだ諦めは不要です。高３から成績が伸びる生徒さんは今までにも多く見てきました。ラストスパートで受験を突破しましょう。</div>
						<div class="btn_common">詳細をみる</div>
					</div>
				</a>
			</article>
		</main>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
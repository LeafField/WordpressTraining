<?php get_header(); ?>
	<div id="container" class="container_school_bldg w_inner">
		<main>
			<h1 class="page_head">校舎案内</h1>
			<div class="school_list_wrap">
				<ul>
					<li>
						<div class="img">
							<img src="<?php echo esc_url(get_theme_file_uri('/img/school-bldg-tokyo.jpg')); ?>"
								  srcset="<?php echo esc_url(get_theme_file_uri('/img/school-bldg-tokyo@2x.jpg')); ?> 2x" alt="AZゼミ 東京校舎">
						</div>
						<div class="txtarea">
							<h2 class="head">東京校</h2>
							<p>青山の静かな立地に東京校はあります。東京校では200名が学習可能な自習室を完備しており、常にチューターや講師も常駐していますので、質問があればいつでも聞いてください。</p>
							<p class="address">
								〒107-0000<br>
								東京都港区青山1-99-99 青山ビル
							</p>
						</div>
					</li>
					<li>
						<div class="img">
							<img src="<?php echo esc_url(get_theme_file_uri('/img/school-bldg-yokohama.jpg')); ?>"
								  srcset="<?php echo esc_url(get_theme_file_uri('/img/school-bldg-yokohama@2x.jpg')); ?> 2x" alt="AZゼミ 横浜校舎">
						</div>
						<div class="txtarea">
							<h2 class="head">横浜校</h2>
							<p>一昨年開塾した横浜校はまだまだ校舎が綺麗で、生徒にも大変人気です。広々した半個室の学習室は調べごとをしながら受験勉強をするのに最適。ぜひこの環境を活用してください。</p>
							<p class="address">
								〒220-0000<br>
								神奈川県横浜市西区みなとみらい1-99-99 みらいビル
							</p>
						</div>
					</li>
					<li>
						<div class="img">
							<img src="<?php echo esc_url(get_theme_file_uri('/img/school-bldg-fukuoka.jpg')); ?>"
								  srcset="<?php echo esc_url(get_theme_file_uri('/img/school-bldg-fukuoka@2x.jpg')); ?> 2x" alt="AZゼミ 福岡校舎">
						</div>
						<div class="txtarea">
							<h2 class="head">福岡校</h2>
							<p>天神南に位置する福岡校は県内屈指の強豪校の生徒も数多く集まります。九大を目指す生徒も多く、数々の九大生を輩出してきました。先生も人情味に溢れた個性あふれる人ばかりです。</p>
							<p class="address">
								〒810-0000<br>
								福岡県福岡市天神南1-99-99 天神ビル
							</p>
						</div>
					</li>
				</ul>
			</div>
		</main>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
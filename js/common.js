jQuery(function ($) {
	$(window).on('scroll', function () {
		const scroll = $(this).scrollTop();
		if (scroll > 300) {
			$('#go_top').fadeIn('fast');
		} else {
			$('#go_top').fadeOut('fast');
		}
	});
});
jQuery(function ($) {
	$('#go_top').click(function () {
		$('html').animate({ scrollTop: 0 }, 300, 'swing');
	});
});
jQuery(function ($) {
	let scrollPosition;
	$('#nav_input').change(function () {
		if ($('#nav_input').prop('checked') == true) {
			$('.nav_wrap').addClass('open');
			scrollPosition = $(window).scrollTop();
			$('body').addClass('fixed').css({ 'top': -scrollPosition }); //スクロール位置を維持
		} else {
			$('.nav_wrap').removeClass('open');
			$('body').removeClass('fixed').css({ 'top': 0 });
			window.scrollTo(0, scrollPosition); //スクロール位置を元の位置に指定
		}
	});
});
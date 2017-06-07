jQuery.extend(jQuery.easing, {
	easeInOutBack: function(e, f, a, i, h, g) {
		if (g == undefined) {
			g = 1.70158
		}
		if ((f /= h / 2) < 1) {
			return i / 2 * (f * f * (((g *= (1.525)) + 1) * f - g)) + a
		}
		return i / 2 * ((f -= 2) * f * (((g *= (1.525)) + 1) * f + g) + 2) + a
	}
});
var i = 0, got = -1, len = document.getElementsByTagName('script').length;
while ( i <= len && got == -1){
	var js_url = document.getElementsByTagName('script')[i].src,
			got = js_url.indexOf('index.js'); i++ ;
}
var wp_url = js_url.substr(0, js_url.indexOf('usr'));
jQuery(document).ready(function($) {
	$("#container").waterfall({
		isResizable: true,
		isAnimated: true,
		Duration: 500,
		Easing: 'easeInOutBack',
		endFn: function() {
			$('#header-box').width($("#container").css('width'))
		}
	});
	$('.likes-count').live('click',function(){
		var that = $(this),
			cid = that.attr("data-cid");
		if(k!=false){
			k=false;
			that.addClass('likes-loading');
		$.post(wp_url+'usr/plugins/Likes/rating.php', 'likes='+cid
			,function(data) {
			that.removeClass('likes-loading');
			that.prev().text(data);
			k=true;
			}
		);
		}
	});
	var k = true,
		f = true,
		G = 2,
		W = $(window),
		P = $('#pagenavi'),
		n = $('#pagenavi ol li').length,
		max = parseInt($('#pagenavi li a:not(.next):last').text()) + 1,
		path = $('#pagenavi li a.next').length>0 ? ($('#pagenavi li a.next').attr('href').indexOf('index.php')?('index.php/page/'):('page/')) : "";
	//alert(max);
	P.empty().addClass('ajax-loading');
	W.bind("scroll",function() {
		var p = W.scrollTop(),
		q = P.offset().top,
		k = W.height(),
		i = q - p - k;
		if (i <= 0 && f != false) {
			ajax_post()
		}
	});
	function ajax_post(){
		if (G <= max) {
			$.ajax({
				url:wp_url+ path + G +'/?action=ajax_post',
				beforeSend: function() {
					f =false;
					P.fadeIn(300);
				},
				success: function(data) {
					$("#container").append(data).waterfall({
						isResizable: true,
						isAnimated: true,
						Duration: 500,
						Easing: 'easeInOutBack',
						endFn: function() {
							P.fadeOut(300);
							f = true;
							G++
						}
					})
				}
			})
		} else {
			P.css("background","none").text("已无妹纸已无图").fadeIn(300);
			setTimeout(function(){
				P.fadeOut(400)
			},5000);
			f =false;
			W.unbind('scroll');
		}		
	}
});
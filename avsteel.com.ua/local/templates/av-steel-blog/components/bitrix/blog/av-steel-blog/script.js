$(function() {

	$('#blog-new-posts-content .blog-post').each(function(){
		var img = $(this).find("img"),
			href= $(this).find('.post-link-title'),
			$h2 = $(this).find(""),
			str = $(this).find(".blog-post-content"),
			sum = ($h2.text() + str.text());
		$(this).children(".blog-post-date").before('<div class="preview-post-img" style="background: url(' + img.attr("src") + ') no-repeat center;"><a class="main-page-link-img" href=' + href.attr("href") + "/" + '></a></div><br>');
		if(sum.length > 300) {
			var res = sum.slice(0, 300)
			res += '...';
			$(str).html(res);
		}
		/*$(this).find('img').remove();*/
		var t = $(this).find('.blog-post-content').text();
		$(this).find('.blog-post-content').html(t);
	});
/*
	$('.blog-mainpage .blog-post').each(function(){
		var $h2 = $(this).find(""),
			str = $(this).find(".blog-post-content"),
			sum = ($h2.text() + str.text());

	});
*/

$('#h1Blog').css('margin-top', '' + ($('.main-menu-fixed').height() + 15) + 'px');

});
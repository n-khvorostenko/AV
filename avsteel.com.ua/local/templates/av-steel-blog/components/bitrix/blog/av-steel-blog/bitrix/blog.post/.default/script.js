$(function() {

$('.left-col-post').css('margin-top', ''+ ($('.blog-post .blog-post-title').height() + 30 + $('.blog-post-meta-util').height())  + 'px');
	
setImgTitle();
	function setImgTitle() {
	var windowHeight = window.innerWidth;
	if(windowHeight <= 768) {
		$('.blog-post-content').each(function(){
			var img = $(this).find("img").attr("src");
			$('#h1Blog-Mobile-bg').css('background', 'url(' + img + "/" + ') center no-repeat');
		});
 	}
	}


$(window).on("resize", function () {
setImgTitle();
  });
});
$(function() {



	$('.blog-post').each(function(){
		var img = $(this).find("img"),
			href= $(this).find('h2 > a');
		$(this).children(".blog-post-date").before('<a href=' + href.attr("href") + '><div style="background: url(' + img.attr("src") + ') no-repeat center;    width: 100%; height: 300px; background-size: contain;"></div></a><br>');
		$(this).find('img').remove();

	});


	$('.blog-post').each(function(){
		var $h2 = $(this).find(".blog-post-title > a"),
			str = $(this).find(".blog-post-content"),
			sum = ($h2.text() + str.text());
		if(sum.length > 300) {
		var res = sum.slice(0, 300)
		res += '...';
		$(str).html(res);
		}
	});

setFooter()

function setFooter() {
	if ($('.av-vs-blog-wrap').height() < $(window).height()) {
		$('#footer-wrap').addClass("fixed");
			};
    };


	SetSameHeight()
	function SetSameHeight() {
		var heightsArray = [];
		$('.blog-post').each(function()
		{
			$(this).removeAttr("style");
			heightsArray.push($(this).height());
			var heightsMaxValue = Math.max.apply(Math, heightsArray);
			$('.blog-post').height(heightsMaxValue);
		});
	};


});
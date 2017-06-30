$(function()
	{
	$('.av-blog-index-list > div').floodImage();
	$(window).resize(function()
		{
		$('.av-blog-index-list > div').floodImage();
		});
	});
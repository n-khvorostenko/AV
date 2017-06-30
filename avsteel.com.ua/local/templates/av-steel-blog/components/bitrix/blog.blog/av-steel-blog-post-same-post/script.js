$(function() {


	$('#blog-posts-content-same-section .blog-post').each(function(){
		var img = $(this).find("img");

		$(this).find(".same-post-link").html('<div style="background: url(' + img.attr("src") + ') no-repeat center;    width: 100%; height: 150px;background-size: cover;"></div>');
		$(this).find(".blog-post-content-same-post").find('img').remove();

	});


	$('.blog-post-content-same-post').each(function(){
		var str = $(this).html();
		if($(this).text().length > 150) {
		var res = str.slice(0, 150)
		res += '...';
		$(this).html(res);
		}
	});

samePostCarusel();
	function samePostCarusel() {
	var windowHeight = window.innerWidth;
	if(windowHeight <= 992) {

$('#same-section-post-wrap').slick({
  infinite: true,
  slidesToShow: 2,
  slidesToScroll: 1,
        centerMode: true,
        centerPadding: '20px',
responsive: [

    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '30px',
      }
    }
  ]
});
		};
 	};
	SetSameHeight()
	function SetSameHeight() {
		var heightsArray = [];
		$('.blog-post-content-wrap').each(function()
		{
			$(this).removeAttr("style");
			heightsArray.push($(this).height());
			var heightsMaxValue = Math.max.apply(Math, heightsArray);
			$('.blog-post-content-wrap').height(heightsMaxValue);
		});
	};

$(window).on("resize", function () {
samePostCarusel();
  });


});
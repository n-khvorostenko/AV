$(function()
	{


$('#bottom-slider-wrap .multiple-items').slick({
  infinite: true,
  slidesToShow: 2,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 760,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 440,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }


    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
/*
	$('.slick-slide').setSameHeight();*/
	});
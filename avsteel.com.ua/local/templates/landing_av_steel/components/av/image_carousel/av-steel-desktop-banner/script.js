$(function()
	{


$('.av-center').slick({
  centerMode: true,
  centerPadding: '520px',
  slidesToShow: 1,
  responsive: [
	{
      breakpoint: 1500,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '280px',
        slidesToShow: 1
      }
    },
	{
      breakpoint: 1000,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '80px',
        slidesToShow: 1
      }
    },
	{
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    },


    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '20px',
        slidesToShow: 1
      }
    }
  ]
});



	});
$(function()
{

	
	$('.center').slick({
	  centerMode: true,
	  centerPadding: '0px',
	  slidesToShow: 3,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '140px',
			slidesToShow: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 1
		  }
		}
	  ]
	});



//---------------------- ON CLICK ---------------------//

	$('.slick-slide [red-btn]').on('click', function() {
		AvBlurScreen("on", 1000);
		CreateAvAlertPopup3($(this).parent().html(), "").positionCenter(1200).on('remove', function() {
		AvBlurScreen("off");
		});
	});





});

function CreateAvAlertPopup3(html, type)
	{
	$('.av-alert-popup').remove();
	return $('<div class="av-alert-popup text-center">'+ html +'<div close-form2></div>'+'</div>').appendTo('body')
	.on('click', '[close-form2]', function() {$(this).closest('.av-alert-popup').remove(); $('[form-input-error-123]').removeClass("show")});
	}
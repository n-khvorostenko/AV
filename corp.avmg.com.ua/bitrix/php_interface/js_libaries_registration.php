<?
CJSCore::RegisterExt("bootstrap",           ["css" => '/bitrix/css/av_site/bootstrap.css']);
CJSCore::RegisterExt("first_on_event",      ["js"  => '/bitrix/js/av_site/first_on_event.js']);
CJSCore::RegisterExt("jquery_mobile_click", ["js"  => '/bitrix/js/av_site/jquery_mobile_click.js']);
CJSCore::RegisterExt
	(
	"av_site",
		[
		"js"  => '/bitrix/js/av_site/main.js',
		"css" => '/bitrix/css/av_site/main.css',
		"rel" => ["jquery", "first_on_event", "jquery_mobile_click"]
		]
	);
CJSCore::RegisterExt
	(
	"av_form_elements",
		[
		"js"  => '/bitrix/js/av_site/form_elements.js',
		"rel" => ["av_site"]
		]
	);
CJSCore::RegisterExt
	(
	"wait_for_images",
		[
		"js"  => '/bitrix/js/av_site/wait_for_images.js',
		"rel" => ["jquery"]
		]
	);
CJSCore::RegisterExt
	(
	"slick_js",
		[
		"js"  => '/bitrix/js/av_site/slick.js',
		"css" => '/bitrix/css/av_site/slick.css',
		"rel" => ["jquery"]
		]
	);
CJSCore::RegisterExt
	(
	"js_scrollbar",
		[
		"js"  => '/bitrix/js/av_site/js_scrollbar.js',
		"css" => '/bitrix/css/av_site/js_scrollbar.css',
		"rel" => ["jquery"]
		]
	);
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
/* ============================================================================================= */
/* ========================================= COUNTINGS ========================================= */
/* ============================================================================================= */
$currentPage         = $APPLICATION->GetCurPage(false);
$dirProperty         = $APPLICATION->GetDirPropertyList();
$workAreaType        = '';
$leftMenuSeted       = false;
$useBreadcrumbs      = $dirProperty["NOT_SHOW_NAV_CHAIN"] == 'Y' ? false : true;
$availableMarkupType = ["container_page", "left_menu_page", "full_screen_page"];

foreach(["top", "left"] as $menuType)
	{
	$menuObj = new CMenu($menuType);
	$menuObj->Init($APPLICATION->GetCurPage());
	if($menuType == 'left' && count($menuObj->arMenu)) $leftMenuSeted = true;

	foreach($menuObj->arMenu as $menuInfo)
		{
		$menuLink            = explode('?', $menuInfo[1])[0];
		$menuSubstring       = substr_count($currentPage, $menuLink)        ? true : false;
		$inheritWorkareaType = $menuInfo[3]["inherit_workarea_type"] == 'Y' ? true : false;

		if
			(
			in_array($menuInfo[3]["workarea_type"], $availableMarkupType)
			&&
				(
				$currentPage == $menuLink
				||
				($menuSubstring && $inheritWorkareaType)
				)
			)
			$workAreaType = $menuInfo[3]["workarea_type"];
		elseif
			(
			in_array($menuInfo[3]["children_workarea_type"], $availableMarkupType)
			&&
			$currentPage != $menuLink
			&&
			$menuSubstring
			)
			$workAreaType = $menuInfo[3]["children_workarea_type"];
		}
	}

if(!$workAreaType && $leftMenuSeted)             $workAreaType   = 'left_menu_page';
if(!$workAreaType)                               $workAreaType   = 'container_page';
if($currentPage == SITE_DIR || ERROR_404 == 'Y') $workAreaType   = 'full_screen_page';
if($workAreaType == 'full_screen_page')          $useBreadcrumbs = false;
/* ============================================================================================= */
/* ========================================== DOCUMENT ========================================= */
/* ============================================================================================= */
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- HEAD ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
		<title><?$APPLICATION->ShowTitle()?></title>
		<link rel="icon" type="image/x-icon" href="/favicon.ico">

		<?$APPLICATION->ShowHead()?>
		<?CJSCore::Init(["bootstrap", "av_site"])?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/script.js')?>
		<?
		/* ------------------------------------------- */
		/* ------------- google analytics ------------ */
		/* ------------------------------------------- */
		?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-34812595-1', 'auto');
			ga('send', 'pageview');
		</script>
		<?
		/* ------------------------------------------- */
		/* -------------- yandex metrica ------------- */
		/* ------------------------------------------- */
		?>
		<script>
			(function (d, w, c)
				{
				(w[c] = w[c] || []).push(function()
					{
					try
						{
						w.yaCounter17188231 = new Ya.Metrika
							({
							id                 : 17188231,
							clickmap           : true,
							trackLinks         : true,
							accurateTrackBounce: true,
							webvisor           : true
							});
						}
					catch(e)
						{

						}
					});

				var
					n = d.getElementsByTagName("script")[0],
					s = d.createElement("script"),
					f = function () { n.parentNode.insertBefore(s, n); };

				s.type  = 'text/javascript';
				s.async = true;
				s.src   = 'https://mc.yandex.ru/metrika/watch.js';

				if(w.opera == "[object Opera]") d.addEventListener("DOMContentLoaded", f, false);
				else                            f();
				})
			(document, window, "yandex_metrika_callbacks");
		</script>
	</head>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- BODY ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<body id="av-vst">
		<?$APPLICATION->ShowPanel()?>
		<?
		/* ------------------------------------------- */
		/* ------------------ header ----------------- */
		/* ------------------------------------------- */
		?>
		<header>
			<div class="hidden-lg hidden-md mobile-first-row">
				<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/hot_line.php'))?>
			</div>

			<div class="container">
				<?
				/* ---------------------------- */
				/* --------- desktop ---------- */
				/* ---------------------------- */
				?>
				<div class="col-lg-2 col-md-2 hidden-sm hidden-xs desktop-left-col">
					<?if($currentPage != SITE_DIR):?><a href="/"><?endif?>
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/logo.php'))?>
					<?if($currentPage != SITE_DIR):?></a><?endif?>
				</div>

				<div class="col-lg-10 col-md-10 hidden-sm hidden-xs desktop-right-col">
					<div class="desktop-gadgets-row">
						<div class="desktop-phone-cell">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/hot_line.php'))?>
						</div>

						<div class="desktop-search-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"bitrix:search.title", "av",
									array(
									"INPUT_ID"             => 'title-search-input',
									"CONTAINER_ID"         => 'title-search',
									"PREVIEW_TRUNCATE_LEN" => 150,
									"PAGE"                 => '#SITE_DIR#search/index.php',

									"NUM_CATEGORIES"     => 3,
									"TOP_COUNT"          => 5,
									"ORDER"              => 'date',
									"USE_LANGUAGE_GUESS" => 'Y',
									"CHECK_DATES"        => 'Y',
									"SHOW_OTHERS"        => 'N',

									"CATEGORY_0_TITLE"           => 'Основное',
									"CATEGORY_0"                 => array("main", "iblock_news", "iblock_services"),
									"CATEGORY_0_iblock_news"     => array(50),
									"CATEGORY_0_iblock_services" => array(59),

									"CATEGORY_1_TITLE"             => 'Продукция',
									"CATEGORY_1"                   => array("iblock_catalog", "iblock_references"),
									"CATEGORY_1_iblock_catalog"    => array("all"),
									"CATEGORY_1_iblock_references" => array("all"),

									"CATEGORY_2_TITLE"              => 'Металлобазы',
									"CATEGORY_2"                    => array("iblock_av_storages"),
									"CATEGORY_2_iblock_av_storages" => array("all")
									)
								);
							?>
						</div>

						<div>
							<?
							$APPLICATION->IncludeComponent
								(
								"av:visit_site.user.panel", "",
									array(
									"PROFILE_URL"         => '/user/info/index.php',
									"FORGOT_PASSWORD_URL" => '/user/forgot_password/',
									"BASKET_URL"          => '',

									"REGISTRATION_SHOW_FIELDS"         => array("EMAIL", "NAME", "LAST_NAME", "PERSONAL_MOBILE"),
									"REGISTRATION_SHOW_USER_PROPS"     => array(),
									"REGISTRATION_REQUIRED_FIELDS"     => array(),
									"REGISTRATION_REQUIRED_USER_PROPS" => array()
									)
								)
							?>
						</div>
					</div>

					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:menu", "av_vs",
							array(
							"ROOT_MENU_TYPE"     => 'top',
							"MAX_LEVEL"          => 2,
							"CHILD_MENU_TYPE"    => 'left',
							"USE_EXT"            => 'Y',
							"DELAY"              => 'N',
							"ALLOW_MULTI_SELECT" => 'Y',

							"MENU_CACHE_TYPE"       => 'A',
							"MENU_CACHE_TIME"       => 360000,
							"MENU_CACHE_USE_GROUPS" => 'Y'
							)
						)
					?>
				</div>
				<?
				/* ---------------------------- */
				/* ---------- mobile ---------- */
				/* ---------------------------- */
				?>
				<div class="hidden-lg hidden-md mobile-second-row">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:menu", "av_vs_mobile",
							array(
							"ROOT_MENU_TYPE"     => 'top',
							"MAX_LEVEL"          => 2,
							"CHILD_MENU_TYPE"    => 'left',
							"USE_EXT"            => 'Y',
							"DELAY"              => 'N',
							"ALLOW_MULTI_SELECT" => 'Y',

							"MENU_CACHE_TYPE"       => 'A',
							"MENU_CACHE_TIME"       => 360000,
							"MENU_CACHE_USE_GROUPS" => 'Y'
							)
						);
					?>

					<?if($currentPage != SITE_DIR):?><a href="/"><?endif?>
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/logo_mobile.php'))?>
					<?if($currentPage != SITE_DIR):?></a><?endif?>

					<div class="mobile-search-cell">
						<?
						$APPLICATION->IncludeComponent
							(
							"bitrix:search.title", "av_mobile",
								array(
								"INPUT_ID"             => 'title-search-input-mobile',
								"CONTAINER_ID"         => 'title-search-mobile',
								"PREVIEW_TRUNCATE_LEN" => 150,
								"PAGE"                 => '#SITE_DIR#search/index.php',

								"NUM_CATEGORIES"     => 3,
								"TOP_COUNT"          => 5,
								"ORDER"              => 'date',
								"USE_LANGUAGE_GUESS" => 'Y',
								"CHECK_DATES"        => 'Y',
								"SHOW_OTHERS"        => 'N',

								"CATEGORY_0_TITLE"           => 'Основное',
								"CATEGORY_0"                 => array("main", "iblock_news", "iblock_services"),
								"CATEGORY_0_iblock_news"     => array(50),
								"CATEGORY_0_iblock_services" => array(59),

								"CATEGORY_1_TITLE"             => 'Продукция',
								"CATEGORY_1"                   => array("iblock_catalog", "iblock_references"),
								"CATEGORY_1_iblock_catalog"    => array("all"),
								"CATEGORY_1_iblock_references" => array("all"),

								"CATEGORY_2_TITLE"              => 'Металлобазы',
								"CATEGORY_2"                    => array("iblock_av_storages"),
								"CATEGORY_2_iblock_av_storages" => array("all")
								)
							)
						?>
					</div>
				</div>
			</div>
		</header>
		<?
		/* ------------------------------------------- */
		/* ------------------ body ------------------- */
		/* ------------------------------------------- */
		?>
		<?if($currentPage != SITE_DIR && ERROR_404 != 'Y'):?>
		<h1 class="page-main-title" <?if($dirProperty["TITLE_BACKGROUND"]):?>style="background-image: url(<?=$dirProperty["TITLE_BACKGROUND"]?>)"<?endif?>>
			<?$APPLICATION->ShowTitle(false)?>
		</h1>
		<?endif?>

		<div class="page-workarea <?=$workAreaType?><?if($workAreaType != 'full_screen_page'):?> container<?endif?>">
			<?if($workAreaType != 'full_screen_page'):?>
			<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">
			<?endif?>
				<?if($useBreadcrumbs):?>
				<div class="page-breadcrumbs">
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "av")?>
				</div>
				<?endif?>

				<?if($workAreaType == 'left_menu_page'):?>
				<div class="col-lg-4 col-md-4 hidden-sm hidden-xs left-column">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:menu", "av_vs_vertical",
							array(
							"ROOT_MENU_TYPE"     => 'left',
							"MAX_LEVEL"          => 1,
							"CHILD_MENU_TYPE"    => 'left',
							"USE_EXT"            => 'Y',
							"DELAY"              => 'N',
							"ALLOW_MULTI_SELECT" => 'N',

							"MENU_CACHE_TYPE"       => 'A',
							"MENU_CACHE_TIME"       => 360000,
							"MENU_CACHE_USE_GROUPS" => 'Y'
							)
						)
					?>
					<div class="bottom">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'sect'))?>
					</div>
				</div>

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 right-column">
				<?endif?>
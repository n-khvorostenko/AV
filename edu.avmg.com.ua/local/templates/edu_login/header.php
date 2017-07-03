<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if($APPLICATION->GetCurPage(false) != '/auth/') LocalRedirect('/auth/');
IncludeTemplateLangFile(__FILE__);

$errors                = [];
$registrationAvailable = COption::GetOptionString("main", "new_user_registration") == 'Y' ? true : false;

if(isset($APPLICATION->arAuthResult) && $APPLICATION->arAuthResult !== true)
	$errors[] = $APPLICATION->arAuthResult["MESSAGE"];
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
		<title><?=GetMessage("EDU_TITLE")?></title>
		<link rel="icon" type="image/x-icon" href="/favicon.ico">

		<?$APPLICATION->ShowHead()?>
		<?CJSCore::Init(["av_site", "wait_for_images"])?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/script.js')?>
	</head>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- BODY ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<body id="av-edu-login">
		<div class="background"></div>
		<div class="main-window">
			<?
			/* ------------------------------------------- */
			/* ---------------- top block ---------------- */
			/* ------------------------------------------- */
			?>
			<?if(count($errors)):?>
			<div class="top-block">
				<?=implode('<br>', $errors)?>
			</div>
			<?endif?>
			<?
			/* ------------------------------------------- */
			/* --------------- left block ---------------- */
			/* ------------------------------------------- */
			?>
			<div class="left-block">
				<div>
					<img
						class="logo"
						src="<?=SITE_TEMPLATE_PATH?>/images/logo.svg"
						alt="<?=GetMessage("EDU_LOGO_ALT")?>"
						title="<?=GetMessage("EDU_LOGO_TITLE")?>"
					>
					<div class="info-block">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/auth_preview.php'))?>
					</div>
				</div>

				<div class="call-form-block auth">
					<div class="title"><?=GetMessage("EDU_AUTH_TEXT")?></div>
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form.button", "av_alt",
							array(
							"BUTTON_TYPE" => 'label',
							"TITLE"       => GetMessage("EDU_AUTH_CALL_BUTTON"),
							"ATTR"        => ["data-call-form" => 'auth']
							)
						);
					?>
				</div>

				<?if($registrationAvailable):?>
				<div class="call-form-block registration">
					<div class="title"><?=GetMessage("EDU_REGISTRATION_TEXT")?></div>
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form.button", "av_alt",
							array(
							"BUTTON_TYPE" => 'label',
							"TITLE"       => GetMessage("EDU_REGISTRATION_CALL_BUTTON"),
							"ATTR"        => ["data-call-form" => 'registration']
							)
						);
					?>
				</div>
				<?endif?>
			</div>
			<?
			/* ------------------------------------------- */
			/* --------------- right block --------------- */
			/* ------------------------------------------- */
			?>
			<div class="right-block">
				<div class="forms-block">
					<div class="auth">
						<?
						$APPLICATION->IncludeComponent
							(
							"bitrix:system.auth.authorize", "av_edu_login",
								array(

								)
							);
						?>
					</div>

					<div class="forgotpass">
						<?
						$APPLICATION->IncludeComponent
							(
							"bitrix:system.auth.forgotpasswd", "av_edu_login",
								array(

								)
							);
						?>
					</div>

					<?if($registrationAvailable):?>
					<div class="registration">
						<?
						$APPLICATION->IncludeComponent
							(
							"bitrix:system.auth.registration", "av_edu_login",
								array(

								)
							);
						?>
					</div>
					<?endif?>
				</div>

				<div class="submit-buttons-block">
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form.button", "av",
							array(
							"BUTTON_TYPE" => 'label',
							"TITLE"       => GetMessage("EDU_AUTH_SUBMIT_BUTTON"),
							"ATTR"        => ["data-submit-form" => 'auth']
							)
						);
					$APPLICATION->IncludeComponent
						(
						"av:form.button", "av",
							array(
							"BUTTON_TYPE" => 'label',
							"TITLE"       => GetMessage("EDU_FORGOTPASS_SUBMIT_BUTTON"),
							"ATTR"        => ["data-submit-form" => 'forgotpass']
							)
						);
					if($registrationAvailable)
						$APPLICATION->IncludeComponent
							(
							"av:form.button", "av",
								array(
								"BUTTON_TYPE" => 'label',
								"TITLE"       => GetMessage("EDU_REGISTRATION_SUBMIT_BUTTON"),
								"ATTR"        => ["data-submit-form" => 'registration']
								)
							);

					$APPLICATION->IncludeComponent
						(
						"av:form.button", "av_alt3",
							array(
							"BUTTON_TYPE" => 'label',
							"TITLE"       => GetMessage("EDU_AUTH_CALL_BUTTON"),
							"ATTR"        => ["data-call-form" => 'auth']
							)
						);
					if($registrationAvailable)
						$APPLICATION->IncludeComponent
							(
							"av:form.button", "av_alt3",
								array(
								"BUTTON_TYPE" => 'label',
								"TITLE"       => GetMessage("EDU_REGISTRATION_CALL_BUTTON"),
								"ATTR"        => ["data-call-form" => 'registration']
								)
							);
					?>
				</div>
			</div>
			<?
			/* ------------------------------------------- */
			/* --------------- bottom block -------------- */
			/* ------------------------------------------- */
			?>
			<div class="bottom-block">
				<div class="forgot-pass-link" data-call-form="forgotpass">
					<?=GetMessage("EDU_FORGOTPASS_CALL_BUTTON")?>
				</div>
			</div>
		</div>
	</body>
</html>
<?ob_start()?>
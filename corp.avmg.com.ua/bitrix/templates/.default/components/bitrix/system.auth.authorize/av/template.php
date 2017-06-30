<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 */

//one css for all system.auth.* forms
//$APPLICATION->SetAdditionalCSS("/bitrix/css/main/system.auth/flat/style.css");
$APPLICATION->SetAdditionalCSS("/style.css");
?><div class="bx-authform text-center">

	<form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
<?if (strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
<?endforeach?>

	<?/********** ЛОГИН *********************/?>
		<div class="inputWrap text-left">
			<label for="inputName" ><?=GetMessage("AUTH_LOGIN")?>&nbsp;&nbsp;&nbsp;&nbsp;|</label>
			<?/*<div class="bx-authform-input-container">*/?>
				<input id="inputName" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" />
			<?/*</div>*/?>
		</div>


<?/********** ОШИБКИ *********************/?>
<div class="hidden-sm hidden-xs  alert-desctope">
	<?
	if(!empty($arParams["~AUTH_RESULT"])):
		$text = str_replace(array("<br>", "<br />"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
	?>
	<div class="arrow-left"></div>
	<br><span><b><?=nl2br(htmlspecialcharsbx($text))?></b></span><br>
	<p>&nbsp;Пожалуйста, проверьте раскладку клавиатуры и посмотрите, не нажата ли клавиша &#171;Сaps Lock&#187;, а затем попробуйте ввести логин и пароль снова.</p>
	<?endif?>
</div>


	<?/********** PASS *********************/?>
		<div class="inputWrap text-left">
			<label for="inputPass"><?=GetMessage("AUTH_PASSWORD")?> |</label>

<?if($arResult["SECURE_AUTH"]):?>

<div class="bx-authform-psw-protected" id="bx_auth_secure" style="display:none"><div class="bx-authform-psw-protected-desc"><span></span><?echo GetMessage("AUTH_SECURE_NOTE")?></div></div>

<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = '';
</script>
<?endif?>
	<input id="inputPass" type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off" />
	</div>

<?if($arResult["CAPTCHA_CODE"]):?>
		<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />

		<div class="bx-authform-formgroup-container dbg_captha">
			<div class="bx-authform-label-container">
				<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>
			</div>
			<div class="bx-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /></div>
			<div class="bx-authform-input-container">
				<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
			</div>
		</div>
<?endif;?>

<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
		<div class="bx-authform-formgroup-container">
			<div class="checkbox">
				<label class="bx-filter-param-label">
					<input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" />
					<span class="bx-filter-param-text"><?=GetMessage("AUTH_REMEMBER_ME")?></span>
				</label>
			</div>
		</div>
<?endif?>
<br>

	<?/********** ОТПРАВИТЬ *********************/?>
			<input type="submit" class="btn btn-primary" name="Login" value="ВХОД В КОРПОРАТИВНЫЙ ПОРТАЛ"/>

	</form>


<?/********** ОШИБКИ МОБ*********************/?>
<div class="hidden-lg hidden-md inline alert-mobile">
	<?
	if(!empty($arParams["~AUTH_RESULT"])):
		$text = str_replace(array("<br>", "<br />"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
	?><br>
		<span><b><?=nl2br(htmlspecialcharsbx($text))?></b></span><br>
	<p>&nbsp;&nbsp;Пожалуйста, проверьте раскладку клавиатуры и посмотрите, не нажата ли клавиша &#171;Сaps Lock&#187;, а затем попробуйте ввести логин и пароль снова.</p>
	<?endif?>
</div>

	<span id="notification"><b><br>Логин и пароль соответствуют корпоративным данным.<br>служба поддержки <a style="color: rgba(255,255,255, .9);" href="mailto:support@avmg.com.ua">support@avmg.com.ua</b></span>
	<?/*if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>
	<hr class="bxe-light">

	<noindex>
		<div class="bx-authform-link-container">
			<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><b><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></b></a>
		</div>
	</noindex>
<?endif*/?>

	<?/*if($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y"):?>
	<noindex>
		<div class="bx-authform-link-container">
			<?=GetMessage("AUTH_FIRST_ONE")?><br />
			<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><b><?=GetMessage("AUTH_REGISTER")?></b></a>
		</div>
	</noindex>
<?endif*/?>

</div>

<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>
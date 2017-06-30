<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("Подтверждение регистрации");

$APPLICATION->IncludeComponent
	(
	"bitrix:system.auth.confirmation", "av",
		array(
		"USER_ID"      => 'confirm_user_id',
		"CONFIRM_CODE" => 'confirm_code',
		"LOGIN"        => 'login',
		"PROFILE_URL"  => '/user/info/'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';
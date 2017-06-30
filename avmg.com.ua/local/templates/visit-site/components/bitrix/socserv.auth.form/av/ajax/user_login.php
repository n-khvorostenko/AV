<?
use
	\Bitrix\Main\Loader,
	\Bitrix\Socialservices\UserTable;

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!Loader::includeModule("socialservices"))                    die();

include str_replace('ajax', '', __DIR__).'lang/'.LANGUAGE_ID.'/template.php';

$answer =
	[
	"status"  => '',
	"message" => ''
	];
/* -------------------------------------------------------------------- */
/* ------------------------ already authorized ------------------------ */
/* -------------------------------------------------------------------- */
if($USER->IsAuthorized())
	{
	$answer["status"] = 'success';
	goto script_answer;
	}
/* -------------------------------------------------------------------- */
/* ---------------------- errors preprocessing ------------------------ */
/* -------------------------------------------------------------------- */
if(!$_POST["service_type"] || !$_POST["token"] || !$_POST["expires"] || !$_POST["id"])
	{
	$titlesArray = [];
	foreach
		(
			[
			"service_type" => $MESS["AV_SOC_AUTH_SOC_TYPE"],
			"token"        => $MESS["AV_SOC_AUTH_SOC_TOKEN"],
			"expires"      => $MESS["AV_SOC_AUTH_SOC_EXPIRES"],
			"id"           => $MESS["AV_SOC_AUTH_USER_SOC_ID"]
			]
		as $field => $title
		)
		if(!$_POST[$field])
			$titlesArray[] = $title;

	$answer["status"]  = 'error';
	$answer["message"] = str_replace('#REQUIRED_FIELDS#', implode(', ', $titlesArray), $MESS["AV_SOC_AUTH_ERROR_TEXT_FIELDS_REQUIRED"]);
	goto script_answer;
	}
/* -------------------------------------------------------------------- */
/* --------------------------- authorizing ---------------------------- */
/* -------------------------------------------------------------------- */
$userParamsArray =
	[
	"XML_ID"          => $_POST["id"],
	"OATOKEN"         => $_POST["token"],
	"OATOKEN_EXPIRES" => $_POST["expires"],

	"NAME"            => $_POST["first_name"],
	"LAST_NAME"       => $_POST["last_name"],
	"EMAIL"           => $_POST["email"],
	"PERSONAL_PHOTO"  => $_POST["photo"] ? CFile::MakeFileArray($_POST["photo"]) : ''
	];

switch($_POST["service_type"])
	{
	case "facebook":
		$userParamsArray["EXTERNAL_AUTH_ID"]  = CSocServFacebook::ID;
		$userParamsArray["LOGIN"]             = CSocServFacebook::LOGIN_PREFIX.$userParamsArray["XML_ID"];
		$userParamsArray["PERSONAL_BIRTHDAY"] = $_POST["birthday"] ? ConvertTimeStamp(MakeTimeStamp($_POST["birthday"], 'MM/DD/YYYY')) : '';

			if($_POST["gender"] == 'male')   $userParamsArray["PERSONAL_GENDER"] = 'M';
		elseif($_POST["gender"] == 'female') $userParamsArray["PERSONAL_GENDER"] = 'F';

		break;
	case "vk":
		$userParamsArray["EXTERNAL_AUTH_ID"]  = CSocServVKontakte::ID;
		$userParamsArray["LOGIN"]             = 'VKuser'.$userParamsArray["XML_ID"];
		$userParamsArray["PERSONAL_BIRTHDAY"] = $_POST["birthday"] ? ConvertTimeStamp(MakeTimeStamp($_POST["birthday"], 'DD.MM.YYYY')) : '';

			if($_POST["gender"] == 2) $userParamsArray["PERSONAL_GENDER"] = 'M';
		elseif($_POST["gender"] == 1) $userParamsArray["PERSONAL_GENDER"] = 'F';

		break;
	case "gplus":
		$userParamsArray["EXTERNAL_AUTH_ID"]  = CSocServGooglePlusOAuth::ID;
		$userParamsArray["LOGIN"]             = CSocServGooglePlusOAuth::LOGIN_PREFIX.$userParamsArray["XML_ID"];
		$userParamsArray["PERSONAL_BIRTHDAY"] = $_POST["birthday"] ? ConvertTimeStamp(MakeTimeStamp($_POST["birthday"], 'DD.MM.YYYY')) : '';

		if($_POST["gender"] == 'male')   $userParamsArray["PERSONAL_GENDER"] = 'M';
		elseif($_POST["gender"] == 'female') $userParamsArray["PERSONAL_GENDER"] = 'F';

		break;
	}

if((new CSocServFacebook())->AuthorizeUser($userParamsArray) === true) $answer["status"] = 'success';
else                                                                   $answer["status"] = 'error';
/* -------------------------------------------------------------------- */
/* ------------------------ errors processing ------------------------- */
/* -------------------------------------------------------------------- */
if($answer["status"] == 'error')
	{
	$queryList = UserTable::getList
		([
		 "filter" =>
			 [
			 "=XML_ID"           => $userParamsArray["XML_ID"],
			 "=EXTERNAL_AUTH_ID" => $userParamsArray["EXTERNAL_AUTH_ID"]
			 ],
		 "select" => ["ID", "NAME", "LAST_NAME", "ACTIVE" => "USER.ACTIVE"]
	 	]);
	$queryelement = $queryList->fetch();
	if($queryelement["ACTIVE"] == 'N')
		$answer["message"] = str_replace
			(
			'#USER_NAME#',
			$queryelement["NAME"].' '.$queryelement["LAST_NAME"],
			$MESS["AV_SOC_AUTH_ERROR_TEXT_USER_UNACTIVE"]
			);
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ answer ------------------------------ */
/* -------------------------------------------------------------------- */
script_answer:
echo json_encode($answer);
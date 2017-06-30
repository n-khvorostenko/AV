<?
use \Bitrix\Main\Loader;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ----------------------- arParams correction ------------------------ */
/* -------------------------------------------------------------------- */
$arParams["PROFILE_URL"]                      = trim($arParams["PROFILE_URL"]);
$arParams["FORGOT_PASSWORD_URL"]              = trim($arParams["FORGOT_PASSWORD_URL"]);
$arParams["BASKET_URL"]                       = trim($arParams["BASKET_URL"]);

$arParams["REGISTRATION_SHOW_FIELDS"]         = is_array($arParams["REGISTRATION_SHOW_FIELDS"])         ? $arParams["REGISTRATION_SHOW_FIELDS"]         : [];
$arParams["REGISTRATION_SHOW_USER_PROPS"]     = is_array($arParams["REGISTRATION_SHOW_USER_PROPS"])     ? $arParams["REGISTRATION_SHOW_USER_PROPS"]     : [];
$arParams["REGISTRATION_REQUIRED_FIELDS"]     = is_array($arParams["REGISTRATION_REQUIRED_FIELDS"])     ? $arParams["REGISTRATION_REQUIRED_FIELDS"]     : [];
$arParams["REGISTRATION_REQUIRED_USER_PROPS"] = is_array($arParams["REGISTRATION_REQUIRED_USER_PROPS"]) ? $arParams["REGISTRATION_REQUIRED_USER_PROPS"] : [];
/* -------------------------------------------------------------------- */
/* --------------------------- authorizing ---------------------------- */
/* -------------------------------------------------------------------- */
if(!$USER->IsAuthorized())
	{
	$errors    = [];
	$userLogin = htmlspecialcharsbx($_COOKIE[COption::GetOptionString("main", "cookie_name", "BITRIX_SM")."_LOGIN"]);
	if(isset($APPLICATION->arAuthResult) && $APPLICATION->arAuthResult !== true) $errors[] = $APPLICATION->arAuthResult["MESSAGE"];

	$arResult["AUTH"] =
		[
		"CAPTCHA_CODE"       => $APPLICATION->NeedCAPTHAForLogin($userLogin) ? $APPLICATION->CaptchaGetCode() : false,
		"ERRORS"             => $errors,
		"STORE_PASSWORD"     => COption::GetOptionString("main", "store_password", "Y") == 'Y' ? true : false,
		"SOC_SERVICES"       => Loader::includeModule("socialservices") && COption::GetOptionString("socialservices", "allow_registration") == 'Y' ? (new CSocServAuthManager())->GetActiveAuthServices() : [],
		"FORM_NAME"          => 'system_auth_form'.$this->randString(),
		"SUBMIT_BUTTON_NAME" => 'Login'.$this->randString(),
		"FORM_FIELDS"        =>
			[
			"LOGIN" =>
				[
				"TITLE"      => GetMessage("AUTH_FIELD_LOGIN"),
				"INPUT_NAME" => 'USER_LOGIN',
				"VALUE"      => $userLogin
				],
			"PASS" =>
				[
				"TITLE"      => GetMessage("AUTH_FIELD_PASSWORD"),
				"INPUT_NAME" => 'USER_PASSWORD'
				],
			"REMEMBER_ME" =>
				[
				"INPUT_NAME" => 'REMEMBER_ME'
				]
			]
		];
	}
/* -------------------------------------------------------------------- */
/* --------------------------- registration --------------------------- */
/* -------------------------------------------------------------------- */
if(!$USER->IsAuthorized() && COption::GetOptionString("main", "new_user_registration", "N") == "Y")
	{
	/* ------------------------------------------- */
	/* ---------------- variables ---------------- */
	/* ------------------------------------------- */
	$emailRequired        = COption::GetOptionString("main", "new_user_email_required")                  == 'Y'                   ? true : false;
	$useEmailConfirmation = COption::GetOptionString("main", "new_user_registration_email_confirmation") == 'Y' && $emailRequired ? true : false;
	$useCaptcha           = COption::GetOptionString("main", "captcha_registration")                     == 'Y'                   ? true : false;

	$formDefaultFields = ["LOGIN", "PASSWORD", "CONFIRM_PASSWORD"];
	if($emailRequired) $formDefaultFields[] = "EMAIL";
	$arParams["REGISTRATION_SHOW_FIELDS"]     = array_unique(array_merge($formDefaultFields, $arParams["REGISTRATION_SHOW_FIELDS"]));
	$arParams["REGISTRATION_REQUIRED_FIELDS"] = array_unique(array_merge($formDefaultFields, $arParams["REGISTRATION_REQUIRED_FIELDS"]));

	$formName         = 'regform';
	$formInputPrefix  = 'REGISTER';
	$submitButtonName = 'register_submit_button'.$this->randString();
	$formValues       = $_REQUEST[$formInputPrefix];
	$errors           = [];

	$registrationFormUserProps = [];
	foreach($GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("USER", 0, LANGUAGE_ID) as $fieldName => $arUserField)
		if(in_array($fieldName, $arParams["REGISTRATION_SHOW_USER_PROPS"]) || $arUserField["MANDATORY"] == 'Y')
			$registrationFormUserProps[$fieldName] = $arUserField;

	$registrationFormFields = [];
	foreach($arParams["REGISTRATION_SHOW_FIELDS"] as $field)
		$registrationFormFields[$field] =
			[
			"TITLE"      => GetMessage('REGISTER_FIELD_'.$field),
			"INPUT_NAME" => $formInputPrefix.'['.$field.']',
			"VALUE"      => $formValues[$field],
			"REQUIRED"   => in_array($field, $arParams["REGISTRATION_REQUIRED_FIELDS"]) ? 'Y' : 'N'
			];
	/* ------------------------------------------- */
	/* ----------------- handler ----------------- */
	/* ------------------------------------------- */
	if(is_set($_REQUEST[$submitButtonName]))
		{
		/* ---------------------------- */
		/* - encrypted user password -- */
		/* ---------------------------- */
		if(COption::GetOptionString("main", "use_encrypted_auth", "N") == 'Y')
			{
			$securityObject = new CRsaSecurity();
			$securityKeys   = $securityObject->LoadKeys();
			if($securityKeys)
				{
				$securityObject->SetKeys($securityKeys);
				$error = $securityObject->AcceptFromForm([$formInputPrefix]);
				if($error == CRsaSecurity::ERROR_SESS_CHECK) $errors[] = GetMessage("AV_AUTH_REGISTRATION_SESSION_EXPIRED");
				elseif($error < 0)                           $errors[] = GetMessage("AV_AUTH_REGISTRATION_DECODE_ERROR", ["#ERRCODE#" => $error]);
				}
			}
		/* ---------------------------- */
		/* -------- check form -------- */
		/* ---------------------------- */
		foreach($registrationFormFields as $field => $fieldArray)
			if($fieldArray["REQUIRED"] == 'Y' && !$fieldArray["VALUE"])
				$errors[$property] = GetMessage("AV_AUTH_REGISTRATION_FIELD_REQUIRED", ["#FIELD_NAME#" => $fieldArray["TITLE"]]);

		if(!$GLOBALS["USER_FIELD_MANAGER"]->CheckFields("USER", 0, $formValues))
			{
			$errors[] = substr($APPLICATION->GetException()->GetString(), 0, -4); //cutting "<br>"
			$APPLICATION->ResetException();
			}
		/* ---------------------------- */
		/* ------- check captcha ------ */
		/* ---------------------------- */
		if($useCaptcha)
			{
			$captchaPassResult = json_decode(file_get_contents(
				'https://www.google.com/recaptcha/api/siteverify',
				false,
				stream_context_create
					([
					'http' =>
						[
						'method'  => 'POST',
						'header'  => 'Content-type: application/x-www-form-urlencoded',
						'content' => http_build_query
							([
							"secret"   => GOOGLE_RECAPTCHA_SECRETKEY,
							"response" => $_REQUEST["g-recaptcha-response"],
							"remoteip" => $_SERVER["REMOTE_ADDR"]
							])
						]
					])
				));
			if(!$captchaPassResult->success) $errors[] = GetMessage("AV_AUTH_RECAPTCHA_FAILED");
			}
		/* ---------------------------- */
		/* ------- check errors ------- */
		/* ---------------------------- */
		if(count($errors) && COption::GetOptionString("main", "event_log_register_fail", "N") == 'Y')
			{
			$arErrors = [];
			foreach($errors as $key => $error) $arErrors[$key] = str_replace("#FIELD_NAME#", '"'.$key.'"', $error);
			CEventLog::Log("SECURITY", "USER_REGISTER_FAIL", "main", false, implode('<br>', $arErrors));
			}
		/* ---------------------------- */
		/* -------- create user ------- */
		/* ---------------------------- */
		if(!count($errors))
			{
			$userDefaultGroups = explode(",", COption::GetOptionString("main", "new_user_registration_def_group", ""));

			$formValues["CHECKWORD"]       = md5(CMain::GetServerUniqID().uniqid());
			$formValues["~CHECKWORD_TIME"] = $DB->CurrentTimeFunction();
			$formValues["ACTIVE"]          = $useEmailConfirmation ? 'N': 'Y';
			$formValues["CONFIRM_CODE"]    = $useEmailConfirmation ? randString(8) : '';
			$formValues["LID"]             = SITE_ID;
			$formValues["USER_IP"]         = $_SERVER["REMOTE_ADDR"];
			$formValues["USER_HOST"]       = @gethostbyaddr($_SERVER["REMOTE_ADDR"]);
			$formValues["AUTO_TIME_ZONE"]  = in_array($formValues["AUTO_TIME_ZONE"], ["Y", "N"]) ? $formValues["AUTO_TIME_ZONE"] : '';
			$formValues["GROUP_ID"]        = count($userDefaultGroups)                           ? $userDefaultGroups            : [];

			$bOk            = true;
			$newUserObj     = new CUser();
			$newUserId      = 0;
			$userAuthResult = false;

			foreach(GetModuleEvents("main", "OnBeforeUserRegister", true) as $arEvent)
				if(ExecuteModuleEventEx($arEvent, [&$formValues]) === false)
					{
					$error = $APPLICATION->GetException();
					if($error) $errors[] = $error->GetString();
					$bOk = false;
					break;
					}
			if($bOk) $newUserId = intval($newUserObj->Add($formValues));

			if($newUserId)
				{
				if($useEmailConfirmation)                                                            $_SESSION["NEW_USER_REGISTER_EMAIL_IS_SENT"] = true;
				elseif(!$arAuthResult = $USER->Login($formValues["LOGIN"], $formValues["PASSWORD"])) $errors[] = $arAuthResult;

				$arEventFields = $formValues;
				$arEventFields["USER_ID"] = $newUserId;
				unset($arEventFields["PASSWORD"]);
				unset($arEventFields["CONFIRM_PASSWORD"]);

				$event = new CEvent;
				$event->SendImmediate("NEW_USER", SITE_ID, $arEventFields);
				if($useEmailConfirmation) $event->SendImmediate("NEW_USER_CONFIRM", SITE_ID, $arEventFields);
				}
			else
				$errors[] = $newUserObj->LAST_ERROR;

			if(!count($errors) && COption::GetOptionString("main", "event_log_register",      "N") == 'Y') CEventLog::Log("SECURITY", "USER_REGISTER",      "main", $newUserId);
			if( count($errors) && COption::GetOptionString("main", "event_log_register_fail", "N") == 'Y') CEventLog::Log("SECURITY", "USER_REGISTER_FAIL", "main", $newUserId, implode('<br>', $errors));

			foreach(GetModuleEvents("main", "OnAfterUserRegister", true) as $arEvent)
				ExecuteModuleEventEx($arEvent, [&$formValues]);

			if($newUserId) LocalRedirect();
			}
		}
	/* ------------------------------------------- */
	/* ---------------- security ----------------- */
	/* ------------------------------------------- */
	if(!CMain::IsHTTPS() && COption::GetOptionString('main', 'use_encrypted_auth', 'N') == 'Y')
		{
		$securityObject = new CRsaSecurity();
		$securityKeys   = $securityObject->LoadKeys();
		if($securityKeys)
			{
			$securityObject->SetKeys($securityKeys);
			$securityObject->AddToForm($formName, [$formInputPrefix.'[PASSWORD]', $formInputPrefix.'[CONFIRM_PASSWORD]']);
			}
		}
	/* ------------------------------------------- */
	/* -------------- output array --------------- */
	/* ------------------------------------------- */
	$arResult["REGISTER"] =
		[
		"FORM_FIELDS"          => $registrationFormFields,
		"FORM_USER_PROPS"      => $registrationFormUserProps,
		"CONFIRM_EMAIL_SENDED" => $_SESSION["NEW_USER_REGISTER_EMAIL_IS_SENT"],
		"RECAPTCHA_SITEKEY"    => $useCaptcha ? GOOGLE_RECAPTCHA_SITEKEY : false,
		"ERRORS"               => $errors,
		"FORM_NAME"            => $formName,
		"SUBMIT_BUTTON_NAME"   => $submitButtonName
		];
	unset($_SESSION["NEW_USER_REGISTER_EMAIL_IS_SENT"]);
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- logined ------------------------------ */
/* -------------------------------------------------------------------- */
if($USER->IsAuthorized())
	{
	$userPhoto = '';
	$usersList = CUser::GetList($by="ID", $order="desc", ["ID" => $USER->GetId()], ["ID", "PERSONAL_PHOTO"]);
	while($userInfo = $usersList->Fetch())
		if($userInfo["PERSONAL_PHOTO"])
			{
			$fileInfo  = CFile::GetByID($userInfo["PERSONAL_PHOTO"])->Fetch();
			$userPhoto = '/upload/'.$fileInfo["SUBDIR"].'/'.$fileInfo["FILE_NAME"];
			}

	$arResult["LOGINED"] =
		[
		"USER_NAME"  => htmlspecialcharsEx($USER->GetFormattedName(false, false)),
		"USER_PHOTO" => $userPhoto
		];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
$this->IncludeComponentTemplate();
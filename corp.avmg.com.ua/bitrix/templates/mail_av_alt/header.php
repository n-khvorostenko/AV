<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$serverName = \Bitrix\Main\Config\Option::get("main", "mail_link_protocol", "https", $arParams["SITE_ID"]).'://'.$arParams["SITE_NAME"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style type="text/css">
        @media only screen and (min-width:768px)
        {
            .av-mail-footer-left-block  {float: left; text-align: left  !important;width: 50%}
            .av-mail-footer-right-block {float: right;text-align: right !important;width: 50%;margin-top: 0 !important}
        }
    </style>
</head>
<body>
<?if(\Bitrix\Main\Loader::includeModule("mail")):?>
<?=\Bitrix\Mail\Message::getQuoteStartMarker(true)?>
<?endif?>
<table style=
               "
			border-collapse: collapse;
			color: #636363;
			font-size: 17px;
			padding: 0;
			margin: 0;
			width: 100%
			"
>
    <tr>
        <td style="background-color: #E7E7E7;padding: 30px 10px;margin: 0">
            <table style="
						background-color: #FFF;
						background-image: url(<?=$serverName?>/bitrix/templates/mail_av/images/bg.png);
						background-position: top right;
						background-repeat: no-repeat;
						border-collapse: collapse;
						box-shadow: 0 0 10px rgba(0,3,0,0.2);
						padding: 0;
						margin: auto;
						max-width: 600px;
						">
                <tr>
                    <th class="tg-yw4l" rowspan="4" style="background-image: url(<?=$serverName?>/bitrix/templates/mail_av_alt/images/fon.jpg); width: 15%;"></th>
                    <td style="padding: 20px;margin: 0">
                        <img src="<?=$serverName?>/bitrix/templates/mail_av_alt/images/AVMetall.png" style="width: 100px;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 0 20px 0;margin: 0">
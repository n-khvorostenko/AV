<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

	$protocol = \Bitrix\Main\Config\Option::get("main", "mail_link_protocol", 'https', $arParams["SITE_ID"]);
	$serverName = $protocol."://".$arParams["SERVER_NAME"];
?>
		<style type="text/css">
			@media only screen and (max-width:480px)
				{
				* [lang=x-outer]{
					width:100% !important;
					}
				.logoWrap {float:inherit;display: block;text-align: -webkit-center;}
				}
		</style>

<table cellpadding="0" cellspacing="0" border="0" align="center" style="
		border-collapse: collapse;
		mso-table-lspace: 0;
		font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
		background-color: #FFF;
		line-height: 1.5;
		border-collapse: collapse;
		box-shadow: 0 0 10px rgba(0,3,0,0.2);
		padding: 0;
		margin: auto;
		max-width: 600px;
		background-color: #f9fbfd;
		">
	<tr>
		<td rowspan="3" style='
			background:url(https://s8.hostingkartinok.com/uploads/images/2017/06/89c93f84930633a9e02d5610c60bd298.jpg) top;
			height: 100%;
			width: 100px;'></td>
		<td valign="top" style="border-collapse: collapse;border-spacing: 0;text-align: left;vertical-align: top;padding: 0 10px;">
			<table cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;mso-table-lspace: 0;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;font-size: 14px;width: 93%;margin: 0 auto;margin-top: 15px;">
				<tr>
					<td align="left" valign="top" style="border-collapse: collapse;border-spacing: 0;padding: 3px 0 8px;text-align: left;">
						<table style="border-collapse: collapse;mso-table-lspace: 0;width: 100%;">

				<tr class="logoWrap" style="display: inline-block;float: left;"> <td><img height="60" width="123"src="https://image.ibb.co/enYhyF/lovo_AVMG.png">
					</td></tr>
							<tr lang="x-outer" style="float: left;width: 70%;text-align: right;min-width: 255px;">

								<td style="border-collapse: collapse;border-spacing: 0;padding: 0;padding-right: 10px;">
									<span style="color: #586777;font-size: 14px;font-weight: bold;vertical-align: top; text-decoration: none;display: inline-block;width: 100%;"><?
									?><?=$arResult["AUTHOR"]["NAME_FORMATTED"]?></span><?
										$i = 0;
										foreach ($arResult["DESTINATIONS"] as $destinationName)
										{
									?><a href="mailto:<?=($destinationName == "#ALL#" ? GetMessage("BLOG_DESTINATION_ALL") : $destinationName)?>"><span style="color: #0064d6;font-size: 14px;vertical-align: top;display: inline-block; width: 100%;text-decoration: underline;"><?=($destinationName == "#ALL#" ? GetMessage("BLOG_DESTINATION_ALL") : $destinationName)?></span></a><?
											$i++;
										}
										?>
								</td>
								<td align="left" valign="middle" style="border-collapse: collapse;border-spacing: 0;padding: 3px 10px 8px 0;text-align: left;"><?
									$src = $arResult["AUTHOR"]["AVATAR_URL"];
									?><img height="65" width="65" src="<?=$src?>" alt="user" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;border-radius: 50%;display: block;">
								</td>
							</tr>
						</table>
					</td>
				</tr><?
				if ($arResult["POST"]["MICRO"] != "Y")
				{
					?><tr>
						<td valign="top" style="border-collapse: collapse;border-spacing: 0;color: #4c5255;font-size: 14px;font-weight: bold;padding: 0 0 14px;vertical-align: top;"><?=$arResult["POST"]["TITLE_FORMATTED"]?></td>
					</tr><?
				}
				?><tr>
					<td valign="top" style="border-collapse: collapse;border-spacing: 0;color: #4c5255;font-size: 14px;vertical-align: top;padding: 0 0 10px;text-align: justify;"><br><?=$arResult["POST"]["DETAIL_TEXT_FORMATTED"]?></td>
				</tr><?
				if (!empty($arResult["POST"]["ATTACHMENTS"]))
				{
					?><br><tr>
						<td valign="top" style="border-collapse: collapse;border-spacing: 0;padding: 0 0 10px;">
							<table cellpadding="0" cellspacing="0" border="0" align="left" style="border-collapse: collapse;mso-table-lspace: 0pt;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;font-size: 13px;float:right;width: 100%;">
								<tr>
									<td stye="border-spacing: 0; padding: 0; text-align: right;">
										<span style="text-align: center;display: block;"><b><?=GetMessage('SBPM_TEMPLATE_FILES')?><br>( Для скачивания файлов авторизуйтесь на<br><a href="<?=($serverName);?>"><?=($serverName);?></a> )</b></span><br>
										<?
										$i = 0;
										foreach($arResult["POST"]["ATTACHMENTS"] as $attachment)
										{
											if ($i > 0)
											{
												?><br/><?
											}
											?><a href='<?=($serverName . "/bitrix/tools/disk/uf.php?attachedId=" . $attachment["ID"] . "&action=download&ncc=1");?>' style="color: #146cc5;display: inline-block;padding: 3px 10px;"><?=$attachment["NAME"]?> (<?=$attachment["SIZE"]?>)   </a><?
											$i++;
										}
										?>
									</td>
								</tr>
							</table>
						</td>
					</tr><?
				}
				?>




				<tr>
					<td align="center" style="border-collapse: collapse;border-spacing: 0;color: #8b959d;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;font-size: 11px;text-align: right;padding: 10px 0 0;">

						<a  href='<?=($serverName . "/company/personal/user/" . $arResult["AUTHOR"]["ID"] . "/blog/" . $arResult["POST"]["ID"] . "/");?>' style="
							padding: 7px 18px;
							margin: 0 9px;
							background-color: red;
							color: #fff;
							text-decoration: none;
							border-radius: 4px;
							"><b>ДОБАВИТЬ КОММЕНТАРИЙ</b></a>

						</td>
					</tr>




				<tr>
					<td align="center" style="border-collapse: collapse;border-spacing: 0;color: #8b959d;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;font-size: 11px;text-align: center;padding: 14px 0 0;"><hr style="
						background-color: red;
						height: 1px;
						width: 100%;
						"></td>
					</tr>
				<tr>
					<td align="center" style="border-collapse: collapse;border-spacing: 0;color: #191919;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;font-size: 13px;float: left;width: 100%;display: flex;justify-content: space-around;">
						<span style="text-align: left;width: 50%;"><br>
						  ООО "АВ металл групп"<br>
						49000, г.Днепропетровск<br>
						  ул. Шалом Алейхемаб 5<br>
						  тел/факс (056) 790 73 00 (01),(02)<br>
						<a target="_blank" href="<?=($serverName);?>" style="color: #191919;"><?=($serverName);?></a>
						<br><br>
						</span>

						<span style="text-align: right;width: 50%;">
							<br>
							<a target="_blank" href="https://www.facebook.com/"><img src="https://cdn0.iconfinder.com/data/icons/social-media-2091/100/social-01-32.png" style="
								margin: 0 5px;
							"></a>
							<a target="_blank" href="https://mail.google.com/"><img src="https://cdn0.iconfinder.com/data/icons/social-media-2091/100/social-03-32.png" style="
								margin: 0 5px;
							"></a>
							<a target="_blank" href="https://twitter.com/"><img src="https://cdn0.iconfinder.com/data/icons/social-media-2091/100/social-02-32.png" style="
								margin: 0 5px;
							"></a><br>
							<span>	
							<b>По всем вопросам обращаться<br> на <a  style="color: #191919;" href="support@avmg.com.ua"> support@avmg.com.ua</a><br></b>
							</span>
						</span><br>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
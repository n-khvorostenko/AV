<?
$OBJ = new av_cargo_traffic();
IncludeModuleLangFile(__FILE__);
$processingErrors = [];
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
if($_REQUEST[$OBJ->MODULE_ID.'_install'])
	{
	$needRedirect = true;

	if($_REQUEST[$OBJ->MODULE_ID.'_create_tables'])
		if(!$OBJ->CreateTables())
			{
			$needRedirect = false;
			$processingErrors[] = GetMessage("AV_CARGO_INSTALL_CREATE_TABLES_ERROR");
			foreach($OBJ->GetCreateTablesErrors() as $error) $processingErrors[] = $error;
			}

	if($needRedirect)
		{
		$_REQUEST["step"] = 2;
		unset($_REQUEST[$OBJ->MODULE_ID.'_install']);
		LocalRedirect($APPLICATION->GetCurPage().'?'.http_build_query($_REQUEST));
		}
	}
/* -------------------------------------------------------------------- */
/* -------------------------------- form ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<form action="<?=$APPLICATION->GetCurPage()?>">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="lang"    value="<?=LANGUAGE_ID?>">
	<input type="hidden" name="id"      value="<?=$OBJ->MODULE_ID?>">
	<input type="hidden" name="install" value="Y">
	<input type="hidden" name="step"    value="1">
	<table class="list-table">
		<?if(count($processingErrors)):?>
		<tr>
			<td>
				<?ShowError(implode('<br>', $processingErrors))?>
			</td>
		</tr>
		<?endif?>
		<tr>
			<td>
				<label for="<?=$OBJ->MODULE_ID?>_create_tables"><?=GetMessage("AV_CARGO_INSTALL_CREATE_TABLES")?></label>:
				<input type="checkbox" value="Y" name="<?=$OBJ->MODULE_ID?>_create_tables" id="<?=$OBJ->MODULE_ID?>_create_tables">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="<?=GetMessage("MOD_INSTALL")?>" name="<?=$OBJ->MODULE_ID?>_install">
			</td>
		</tr>
	</table>
</form>
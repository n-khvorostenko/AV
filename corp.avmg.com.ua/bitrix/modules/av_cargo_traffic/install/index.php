<?
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

Class av_cargo_traffic extends CModule
	{
	public
		$MODULE_ID           = 'av_cargo_traffic',
		$MODULE_VERSION      = '',
		$MODULE_VERSION_DATE = '',
		$MODULE_NAME         = '',
		$MODULE_DESCRIPTION  = '',
		$MODULE_GROUP_RIGHTS = 'Y';

	protected
		$installErrors       = [],
		$uninstallErrors     = [],
		$createTablesErrors  = [],
		$deleteTablesErrors  = [];

	function __construct()
		{
		include __DIR__.'/version.php';
		$this->MODULE_VERSION      = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME         = GetMessage("AV_CARGO_INSTALL_NAME");
		$this->MODULE_DESCRIPTION  = GetMessage("AV_CARGO_INSTALL_DECSR");
		}
	/* -------------------------------------------------------------------- */
	/* ----------------------------- install ------------------------------ */
	/* -------------------------------------------------------------------- */
	function GetInstallErrors()
		{
		if(count($this->installErrors)) return $this->installErrors;
		if(!check_bitrix_sessid())              $this->installErrors[] = GetMessage("AV_CARGO_ERR_SESSION_EXPIRED");
		if(!IsModuleInstalled("iblock"))        $this->installErrors[] = GetMessage("AV_CARGO_ERR_IBLOCK_MODULE_NOT_INSTALLED");
		if(IsModuleInstalled($this->MODULE_ID)) $this->installErrors[] = GetMessage("AV_CARGO_ERR_ALREADY_INSTALLED");
		return $this->installErrors;
		}
	function DoInstall()
		{
		global $APPLICATION, $step;
		$instalFolderPath = $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/'.$this->MODULE_ID.'/install/';

		if(count($this->GetInstallErrors()))
			$APPLICATION->IncludeAdminFile(GetMessage("AV_CARGO_INSTALL_TITLE"), $instalFolderPath.'install_errors.php');
		else
			{
			if($step <= 1)
				$APPLICATION->IncludeAdminFile(GetMessage("AV_CARGO_INSTALL_TITLE"), $instalFolderPath.'install_start.php');
			else
				{
				$this->InstallDB();
				$this->InstallFiles();
				$APPLICATION->IncludeAdminFile(GetMessage("AV_CARGO_INSTALL_TITLE"), $instalFolderPath.'install_finish.php');
				}
			}
		}
	function InstallDB()
		{
		RegisterModule($this->MODULE_ID);
		}
	function InstallFiles()
		{
		CopyDirFiles
			(
			$_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/'.$this->MODULE_ID.'/install/components',
			$_SERVER["DOCUMENT_ROOT"].'/bitrix/components/'.$this->MODULE_ID.'/'
			);
		}
	/* -------------------------------------------------------------------- */
	/* ---------------------------- uninstall ----------------------------- */
	/* -------------------------------------------------------------------- */
	function GetUninstallErrors()
		{
		if(count($this->uninstallErrors)) return $this->uninstallErrors;
		if(!check_bitrix_sessid())               $this->uninstallErrors[] = GetMessage("AV_CARGO_ERR_SESSION_EXPIRED");
		if(!IsModuleInstalled($this->MODULE_ID)) $this->uninstallErrors[] = GetMessage("AV_CARGO_ERR_NOT_INSTALLED");
		return $this->uninstallErrors;
		}
	function DoUninstall()
		{
		global $APPLICATION, $step;
		$instalFolderPath = $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/'.$this->MODULE_ID.'/install/';

		if(count($this->GetUninstallErrors()))
			$APPLICATION->IncludeAdminFile(GetMessage("AV_CARGO_UNINSTALL_TITLE"), $instalFolderPath.'uninstall_errors.php');
		else
			{
			if($step <= 1)
				$APPLICATION->IncludeAdminFile(GetMessage("AV_CARGO_UNINSTALL_TITLE"), $instalFolderPath.'uninstall_start.php');
			else
				{
				$this->UninstallDB();
				$this->UninstallFiles();
				$APPLICATION->IncludeAdminFile(GetMessage("AV_CARGO_UNINSTALL_TITLE"), $instalFolderPath.'uninstall_finish.php');
				}
			}
		}
	function UninstallDB()
		{
		UnRegisterModule($this->MODULE_ID);
		}
	function UninstallFiles()
		{
		$this->removeDirectory($_SERVER["DOCUMENT_ROOT"].'/bitrix/components/'.$this->MODULE_ID.'/');
		}
	function removeDirectory($dirPath)
		{
		if($objArray = glob($dirPath.'/*'))
			foreach($objArray as $obj)
				is_dir($obj) ? removeDirectory($obj) : unlink($obj);
		rmdir($dirPath);
		}
	/* -------------------------------------------------------------------- */
	/* -------------------------- create tables --------------------------- */
	/* -------------------------------------------------------------------- */
	function CreateTables()
		{
		$this->createTablesErrors = [];
		$iblocksArray =
			[
			"drivers"    => ["ID" => 0, "title" => GetMessage("AV_CARGO_TABLES_DRIVERS")],
			"vehicles"   => ["ID" => 0, "title" => GetMessage("AV_CARGO_TABLES_VEHICLES")],
			"storages"   => ["ID" => 0, "title" => GetMessage("AV_CARGO_TABLES_STORAGES")],
			"procedures" => ["ID" => 0, "title" => GetMessage("AV_CARGO_TABLES_PROCEDURES")]
			];
		/* ------------------------------------------- */
		/* -------------- install errors ------------- */
		/* ------------------------------------------- */
		if(count($this->GetInstallErrors()))
			{
			$this->createTablesErrors = $this->GetInstallErrors();
			return false;
			}
		/* ------------------------------------------- */
		/* ------------ create iblock type ----------- */
		/* ------------------------------------------- */
		if(!CIBlockType::GetList([], ["ID" => $this->MODULE_ID])->GetNext())
			{
			$iBlockType     = new CIBlockType;
			$creatingResult = $iBlockType->Add
				([
				"ID"       => $this->MODULE_ID,
				"SECTIONS" => 'Y',
				"SORT"     => 100,
				"LANG"     =>
					[
					"ru" => ["NAME" => $this->MODULE_NAME]
					]
				]);
			if(!$creatingResult)
				{
				$this->createTablesErrors[] = $iBlockType->LAST_ERROR;
				return false;
				}
			}
		/* ------------------------------------------- */
		/* -------------- create iblocks ------------- */
		/* ------------------------------------------- */
		$iblockSort = 0;
		$sitesArray = [];
		$queryList = CSite::GetList();
		while($queryElement = $queryList->Fetch()) $sitesArray[] = $queryElement["ID"];

		foreach($iblocksArray as $code => $arrayInfo)
			{
			$iblockSort += 100;
			$iblock      = new CIBlock;
			$newIblockId = $iblock->Add
				([
				"IBLOCK_TYPE_ID"  => $this->MODULE_ID,
				"SITE_ID"         => $sitesArray,
				"ACTIVE"          => 'Y',

				"INDEX_ELEMENT"   => 'N',
				"INDEX_SECTION"   => 'N',
				"SECTION_CHOOSER" => 'D',
				"VERSION"         => 2,

				"CODE"            => $code,
				"NAME"            => $arrayInfo["title"],
				"SORT"            => $iblockSort,

				"FIELDS"          =>
					[
					"LOG_ELEMENT_ADD"    => ["IS_REQUIRED" => 'Y'],
					"LOG_ELEMENT_EDIT"   => ["IS_REQUIRED" => 'Y'],
					"LOG_ELEMENT_DELETE" => ["IS_REQUIRED" => 'Y']
					]
				]);

			if(!$newIblockId)
				{
				$this->createTablesErrors[] = $iblock->LAST_ERROR;
				return false;
				}
			$iblocksArray[$code]["ID"] = $newIblockId;
			}
		/* ------------------------------------------- */
		/* ------------------ return ----------------- */
		/* ------------------------------------------- */
		return true;
		}

	function GetCreateTablesErrors() {return $this->createTablesErrors;}
	/* -------------------------------------------------------------------- */
	/* -------------------------- delete tables --------------------------- */
	/* -------------------------------------------------------------------- */
	function DeleteTables()
		{
		$this->deleteTablesErrors = [];
		/* ------------------------------------------- */
		/* ------------- uninstall errors ------------ */
		/* ------------------------------------------- */
		if(count($this->GetUninstallErrors()))
			{
			$this->deleteTablesErrors = $this->GetInstallErrors();
			return false;
			}
		/* ------------------------------------------- */
		/* ----------------- deleting ---------------- */
		/* ------------------------------------------- */
		if(CIBlockType::GetList([], ["ID" => $this->MODULE_ID])->GetNext())
			{
			$iBlockType     = new CIBlockType;
			$deletingResult = $iBlockType->Delete($this->MODULE_ID);
			if(!$deletingResult)
				{
				$this->deleteTablesErrors[] = $iBlockType->LAST_ERROR;
				return false;
				}
			}
		/* ------------------------------------------- */
		/* ------------------ return ----------------- */
		/* ------------------------------------------- */
		return true;
		}

	function GetDeleteTablesErrors() {return $this->deleteTablesErrors;}
	}
<?
class AvComponentsIncludings
	{
	protected static
		$instance                = false,
		$currentIncludingsParams = [],
		$includedComponents      = [];
	/* -------------------------------------------------------------------- */
	/* --------------------------- constructor ---------------------------- */
	/* -------------------------------------------------------------------- */
	private function __construct() {}
	private function __clone()     {}
	final public static function getInstance()
		{
		if(!self::$instance) self::$instance = new self();
		return self::$instance;
		}
	/* -------------------------------------------------------------------- */
	/* -------------------------- set includings -------------------------- */
	/* -------------------------------------------------------------------- */
	final public function setIncludings($nameSpace = 'bitrix', $component = '', $template = '.default', $type = 'default')
		{
		if(!$component) return $this;
		if(!$nameSpace) $nameSpace = 'bitrix';
		if(!$template)  $template  = '.default';
		if(!$type)      $type      = 'default';

		$dirPath           = '';
		$loopArrayIndex    = 0;
		$templatePathArray =
			[
			'/local/templates/'.SITE_TEMPLATE_ID .'/components/'.$nameSpace.'/'.$component.'/'.$template,
			'/local/templates/.default/components/'.$nameSpace.'/'.$component.'/'.$template,
			'/local/components/'.$nameSpace.'/'.$component.'/templates/'.$template,
			'/bitrix/templates/'.SITE_TEMPLATE_ID .'/components/'.$nameSpace.'/'.$component.'/'.$template,
			'/bitrix/templates/.default/components/'.$nameSpace.'/'.$component.'/'.$template,
			'/bitrix/components/'.$nameSpace.'/'.$component.'/templates/'.$template,
			];
		while(!$dirPath)
			{
			$dirPath = $templatePathArray[$loopArrayIndex];
			if(file_exists($_SERVER["DOCUMENT_ROOT"].$dirPath)) break;
			$dirPath = '';
			$loopArrayIndex++;
			if(!$templatePathArray[$loopArrayIndex]) break;
			}
		if(!$dirPath || is_set(self::$includedComponents[$dirPath][$type])) return $this;

		self::$includedComponents[$dirPath][$type] = self::$currentIncludingsParams =
			[
			"dir_path"  => $dirPath,
			"namespace" => $nameSpace,
			"component" => $component,
			"template"  => $template,
			"type"      => $type
			];

		include $_SERVER["DOCUMENT_ROOT"].$dirPath.'/component_epilog.php';
		$GLOBALS["APPLICATION"]->SetAdditionalCss($dirPath.'/style.css');
		$GLOBALS["APPLICATION"]->AddHeadScript   ($dirPath.'/script.js');

		return $this;
		}
	/* -------------------------------------------------------------------- */
	/* ------------------- get current includings params ------------------ */
	/* -------------------------------------------------------------------- */
	final public function getCurrentIncludingsParams()
		{
		return self::$currentIncludingsParams;
		}
	}
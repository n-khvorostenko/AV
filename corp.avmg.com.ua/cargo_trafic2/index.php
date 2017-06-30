<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("Title");

$APPLICATION->IncludeComponent
	(
	"bitrix:lists",	"",
		array(
		"CACHE_TIME"        => 3600,
		"CACHE_TYPE"        => 'A',
		"IBLOCK_TYPE_ID"    => 'av_cargo_trafic_light',
		"SEF_FOLDER"        => '/cargo_trafic2/',
		"SEF_MODE"          => 'Y',
		"SEF_URL_TEMPLATES" =>
			array(
			"bizproc_log"                => '#list_id#/bp_log/#document_state_id#/',
			"bizproc_task"               => '#list_id#/bp_task/#section_id#/#element_id#/#task_id#/',
			"bizproc_workflow_admin"     => '#list_id#/bp_list/',
			"bizproc_workflow_constants" => '#list_id#/bp_constants/#ID#/',
			"bizproc_workflow_edit"      => '#list_id#/bp_edit/#ID#/',
			"bizproc_workflow_start"     => '#list_id#/bp_start/#element_id#/',
			"bizproc_workflow_vars"      => '#list_id#/bp_vars/#ID#/',
			"catalog_processes"          => 'catalog_processes/',
			"list"                       => '#list_id#/view/#section_id#/',
			"list_edit"                  => '#list_id#/edit/',
			"list_element_edit"          => '#list_id#/element/#section_id#/#element_id#/',
			"list_export_excel"          => '#list_id#/excel/',
			"list_field_edit"            => '#list_id#/field/#field_id#/',
			"list_fields"                => '#list_id#/fields/',
			"list_file"                  => '#list_id#/file/#section_id#/#element_id#/#field_id#/#file_id#/',
			"list_sections"              => '#list_id#/edit/#section_id#/'
			)
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';
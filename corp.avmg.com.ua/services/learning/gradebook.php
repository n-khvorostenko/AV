<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->IncludeComponent
	(
	"bitrix:learning.student.gradebook", "av_corp",
		array(
		"TEST_ID_VARIABLE"       => 'TEST_ID',
		"TEST_DETAIL_TEMPLATE"   => 'course.php?COURSE_ID=#COURSE_ID#&TEST_ID=#TEST_ID#',
		"COURSE_DETAIL_TEMPLATE" => 'course.php?COURSE_ID=#COURSE_ID#&INDEX=Y',
		"SET_TITLE"              => 'Y'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';
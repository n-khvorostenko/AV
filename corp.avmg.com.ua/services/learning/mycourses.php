<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->IncludeComponent
	(
	"bitrix:learning.student.certificates", "av_corp",
		array(
		"COURSE_DETAIL_TEMPLATE" => 'course.php?COURSE_ID=#COURSE_ID#&INDEX=Y',
		"TESTS_LIST_TEMPLATE"    => 'course.php?COURSE_ID=#COURSE_ID#&TEST_LIST=Y',
		"SET_TITLE"              => 'Y'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';
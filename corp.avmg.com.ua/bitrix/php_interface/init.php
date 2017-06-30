<?
define("CURRENT_PROTOCOL",           $_SERVER["HTTPS"] && $_SERVER["HTTPS"] != 'off' ? 'https' : 'http');
define("GOOGLE_API_KEY",             'AIzaSyCXU07xpgmsJ0a81KynqDChZyEZzYao8i0');
define("GOOGLE_RECAPTCHA_SITEKEY",   '6LdWqCkTAAAAABTDuDaNXUub1rFqK-o0aSPjK5_W');
define("GOOGLE_RECAPTCHA_SECRETKEY", '6LdWqCkTAAAAAM_AshmUWM-yG1IWAicM8oAgmK6-');

include 'js_libaries_registration.php';
include 'av_components_includings.php';
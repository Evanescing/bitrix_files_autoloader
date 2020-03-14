<?
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/CustomInit.php'))
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/CustomInit.php');
	
$obInit = new CustomInit();
$obInit->addFolder('app');
$obInit->addFolder('handlers');
$obInit->Init();

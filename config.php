<?php

/** Caminho absoluto para o diretório. */
	define('ABSPATH', dirname(__FILE__).'/');
	define('APP', dirname(__FILE__) . '/app/');
	define('CONTENT', 'content/');
	define('VIEW', dirname(__FILE__).'/views/');
	define('CLASSES', dirname(__FILE__) . '/classes/');
/** Configura as funções e arquivos inclusos. */


//require_once(CLASSES . 'UserManager.php');
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'acerola';
    $db_name = 'carteirinha';
	
	GLOBAL $connection;

	$connection = new mysqli();
	$connection->connect($db_host,$db_user,$db_pass,$db_name);
	$connection->set_charset("utf8");
	 
 if(isset($_COOKIE['ID_my_site']))  { 
						$username = $_COOKIE['ID_my_site']; 
						$pass = $_COOKIE['Key_my_site']; 
						} else {
						$username = ''; 
						$pass = ''; 
						}
						
	include APP .'function.php';
	

 		
?>

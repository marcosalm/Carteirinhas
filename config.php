<?php

/** Caminho absoluto para o diretório. */
	define('ABSPATH', dirname(__FILE__).'/');
	define('APP', dirname(__FILE__) . '/app/');
	define('CONTENT', 'content/');
	define('VIEW', dirname(__FILE__).'/views/');
	define('CLASSES', dirname(__FILE__) . '/classes/');
/** Configura as funções e arquivos inclusos. */


require_once(CLASSES . 'database.php');

require_once(APP . 'function.php');

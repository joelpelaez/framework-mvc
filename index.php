<?php

require __DIR__ . '/vendor/autoload.php';

/**
 * / linux
 * \ windows
 */

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__)) . DS);
define("APP_PATH", ROOT . "Core" . DS);


define("DEFAULT_CONTROLLER", "tareas");
define("DEFAULT_LAYOUT", "default");

define("APP_URL", str_replace("\\",'/',"http://".$_SERVER['HTTP_HOST'].substr(getcwd(),strlen($_SERVER['DOCUMENT_ROOT'])).'/'));

define("APP_URL_CSS", APP_URL."public/css/");
define("APP_URL_IMG", APP_URL."public/img/");
define("APP_URL_JS",  APP_URL."public/js/");

define("APP_NAME", "Framework");

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "gestion");
define("DB_CHAR", "UTF8");


//Comprobar que los archivos se estan cargando correctamente
//echo "<pre>";print_r(get_required_files());

if (!session_id()) {
    session_start();
}

try{
    \App\Core\Bootstrap::run(new \App\Core\Request);
}catch(Throwable $e) {
    $error = new \App\Core\AppError();
    $error->code = $e->getCode();
    $error->name = $e->getMessage();
    $error->file = $e->getFile();
    $error->line = $e->getLine();
    include_once(ROOT."views".DS."layouts".DS.DEFAULT_LAYOUT.DS."root_error.php");
}

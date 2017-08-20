<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));//Diretório raiz do projeto
define('VIEW_PATH',ROOT . DS.'views');
use Lib\App;

require_once ROOT.DS.'lib'.DS.'init.php';
session_start();

Try{
App::run();
}catch(Exception $ex){
    echo "Erro Inesperado: {$ex->getMessage()}";
}
\Lib\DB::close();
//$db= App::getDb();
//$con =$db->getConnection();
//$res=$con->query("SELECT * FROM produto");
//while($row = $res->fetch_assoc()){
//    var_dump($row);
//}
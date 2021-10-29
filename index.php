<?php
session_start();
mb_internal_encoding("UTF-8");

function autoloaderfunction($class) {
    if (preg_match('/Controler$/', $class))
        require("Controlery/" . $class . ".php");
    else
        require("Models/" . $class . ".php");
        
}

spl_autoload_register("autoloaderfunction");

Db::linkdb("127.0.0.1", "root", "", "f150817");

$router = new RouterControler();
$router->process(array($_SERVER['REQUEST_URI']));

$router->showwiew();
<?php
use Lib\Config;
Config::set('site_nome','Mercado');
Config::set('base_uri','/Mercado/');
Config::set('languages',['pt_br','en']);
Config::set('routes',[
    'default'=>'',
    'admin'=>'admin_'    
]);
Config::set('default_route', 'default');
Config::set('default_language', 'pt_br');
Config::set('default_controller', 'produto');
Config::set('default_action','index');
//Banco de dados
Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password','iero1201');
Config::set('db.nome', 'mercado');
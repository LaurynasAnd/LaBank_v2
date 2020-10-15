<?php

session_start();
_log($_SERVER['SCRIPT_NAME']);
$path = preg_replace('/index\.php/','',$_SERVER['SCRIPT_NAME']);
_log($path);
$server = $_SERVER['SERVER_NAME'];
define('URL', 'http://'.$server.$path);
_log(URL);
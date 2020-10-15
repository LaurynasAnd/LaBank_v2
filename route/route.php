<?php

$route = ('/' != $path )
    ? str_replace($path, '', $_SERVER['REQUEST_URI']) 
    : $_SERVER['REQUEST_URI'];
$route = explode('/', $route);
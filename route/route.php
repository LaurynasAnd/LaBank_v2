<?php
use Control\Controllers\AccountController;
require DIR . '/vendor/autoload.php';
$route = ('/' != $path )
    ? str_replace($path, '', $_SERVER['REQUEST_URI']) 
    : substr($_SERVER['REQUEST_URI'],1);

$route = explode('/', $route);

if('account' == $route[0] && 1 < count($route)){ //if request is for account changes
    $ctrl = new AccountController;
    if('create' == $route[1]){
        $ctrl->create();
    }
    elseif('save' == $route[1]){
        $ctrl->save();
    }
    elseif('edit' == $route[1]){
        $ctrl->edit();
    }
    elseif('update' == $route[1]){
        $ctrl->update();
    }
    elseif('delete' == $route[1]){
        $ctrl->delete();
    }
    elseif('index' == $route[1]){
        $ctrl->index();
    } else {
        echo 'No such method in Account';
    }
} elseif('' == $route[0] && 1 == count($route)) {
    require DIR . '/views/login.php';
} else {
    echo 'Too BAD muhaha';
}
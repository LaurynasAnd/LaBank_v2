<?php
namespace Control\Controllers;

class AccountController{
    public function create(){
        $iban['nextIBAN'] = 'LT200000202010010011';
        $answers = [
            'wrongName' => '',
            'wrongSurname' => '',
            'badID' => '',
            'pswMissmatch' => '',
            'noSignup' => ''
        ];
        require DIR . '/views/create.php';
    }
    public function save($userID){
        echo 'Hello, this is SAVE';
    }
    public function edit(){
        $user = [
            'surname' => 'Jonaitis',
            'name' => 'Jonas',
            'iban' => 'LT200000202010010011',
            'balance' => 123456
        ];
        require DIR . '/views/edit.php';
    }
    public function update(){
        echo 'Hello, this is UPDATE';
    }
    public function delete(){
        echo 'Hello, this is DELETE';
    }
    public function index(){
        $user = [
            'surname' => 'Jonaitis',
            'name' => 'Jonas',
            'iban' => 'LT200000202010010011',
            'balance' => 123456
        ];
        require DIR . '/views/user.php';
    }
    public function login(){
        echo 'Hello, this is LOGIN';
    }
}
<?php

$db = db();

use myfrm\Validator;

$fillable = ['name', 'email', 'password'];
$data = load($fillable);

//validation
$validator = new Validator();
$validation = $validator->validate($data,
    [
        'name' => [
            'required' => true,
            'min' => 3,
            'max' => 100,
        ],
        'email' => [
            'email' => true,
            'unique' => 'users:email',
            'max' => 100,
        ],
        'password' => [
            'required' => true,
            'min' => 6,
        ],
    ]
);

if ( !$validation->hasErrors() ) {
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    if ( $db->query('INSERT INTO users (name, email, password) VALUE (:name, :email, :password)', $data) ) {
        $_SESSION['success'] = 'OK. Вы зарегистрированны.';
    } else {
        $_SESSION['error'] = 'DB Error';
    }
    redirect('/register');
} else {
    $errors = $validation->getErrors();
    $title = 'My Blog :: Register';
    require VIEWS . '/users/register.tpl.php';
}

<?php

use myfrm\Validator;

$title = 'My Blog :: Login';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = db();

    $fillable = ['email', 'password'];
    $data = load($fillable);

    //validation
    $validator = new Validator();
    $validation = $validator->validate($data,
        [
            'email' => [
                'required' => true,
                'email' => true,
            ],
            'password' => [
                'required' => true,
            ],
        ]
    );

    if ( !$validation->hasErrors() ) {

        if ( !$user = $db->query('SELECT * FROM users WHERE email = ?', [$data['email']])->find() ) {
            $_SESSION['error'] = 'Email или Password не верные';
            redirect();
        }

        if ( !password_verify($data['password'], $user['password']) ) {
            $_SESSION['error'] = 'Email или Password не верные';
            redirect();
        }
        
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
        ];
        $_SESSION['success'] = 'OK. Вы вошли в систему';
        redirect(PATH);
    } else {
        $errors = $validation->getErrors();
        $title = 'My Blog :: Login';
        require VIEWS . '/users/login.tpl.php';
    }
}

require_once VIEWS . '/users/login.tpl.php';
<?php

// require_once CORE . '/classes/validator.php';
use myfrm\Validator;

/**
 * @var \myfrm\Db $db
 * @var \myfrm\Validator $validator
 */

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $fillable = ['title', 'excerpt', 'content'];
    $data = load($fillable);
    
    //validation
    $validator = new Validator();
    $validation = $validator->validate($data,
        [
            'title' => [
                'required' => true,
                'min' => 5,
                'max' => 190,
            ],
            'excerpt' => [
                'required' => true,
                'min' => 10,
                'max' => 190,
            ],
            'content' => [
                'required' => true,
                'min' => 10,
            ],
            'email' => [
                'email' => true,
            ],
        ]
    );

    if ( !$validation->hasErrors() ) {
        if ( $db->query('INSERT INTO posts (title, excerpt, content) VALUE (:title, :excerpt, :content)', $data) ) {
            $_SESSION['success'] = 'OK. Запись успешно добавлена в БД.';
        } else {
            $_SESSION['error'] = 'DB Error';
        }
        // redirect('/post/create');
        redirect();
    } else {
        $errors = $validation->getErrors();
    }
}

$title = 'New Post';

require_once VIEWS . '/post-create.tpl.php';
<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $fillable = ['title', 'excerpt', 'content'];
    $data = load($fillable);
    
    //validation
    $errors = [];
    if (empty($data['title'])) {
        $errors['title'] = 'Поле title обязательно для заполнения';
    }
    if (empty($data['excerpt'])) {
        $errors['excerpt'] = 'Поле excerpt обязательно для заполнения';
    }
    if (empty($data['content'])) {
        $errors['content'] = 'Поле content обязательно для заполнения';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO posts (title, excerpt, content) VALUE (:title, :excerpt, :content)', $data);
    }
    
}

$title = 'New Post';

require_once VIEWS . '/post-create.tpl.php';
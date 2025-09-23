<?php

use myfrm\App;
use myfrm\Db;

$db = App::get(Db::class);

$title = 'My Blog :: Home';

$posts = $db->query('SELECT * FROM posts ORDER BY id DESC')->findAll();

$recent_posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 3')->findAll();

require_once VIEWS . '/posts/index.tpl.php';
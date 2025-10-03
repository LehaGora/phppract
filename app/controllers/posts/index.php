<?php

use myfrm\App;
use myfrm\Db;

$db = App::get(Db::class);

$title = 'My Blog :: Home';


$page = $_GET['page'] ?? 1;
$per_page = 1;
$total = $db->query('SELECT * FROM posts')->rowCount();
$pagination = new \myfrm\Pagination((int)$page, $per_page, $total);
$start = $pagination->getStart();

$posts = $db->query("SELECT * FROM posts LIMIT $start, $per_page")->findAll();

$recent_posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 3')->findAll();

require_once VIEWS . '/posts/index.tpl.php';
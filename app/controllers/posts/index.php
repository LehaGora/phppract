<?php

use myfrm\App;
use myfrm\Db;

$db = App::get(Db::class);

$title = 'My Blog :: Home';


$page = $_GET['page'] ?? 1;
$per_page = 2;
$total = $db->query('SELECT * FROM posts')->rowCount();
$pagination = new \myfrm\Pagination((int)$page, $per_page, $total);
print_arr($pagination);

$start = $pagination->getStart();
var_dump($start);


die;

$per_page = 3;

$total = $db->query('SELECT * FROM posts')->rowCount();

$pages_cnt = ceil($total / $per_page);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($page < 1) {
    $page = 1;
}

if ($page > $pages_cnt) {
    $page = $pages_cnt;
}

$start = ($page - 1) * $per_page;

$posts = $db->query("SELECT * FROM posts LIMIT $start, $per_page")->findAll();


$recent_posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 3')->findAll();

require_once VIEWS . '/posts/index.tpl.php';
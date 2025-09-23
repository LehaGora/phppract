<?php

$db = db();

$id = (int)$_GET['id'] ?? 0;

$post = $db->query('SELECT * FROM posts WHERE id = ?', [$id])->findOrFail();

$title = 'My Blog :: ' . $post['title'];

require_once VIEWS . '/posts/show.tpl.php';
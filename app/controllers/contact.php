<?php

global $db;

$title = 'My Blog :: Contact';

$post = '
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi soluta, culpa unde dolores enim ratione vitae totam aliquid? Odio rerum magni tenetur tempore molestiae maiores voluptatem impedit cumque iste assumenda!</p>
';

$recent_posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 3')->findAll();

require_once VIEWS . '/about.tpl.php';
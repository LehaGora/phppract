<?php

$db = db();

$title = 'My Blog :: About';

$post = '
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi soluta, culpa unde dolores enim ratione vitae totam aliquid? Odio rerum magni tenetur tempore molestiae maiores voluptatem impedit cumque iste assumenda!</p>
    <p>Non a laudantium nesciunt laboriosam, aliquam eos unde vel. Voluptate beatae culpa cupiditate provident itaque nulla! At, ut, sapiente atque excepturi voluptatibus recusandae quae tempore, sunt ratione aperiam voluptas dolor.</p>
    <p>Soluta officia error delectus eius veniam reprehenderit voluptatum fugit illo quo? Culpa incidunt iure magni ratione, minima esse unde inventore sint enim, reiciendis fugit animi quia asperiores debitis, dignissimos non?</p>
';

$recent_posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 3')->findAll();

require_once VIEWS . '/about.tpl.php';
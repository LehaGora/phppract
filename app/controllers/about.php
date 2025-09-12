<?php

$title = 'My Blog :: About';

$post = '
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi soluta, culpa unde dolores enim ratione vitae totam aliquid? Odio rerum magni tenetur tempore molestiae maiores voluptatem impedit cumque iste assumenda!</p>
    <p>Non a laudantium nesciunt laboriosam, aliquam eos unde vel. Voluptate beatae culpa cupiditate provident itaque nulla! At, ut, sapiente atque excepturi voluptatibus recusandae quae tempore, sunt ratione aperiam voluptas dolor.</p>
    <p>Soluta officia error delectus eius veniam reprehenderit voluptatum fugit illo quo? Culpa incidunt iure magni ratione, minima esse unde inventore sint enim, reiciendis fugit animi quia asperiores debitis, dignissimos non?</p>
';

$recent_posts = [
    1 => [
        'title' => 'An item',
        'slug' => lcfirst(str_replace(' ', '-', 'An item')),
    ],
    2 => [
        'title' => 'A second item',
        'slug' => lcfirst(str_replace(' ', '-', 'A second item')),
    ],
    3 => [
        'title' => 'A third item',
        'slug' => lcfirst(str_replace(' ', '-', 'A third item')),
    ],
    4 => [
        'title' => 'A fourth item',
        'slug' => lcfirst(str_replace(' ', '-', 'A fourth item')),
    ],
    5 => [
        'title' => 'And a fifth one',
        'slug' => lcfirst(str_replace(' ', '-', 'And a fifth one')),
    ],
];

require_once VIEWS . '/about.tpl.php';
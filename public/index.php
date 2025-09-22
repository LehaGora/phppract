<?php

use myfrm\Db;
use myfrm\Router;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

require dirname(__DIR__) . '/config/config.php';

require CORE . '/funcs.php';

// Db
$db_config = require CONFIG . '/db.php';
$db = (Db::getInstance())->getConnection($db_config);

// Router
$router = new Router();
require CONFIG . '/routes.php';
$router->match();
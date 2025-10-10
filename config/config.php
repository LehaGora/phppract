<?php

define("ROOT", dirname(__DIR__));

define("WWW", ROOT . '/public');
define("UPLOADS", WWW . '/uploads');
define("CORE", ROOT . '/vendor/myfrm/core');
define("CONFIG", ROOT . '/config');
define("APP", ROOT . '/app');

define("CONTROLLERS", APP . '/controllers');
define("VIEWS", APP . '/views');

define("PATH", 'https://phppract.local');
define("LOGIN_PAGE", PATH . '/login');

define("ERRORS_LOG_FILE", ROOT . '/errors.log');
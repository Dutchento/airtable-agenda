<?php

declare(strict_types=1);

ini_set('display_errors', (string)getenv('DEBUG'));

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__ . '/../');
$dotenv->load();

$app = new Slim\App([
    'debug' => (bool)getenv('DEBUG')
]);

require __DIR__ . '/routes.php';
require __DIR__ . '/di.php';

$app->run();

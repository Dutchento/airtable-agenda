<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\Http\Environment;
use Slim\Http\Uri;
use \Slim\Views\Twig;
use Slim\Views\TwigExtension;

$container = $app->getContainer();

// Register component on container
$container['view'] = function (ContainerInterface $container) {
    $view = new Twig(__DIR__ . '/../views/', [
        'cache' => (getenv('TWIG_CACHE') === 0) ? false : __DIR__ . '/../cache/views/',
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = Uri::createFromEnvironment(new Environment($_SERVER));
    $view->addExtension(new TwigExtension($router, $uri));

    return $view;
};

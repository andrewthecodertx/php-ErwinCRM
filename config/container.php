<?php

use Slim\App;
use Slim\Factory\AppFactory;
use Psr\Container\ContainerInterface;

return [
  'settings' => [
    'determineRouteBeforeAppMiddleware' => false,
    'displayErrorDetails' => true,
    'logger' => [
      'name' => 'erwincrm',
      'level' => Monolog\Logger::DEBUG,
      'path' => '../var/logs/app.log'
    ],
    'db' => [
      'driver' => 'mysql',
      'host' => 'db',
      'database' => 'erwincrm',
      'username' => 'crmdbuser',
      'password' => 'password',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ]
  ],
  App::class => function (ContainerInterface $container) {
    $app = AppFactory::createFromContainer($container);

    (require __DIR__ . '/dependencies.php')($app);
    (require __DIR__ . '/middleware.php')($app);
    (require __DIR__ . '/routes.php')($app);

    return $app;
  }
];

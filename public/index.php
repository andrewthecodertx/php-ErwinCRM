<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Slim\App;

require __DIR__ . '/../vendor/autoload.php';

// uncomment and add to container in production
// $container->enableCompilation(__DIR__ . '/../var/cache');

$container = (new ContainerBuilder())
  ->addDefinitions(__DIR__ . '/../config/container.php')
  ->build()
  ->get(App::class)
  ->run();

<?php

declare(strict_types=1);

use Slim\App;
use Illuminate\Database\Capsule\Manager as Capsule;

return function (App $app) {
  $container = $app->getContainer();
  $settings = $container->get('settings')['db'];

  $capsule = new Capsule;
  $capsule->addConnection($settings);
  $capsule->setAsGlobal();
  $capsule->bootEloquent();
};

<?php

declare(strict_types=1);

use ErwinCRM\Controllers;
use Framework\View;
use Slim\App;

return function (App $app) {
  // render a view directly... passing in some data!
  $app->get('/', function () {
    $view = new View('index', ['id' => 1, 'name' => 'some name']);
    return $view->render();
  });

  // call a controller
  $app->get('/customers', Controllers\CustomerController::class . ':index');
};

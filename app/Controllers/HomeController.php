<?php

declare(strict_types=1);

namespace ErwinCRM\Controllers;

use Framework\View;
use Framework\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends Controller
{
  public function test(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
  {
    $response->getBody()->write('this is something else');
    return $response;
  }

  public function testpage(): ResponseInterface
  {
    $view = new View('something');
    return $view->render();
  }
}

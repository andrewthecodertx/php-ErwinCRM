<?php

declare(strict_types=1);

namespace Framework;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class Controller
{
  public function __construct()
  {
  }
}

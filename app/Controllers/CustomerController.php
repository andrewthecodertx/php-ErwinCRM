<?php

declare(strict_types=1);

namespace ErwinCRM\Controllers;

use ErwinCRM\Models\Customer;
use Framework\View;
use Framework\Controller;
use Psr\Http\Message\ResponseInterface;

class CustomerController extends Controller
{
  public function index(): ResponseInterface
  {
    $customers = Customer::all();

    $view = new View('customers/index', ['customers' => $customers]);
    return $view->render();
  }
}

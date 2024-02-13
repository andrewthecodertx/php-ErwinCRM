<?php

declare(strict_types=1);

namespace Framework;

use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Response;

class View
{
  public function __construct(
    protected string $template,
    protected array $data = []
  ) {
  }

  public function render(): ResponseInterface
  {
    extract($this->data);

    ob_start();
    include(__DIR__ . "/../app/Views/$this->template.phtml");
    $viewContent = ob_get_clean();

    if (isset($layout) && file_exists("../app/Views/layouts/$layout.phtml")) {
      ob_start();
      include("../app/Views/layouts/$layout.phtml");
      $layoutContent = ob_get_contents();
      ob_end_clean();

      $output = str_replace(
        '{{ content }}',
        $viewContent,
        $layoutContent
      );
    } else {
      $output = $viewContent;
    };

    $response = new Response();
    $response->getBody()->write($output);
    $response = $response->withHeader('Content-Type', 'text/html');

    return $response;
  }
}

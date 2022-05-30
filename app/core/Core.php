<?php
namespace App\Core;

use App\Controllers\Pages;

/**
 * Application core class
 */
class Core
{

    public Router $router;
    protected Request $request;

    public function __construct() {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }
}

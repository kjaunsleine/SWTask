<?php

namespace App\Core;

/**
 * Router class
 * 
 * __construct() - after initializaton $request property is set as Request object
 * __call($name, $args) - new method is made, $name is name of the function and same as one of the request methods (get, post)
 *                      $args - endpoint, methdod what is displayed
 *                      If request method is not in supportedHtppMethods array, invalidMethodHandler() is called
 *                      If it is in the array, array is made as property which is named as the request method and contains a route and respective callback
 * Examples below
 * 
 *          $router->get('/', function(){
 *             return <<<HTML
 *            <h1>Hello world</h1>
 *            HTML;
 *          });
 * 
 *          $router->get('/profile', function($request){
 *              return <<<HTML
 *              <h1>Profile</h1>
 *              HTML;
 *          });
 * 
 *          $router->post('/data', function($request){
 *           return json_encode($request->getBody());
 *          });
 * 
 * formatRoute() - removes trailing backslashes and returns backslash if route is and empty string
 * invalidMethodHandler() - returns header with 405 code
 * defaultRequestHandler() - returns header with 404 code
 * resolve() - gets request method
 *             gets formatted URI
 *             gets method from route=>method array
 *             returns saved method and request data as an array
 * __destruct() - 
 */
class Router
{
    protected Request $request;
    protected $supportedHttpMethods = ['GET', 'POST'];

    public function __construct(IRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns Request object
     * 
     * @return object
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Automatically creates method for corresponding route
     * $name parameter is the name of the method, $args - route (string) and method attached to entered route
     * $args are saved in $route and $method variables.
     * Checks if the $name is in supportedHttpMethods array
     * If it is supported, the route and the respective method are saved in an array named after the request method
     * 
     * @param string $name
     * @param mixed $args
     * 
     * @return void
     */
    public function __call($name, $args)
    {
        list($route, $method) = $args;

        if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
            $this->invalidMethodHandler();
        }

        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    /**
     * Removes trailing forward slashes from the right of the route.
     * @param route (string)
     */

    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '') {
            return '/';
        }

        return $result;
    }

    private function invalidMethodHandler()
    {
    header("{$this->request->serverProtocol} 405 Method Not Allowed");
    }

    private function defaultRequestHandler()
    {
    header("{$this->request->serverProtocol} 404 Not Found");
    }

   /**
   * Resolves a route
   * 
   * Gets the array named after request method
   * Gets requestUri and finds corresponding method
   * If there is no method, defaultRequestHandler() is called
   * If there is method, call_user_func_array is echoed with the method and request array
   * 
   */

    public function resolve()
    {
        $methodDictionary = $this->{strtolower($this->request->requestMethod)}; // get
        $formatedRoute = $this->formatRoute($this->request->requestUri); // /
        $method = $methodDictionary[$formatedRoute]; // get['/']

        if (is_null($method)) {
            $this->defaultRequestHandler();
            return;
        }

        echo call_user_func_array($method, array($this->request));
    }

    public function __destruct()
    {
        $this->resolve();
    }
}


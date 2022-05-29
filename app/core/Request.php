<?php
namespace App\Core;

/**
 * Request class
 * 
 * __construct() - initializing the class bootstrapSelf() method is called
 * boostrapSelf() - gets $_SERVER array and creates property->value pairs from this array (for example, $this->requestMethod = 'get')
 * toCamelCase() - transforms snake_case to camelCase
 * getBody() - checks if $this->requestMethod is 'GET' or 'POST'; if 'GET', do nothing; if 'POST', return array containing entered sanitized data from form
 */
class Request implements IRequest
{
    public function __construct() {
        $this->bootstrapSelf();
    }

    /**
     * Gets $_SERVER array and creates property->value pairs from this array with property name transformed to camelCase
     * (for example, $this->requestMethod = 'get')
     * 
     * @return void
     */
    private function bootstrapSelf()
    {
        foreach ($_SERVER as $key => $value) {
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    /**
     * Changes string from snake_case to camelCase
     * 
     * @param string $string
     * 
     * @return string
     */
    private function toCamelCase($string)
    {
        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);

        foreach ($matches[0] as $match) {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }

        return $result;
    }

    /**
     * Returns data depending on request method
     * 
     * If request method is GET, null is returned.
     * If request method is POST, the POST data is sanitized and put back in array and returned back
     * 
     * @return mixed
     */
    public function getBody()
    {
        if ($this->requestMethod === 'GET') {
            return;
        }

        if ($this->requestMethod === 'POST') {
            
            $body = [];
            foreach ($_POST as $key => $value) {
                if (is_array($value)) {
                    //$body = $value;
                    foreach ($value as $innerKey => $innerValue) {
                        $body[$innerKey] = filter_var($innerValue, FILTER_SANITIZE_SPECIAL_CHARS);
                    }   
                } else {
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
                
            }
            
            return $body;
        }
    }
}

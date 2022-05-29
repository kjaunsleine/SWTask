<?php

namespace App\Core;

/**
 * Request interface
 * 
 * Implementation has to contain method getBody();
 */
interface IRequest
{
    public function getBody();
}

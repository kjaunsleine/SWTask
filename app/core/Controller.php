<?php
namespace App\Core;

use App\Models\Product;

/**
 * Base controller
 */
class Controller
{
    /**
     * Includes view file
     * 
     * @param string $view
     * @param array $data
     * 
     * @return void
     */
    public function view($view, $data = [])
    {
        if (file_exists(APPROOT . '/views/' . $view . '.php')) {
            include_once APPROOT . '/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }

    /**
     * Creates model object
     * 
     * @param string $model
     * 
     * @return object
     */
    public function model($model)
    {
        $model = 'App\\Models\\' . $model;
        return new $model();
    }
}
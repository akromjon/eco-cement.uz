<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected object $data;
    public function __construct()
    {
        $this->data = new class
        {
            public string $page_name;
            public object $data;
        };
    }
}

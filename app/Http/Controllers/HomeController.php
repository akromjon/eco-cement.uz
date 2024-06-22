<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(): View|Factory
    {
        $this->data->page_name = "Bosh Sahifa";

        return view("pages.home.index", ['data' => $this->data]);
    }
}

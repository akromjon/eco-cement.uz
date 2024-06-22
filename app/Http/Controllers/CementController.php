<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CementController extends Controller
{
    public function create()
    {

        $this->data->page_name = "Sementlar";

        return view("pages.cements.create", ["data" => $this->data]);
    }
}

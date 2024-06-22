<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function list(): View|Factory
    {

        $this->data->page_name = "Mijozlar";

        return view("pages.clients.list", ["data" => $this->data]);
    }

    public function create(): View|Factory
    {
        $this->data->page_name = "Mijozlar";

        return view("pages.clients.create", ["data" => $this->data]);
    }
}

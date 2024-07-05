<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        $this->data->page_name = "Zakazlar";

        return view('pages.order.list', ['data' => $this->data]);
    }

    public function show($id)
    {
        $this->data->page_name = "Zakazlar";

        $this->data->client=Client::find($id);

        return view('pages.order.show', ['data' => $this->data]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function list()
    {
        $this->data->page_name = "Zakazlar";

        return view('pages.transaction.list', ['data' => $this->data]);
    }

    public function show($id)
    {
        $this->data->page_name = "Zakazlar";

        $this->data->client_id=$id;

        return view('pages.transaction.show', ['data' => $this->data]);
    }
}

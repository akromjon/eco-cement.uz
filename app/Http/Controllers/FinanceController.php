<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function list()
    {
        $this->data->page_name = "Finans";

        return view("pages.finance.list", ["data" => $this->data]);
    }
}

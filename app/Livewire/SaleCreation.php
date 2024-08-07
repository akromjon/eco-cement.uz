<?php

namespace App\Livewire;

use App\Models\Cement;
use App\Models\Client;
use App\Models\Sale;
use App\Models\Transaction;
use Livewire\Component;

class SaleCreation extends Component
{
    public int $client_id;
    public int $cement_id;
    public string $given_date;
    public string $car_number;
    public float $get_amount;
    public int $kg;
    public float $sell_amount;
    public string $date_of_return;
    public Sale $sale;
    protected function rules(): array
    {
        return [
            'client_id' => 'required',
            'cement_id' => 'required',
            'given_date' => 'date|required',
            'car_number' => 'required|string|max:15',
            'get_amount' => 'required|int|min:1',
            'kg' => 'int|min:1',
            'sell_amount' => 'required|int|min:1',
            'date_of_return' => 'date|required'
        ];
    }

    public function render()
    {
        $data = [];

        $data['clients'] = Client::orderBy('id', 'desc')->get();

        $data['cements'] = Cement::orderBy('id', 'desc')->get();

        $data['sales'] = Sale::orderBy('id', 'desc')->with('client', 'cement')->get();

        return view('livewire.sale-creation', ['data' => $data]);
    }

    public function save()
    {
        $this->validate();

        $data = $this->except('sale');

        $sale = Sale::create($data);

        $data['sale_id'] = $sale->id;

        Transaction::pay($data);

        return $this->redirect(route("sales.list"));
    }

    public function delete(string $sale_id)
    {
        $sale = Sale::find($sale_id);

        $transactions = $sale->transactions;

        foreach ($transactions as $transaction) {
            $transaction->delete();
        }

        $sale->delete();

        return $this->redirect(route("sales.list"));
    }

    public function select(string $sale_id)
    {
        $sale = Sale::find($sale_id);

        if ($sale) {

            $this->sale = $sale;

            foreach (['kg', 'client_id', 'cement_id', 'car_number', 'get_amount', 'sell_amount'] as $property) {
                $this->$property = $sale->$property;
            }

            $this->given_date = $sale->given_date->format('Y-m-d');

            $this->date_of_return = $sale->date_of_return->format('Y-m-d');
        }
    }

    public function edit()
    {
        $data = $this->except('sale');

        $this->sale->update($data);

        $data['sale_id']=$this->sale->id;

        Transaction::editPay($data);

        session()->flash('success_message', 'O\'zgartirildi!');

        return $this->redirect(route("sales.list"));
    }
}

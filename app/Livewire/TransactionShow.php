<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Payment;
use Livewire\Component;

class TransactionShow extends Component
{
    public $client_id;
    public float $amount;
    public int $transaction_id;
    public string $comment;

    protected function rules(): array
    {
        return [
            'amount' => 'required',
            'transaction_id' => 'required',
            'comment' => 'nullable|string|min:3|max:255'
        ];
    }
    public function mount($client_id)
    {
        $this->client_id = $client_id;
    }
    public function render()
    {
        $client = Client::find($this->client_id);

        return view('livewire.transaction-show', ['client' => $client]);
    }

    public function pay()
    {
        $this->validate();

        $payment = Payment::create([

            'client_id'=>$this->client_id,

            'transaction_id' => $this->transaction_id,

            'amount' => $this->amount,

            'comment'=>$this->comment
        ]);

        $dept = $payment->transaction->dept;

        if ($payment->amount > $dept) {

            $balance = $payment->amount - $dept;

            $payment->transaction->update(['balance' => $balance + $payment->transaction->balance, 'dept' => 0]);


        } elseif ($payment->amount <= $dept) {

            $amount = $dept - $payment->amount;

            $payment->transaction->update(['dept' => $amount]);
        }

        session()->flash('success_message', 'To\'lov qilindi!');

        return $this->redirect(url()->previous());
    }
}

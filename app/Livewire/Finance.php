<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\Payment;
use App\Models\Transaction;
use Livewire\Component;

class Finance extends Component
{
    public string $period = "year";
    public function render()
    {
        $payments = Payment::query();

        $payments = match ($this->period) {
            'year' => $payments->whereYear('created_at', now()->year),
            'month' => $payments->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month),
            'week' => $payments->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]),
            default => $payments,
        };

        $payments = $payments->get();


        $expenses = Expense::query();

        $expenses = match ($this->period) {
            'year' => $expenses->whereYear('created_at', now()->year),
            'month' => $expenses->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month),
            'week' => $expenses->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]),
            default => $expenses,
        };

        $expenses = $expenses->get();



        $transactions = Transaction::query();

        $transactions->where('dept', '>', 0);

        $transactions = match ($this->period) {
            'year' => $transactions->whereYear('created_at', now()->year),
            'month' => $transactions->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month),
            'week' => $transactions->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]),
            default => $transactions,
        };

        $transactions = $transactions->get();




        $transactions_with_depts = Transaction::query();

        $transactions_with_depts->where('balance', '>', 0);

        $transactions_with_depts = match ($this->period) {
            'year' => $transactions_with_depts->whereYear('created_at', now()->year),
            'month' => $transactions_with_depts->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month),
            'week' => $transactions_with_depts->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]),
            default => $transactions_with_depts,
        };

        $transactions_with_depts = $transactions_with_depts->get();

        return view('livewire.finance', ['payments' => $payments, 'expenses' => $expenses, 'transactions' => $transactions,'depts' => $transactions_with_depts]);
    }

    public function change($period)
    {
        $this->period = $period;

        $this->render();
    }
}

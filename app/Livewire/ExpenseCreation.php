<?php

namespace App\Livewire;

use App\Models\Expense;
use Livewire\Component;

class ExpenseCreation extends Component
{
    public string $type;
    public float $amount;

    public Expense $expense;
    protected function rules(): array
    {
        return [
            'type'=>'required|string|max:150',
            'amount'=>'required|int|min:1'
        ];
    }
    public function render()
    {
        $expenses = Expense::orderBy('id', 'desc')->get();

        return view('livewire.expense-creation',['expenses'=>$expenses]);
    }

    public function save()
    {
        $this->validate();

        Expense::create(
            $this->only(['type', 'amount'])
        );

        session()->flash('success', 'Qo\'shildi!');

        return $this->redirect(route("expenses.list"));
    }

    public function delete(string $id)
    {
        $expense = Expense::find($id);

        $expense->delete();

        session()->flash('danger', 'O\'chirildi!');

        return $this->redirect(route("expenses.list"));
    }

    public function select(string $id)
    {
        $expense = Expense::find($id);

        $this->expense=$expense;

        $this->type=$expense->type;

        $this->amount=$expense->amount;
    }

    public function edit()
    {
        $this->expense->update($this->except('expense'));

        session()->flash('success', 'O\'zgartirildi!');

        return $this->redirect(route("expenses.list"));
    }
}

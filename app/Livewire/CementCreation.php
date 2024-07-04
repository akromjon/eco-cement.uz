<?php

namespace App\Livewire;

use App\Models\Cement;
use App\Models\Sale;
use Livewire\Component;

class CementCreation extends Component
{
    public string $type;

    public Cement $cement;

    protected function rules(): array
    {
        return [
            "type" => "string|required|min:3|max:255|unique:cements",
        ];
    }
    public function render()
    {
        $cements = Cement::orderBy("id","desc")->get();
        return view('livewire.cement-creation', ["cements" => $cements]);
    }

    public function save()
    {

        $this->validate();

        Cement::create(
            $this->only(['type'])
        );

        return $this->redirect(route("cements.create"));
    }

    public function delete(string $cement_id)
    {
        $cement = Cement::find($cement_id);

        if($cement->sales()->count()>0){

            return session()->flash('message', 'Sotuvda quydagi sement ishlatilingan!');
        }

        $cement->delete();

        $this->render();
    }

    public function select(string $id)
    {
        $this->cement = Cement::find($id);

        $this->type = $this->cement->type;
    }

    public function edit()
    {
        $this->validate();

        $this->cement->update(["type" => $this->type]);

        return $this->redirect(route("cements.create"));
    }
}

<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientCreation extends Component
{
    public string $name;
    public string $phone_number = "998";
    public Client $client;

    protected function rules(): array
    {

        $rules = [
            "name" => "string|required|min:3|max:255",
            "phone_number" => "required|string|min:12|max:12|unique:clients,phone_number," . $this->phone_number
            //unique:users,email,' . $this->userID
        ];

        if (!empty($this->client)) {
            $rules["phone_number"] = "required|string|min:12|max:12";
        }

        return $rules;
    }
    public function render()
    {
        $clients = Client::orderBy("id","desc")->paginate(20);
        return view('livewire.client-creation', ["clients" => $clients]);
    }

    public function save()
    {

        $this->validate();

        Client::create(
            $this->only(['name', 'phone_number'])
        );

        return $this->redirect(route("clients.create"));
    }

    public function delete(string $client_id)
    {
        $client = Client::find($client_id);

        $client->delete();

        $this->render();
    }

    public function select(string $id)
    {
        $this->client = Client::find($id);

        $this->name = $this->client->name;

        $this->phone_number = $this->client->phone_number;
    }

    public function edit()
    {
        $this->validate();

        $this->client->update(["name" => $this->name, "phone_number" => $this->phone_number]);

        return $this->redirect(route("clients.create"));
    }
}

<div>
    <div class="d-flex mx-3">
        @include('components.return-back')
        <button type="button" class="btn btn-primary w-50 ms-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            + Yangi qo'shish
        </button>
    </div>

    <table class="table mb-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mijozlar</th>
                <th scope="col">Telefon Raqam</th>
                <th scope="col">Vaqt</th>
                <th scope="col">......</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)

            <tr>
                <th scope="row">{{$client->id}}</th>
                <td>{{$client->name}} </td>
                <td>{{$client->phone_number}}</td>
                <td>{{$client->created_at}}</td>
                <td><button wire:confirm="Rostanmi?" wire:click="delete({{$client->id}})" type="button"
                        class="btn btn-outline-danger btn-sm">O'chirmoq</button>
                    <button wire:click="select({{$client->id}})" data-bs-toggle="modal" data-bs-target="#edit"
                        type="button" class="btn btn-outline-info btn-sm">O'zgartirish</button>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Yangi Mijozlar qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="save">
                        <div class="form-floating mb-2">
                            <input wire:model="name" name="name" type="text" class="form-control" id="floatingInput">
                            @error('name') <span class="alert alert-danger">{{ $message }}</span> @enderror
                            <label for="floatingInput">Mijozlar</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input name="phone_number" wire:model="phone_number" type="tel" class="form-control"
                                id="telInput">
                            @error('phone_number') <span class="alert alert-danger">{{ $message }}</span> @enderror
                            <label for="telInput">Telefon raqami</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yopish</button>
                            <button type="submit" class="btn btn-success">Saqlamoq</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel">Yangi Mijozlar qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="edit">
                        <div class="form-floating mb-2">
                            <input wire:model="name" name="name" type="text" class="form-control" id="floatingInput">
                            @error('name') <span class="alert alert-danger">{{ $message }}</span> @enderror
                            <label for="floatingInput">Mijozlar</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input name="phone_number" wire:model="phone_number" type="tel" class="form-control"
                                id="telInput">
                            @error('phone_number') <span class="alert alert-danger">{{ $message }}</span> @enderror
                            <label for="telInput">Telefon raqami</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yopish</button>
                            <button type="submit" class="btn btn-success">Saqlamoq</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

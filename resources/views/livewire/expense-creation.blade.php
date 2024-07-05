<div>
    <main>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <div class="d-flex mx-3">
            @include('components.return-back')
            <button type="button" class="btn btn-primary w-50 ms-1" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                + Yangi qo'shish
            </button>
        </div>

        <table class="table mb-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Xarajatlar</th>
                    <th scope="col">Summa</th>
                    <th scope="col">......</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $key => $e)
                    <tr>
                        <th scope="row">{{$e->id}}</th>
                        <td>{{$e->type}}</td>
                        <td>{{$e->amount}}</td>
                        <td><button wire:confirm="Rostanmi?" wire:click="delete({{$e->id}})" type="button" class="btn btn-outline-danger btn-sm">O'chirmoq</button>
                            <button data-bs-toggle="modal"
                            data-bs-target="#edit"  wire:click="select({{$e->id}})" type="button" class="btn btn-outline-success btn-sm">O'zgartirish</button></td>
                    </tr>
                @endforeach

            </tbody>
        </table>




        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Yangi Xarajatlar qo'shish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit="save">
                            <div class="form-floating mb-2">
                                <input wire:model="type" type="text" class="form-control" id="floatingInput">
                                <label  name="type" for="floatingInput">Xarajatlar</label>
                                @error('type') <span class="alert alert-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input wire:model="amount" name="amount" type="number" class="form-control"
                                    id="telInput">
                                <label for="telInput">Xarajatlar miqdori</label>
                                @error('amount') <span class="alert alert-danger">{{ $message }}</span> @enderror
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
                        <h5 class="modal-title" id="editLabel">Yangi Xarajatlar qo'shish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit="edit">
                            <div class="form-floating mb-2">
                                <input wire:model="type" type="text" class="form-control" id="floatingInput">
                                <label  name="type" for="floatingInput">Xarajatlar</label>
                                @error('type') <span class="alert alert-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input wire:model="amount" name="amount" type="number" class="form-control"
                                    id="telInput">
                                <label for="telInput">Xarajatlar miqdori</label>
                                @error('amount') <span class="alert alert-danger">{{ $message }}</span> @enderror
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

    </main>

</div>

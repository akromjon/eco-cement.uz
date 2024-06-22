<div>
    <div class="d-flex mx-3">
        @include('components.return-back')
        <button type="button" class="btn btn-primary w-50 ms-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            + Yangi qo'shish
        </button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Marka Sement</th>
                <th scope="col">......</th>
            </tr>
        </thead>
        <tbody>

            @foreach($cements as $key => $cement)

            <tr>
                <th scope="row">{{$cement->id}}</th>
                <td>{{$cement->type}} </td>
                <td>
                    <button wire:confirm="Rostanmi?" wire:click="delete({{$cement->id}})" type="button"
                        class="btn btn-outline-danger btn-sm">O'chirmoq</button>
                    <button wire:click="select({{$cement->id}})" data-bs-toggle="modal" data-bs-target="#editCement"  type="button"
                        class="btn btn-outline-info btn-sm">O'zgartirish</button>

                </td>

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
                    <h5 class="modal-title" id="staticBackdropLabel">Yangi sement qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="save">
                        <div class="form-floating mb-2">
                            <input type="text" wire:model="type" class="form-control" id="floatingInput">
                            @error('type') <span class="alert alert-danger">{{ $message }}</span> @enderror

                            <label for="floatingInput">Sement</label>
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

    <div wire:ignore.self class="modal fade" id="editCement" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="editCementLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCementLabel">Yangi sement qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="edit">
                        <div class="form-floating mb-2">
                            <input type="text" value="{{$type}}" wire:model="type" class="form-control" id="floatingInput">
                            @error('type') <span class="alert alert-danger">{{ $message }}</span> @enderror

                            <label for="floatingInput">Sement</label>
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

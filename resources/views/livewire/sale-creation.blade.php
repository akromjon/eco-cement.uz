<div>
    @if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
    @endif
    <div class="d-flex mx-1">
        @include('components.return-back')
        <button type="button" class="btn btn-primary w-50 ms-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            + Yangi qo'shish
        </button>
    </div>

    @foreach($data['sales'] as $key => $sale)
        <div class="box my-3 mx-1 px-3 py-1 bg-body rounded shadow-sm">
            <div class="name-cilent  flex-1">ID:#{{$sale->id}} | {{$sale?->client?->name}}</div>
            <div class="d-flex    list-product">
                <div class="list-product-left">
                    <div class="sana">{{$sale->given_date->format('d.m.y')}}</div>
                    <div class="marka">{{$sale->cement?->type}}</div>
                    <div class="car">{{$sale->car_number}}</div>
                </div>
                <div class="list-product-center">
                    <div class="sana red">{{$sale->date_of_return->format('d.m.y')}}</div>
                    <div class="sum">{{$sale->get_amount}} <span class="s-k-style">so'm</span> </div>
                    <div class="sum">{{$sale->get_amount*$sale->kg}} <span class="s-k-style">so'm</span> </div>
                </div>
                <div class="list-product-right text-end">
                    <div class="kg">{{$sale->kg}} <span class="s-k-style">kg</span> </div>
                    <div class="sum">{{$sale->sell_amount}} <span class="s-k-style">so'm</span> </div>
                    <div class="summa">{{$sale->kg*$sale->sell_amount}} <span class="s-k-style">so'm</span> </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">

                <button wire:confirm="Rostanmi?" wire:click="delete({{$sale->id}})" type="button" class="btn btn-danger mini-btn" data-bs-toggle="modal" data-bs-target="#deletM">
                    D
                </button>
                <button wire:click="select({{$sale->id}})" type="button" class="btn btn-primary mini-btn ms-1" data-bs-toggle="modal" data-bs-target="#edit">
                    U
                </button>
            </div>
        </div>
    @endforeach
    <!-- Modal Create-->
    <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Yangi sement sotish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="save">
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Mijozlar</label>
                            @error('client_id') <span class="alert alert-danger">{{ $message }}</span> @enderror

                            <select wire:model="client_id" name="client_id" id="disabledSelect" class="form-select">
                                <option>......</option>
                                @foreach($data['clients'] as $key => $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Maxsulot berilgan sana</label>
                            <input wire:model="given_date" name="given_date" type="date" class="form-control" id="exampleInputPassword1">
                            @error('given_date') <span class="alert alert-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Marka</label>
                            <select wire:model="cement_id" name="cement_id" id="disabledSelect" class="form-select">
                                <option>......</option>
                                @foreach($data['cements'] as $key => $cement)
                                    <option value="{{$cement->id}}">{{$cement->type}}</option>
                                @endforeach
                            </select>
                            @error('cement_id') <span class="alert alert-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputcar" class="form-label">Mashina</label>
                            <input wire:model="car_number" name="car_number" type="text" class="form-control" id="exampleInputcar">
                            @error('car_number') <span class="alert alert-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputSum" class="form-label red">Summa Olish</label>
                            <input wire:model="get_amount" name="get_amount" type="text" class="form-control border-color-red" id="exampleInputSum">
                            @error('get_amount') <span class="alert alert-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputKg" class="form-label">KG</label>
                            <input wire:model="kg" name="kg" type="text" class="form-control" id="exampleInputKg">
                            @error('kg') <span class="alert alert-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputSum" class="form-label minus">Summa Sotish</label>
                            <input wire:model="sell_amount" name="sell_amount" type="text" class="form-control" id="exampleInputSum">
                            @error('sell_amount') <span class="alert alert-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Tolovni qaytarish sanasi</label>
                            <input wire:model="date_of_return" type="date" name="date_of_return" class="form-control" id="exampleInputPassword2">
                            @error('date_of_return') <span class="alert alert-danger">{{ $message }}</span> @enderror

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

    <!-- Modal Update-->
    <div wire:ignore.self class="modal fade" id="edit" data-bs-backdrop="edit" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBackdropLabel">Yangi sement sotish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="edit">
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Mijozlar</label>
                            @error('client_id') <span class="alert alert-danger">{{ $message }}</span> @enderror

                            <select wire:model="client_id" name="client_id" id="disabledSelect" class="form-select">
                                <option>......</option>
                                @foreach($data['clients'] as $key => $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Maxsulot berilgan sana</label>
                            <input wire:model="given_date" name="given_date" type="date" class="form-control" id="exampleInputPassword1">
                            @error('given_date') <span class="alert alert-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Marka</label>
                            <select wire:model="cement_id" name="cement_id" id="disabledSelect" class="form-select">
                                <option>......</option>
                                @foreach($data['cements'] as $key => $cement)
                                    <option value="{{$cement->id}}">{{$cement->type}}</option>
                                @endforeach
                            </select>
                            @error('cement_id') <span class="alert alert-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputcar" class="form-label">Mashina</label>
                            <input wire:model="car_number" name="car_number" type="text" class="form-control" id="exampleInputcar">
                            @error('car_number') <span class="alert alert-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputSum" class="form-label red">Summa Olish</label>
                            <input wire:model="get_amount" name="get_amount" type="text" class="form-control border-color-red" id="exampleInputSum">
                            @error('get_amount') <span class="alert alert-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputKg" class="form-label">KG</label>
                            <input wire:model="kg" name="kg" type="text" class="form-control" id="exampleInputKg">
                            @error('kg') <span class="alert alert-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputSum" class="form-label minus">Summa Sotish</label>
                            <input wire:model="sell_amount" name="sell_amount" type="text" class="form-control" id="exampleInputSum">
                            @error('sell_amount') <span class="alert alert-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Tolovni qaytarish sanasi</label>
                            <input wire:model="date_of_return" value="{{$date_of_return}}" type="date" name="date_of_return" class="form-control" id="exampleInputPassword2">
                            @error('date_of_return') <span class="alert alert-danger">{{ $message }}</span> @enderror

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

    <!-- Modal Delet -->
    <div class="modal fade" id="deletM" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deletMLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deletMLabel">Rostdan ham o'charasizmi?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="d-flex w-100 m-3">
                    <button type="button" class="flex btn btn-danger px-5" data-bs-dismiss="modal">Yoq</button>
                    <button type="button" class="flex btn btn-primary px-5 ms-3">HA</button>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('layouts.main')
@section('title')
    {{ $data?->page_name}}
@endsection
@section('content')

    <main>
        <div class="d-flex justify-content-between">
           <div class="alert alert-danger p-1 w-100 text-center mx-1" role="alert">
              <span class="text-danger fw-bold m-font">150 000 000 so'm</span>
           </div>
           <div class="alert alert-info p-1 w-100 text-center mx-1" role="alert">
              <span class="text-primary fw-bold m-font">50 000 000 so'm</span>
           </div>
           <div class="alert alert-dark p-1 w-100 text-center mx-1" role="alert">
              <span class="text-dark fw-bold m-font">100 000 000 so'm</span>
           </div>
        </div>


        <ul class="nav nav-pills mb-3 border-bottom border-2 my-tabs" id="pills-tab" role="tablist">
           <li class="nav-item" role="presentation">
              <button class="nav-link text-primary fw-semibold active position-relative" id="pills-home-tab"
                 data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                 aria-selected="true">Mahsulotlar</button>
           </li>

           <li class="nav-item" role="presentation">
              <button class="nav-link text-primary fw-semibold position-relative" id="pills-profile-tab"
                 data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                 aria-controls="pills-profile" aria-selected="false">To'lovlar</button>
           </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content text-danger" id="pills-tabContent">

           <!-- Itme Tab Content -->
           <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="d-flex mx-3">
                 <a href="{{url()->previous()}}" class="btn btn-secondary w-25">
                    Orqaga
                 </a>
              </div>

              @foreach($data->client->sales as $key => $sale)
                <div class="d-flex my-3 mx-1 p-3 bg-body rounded shadow-sm list-product">
                    <div class="list-product-left">
                    <div class="sana">{{$sale->given_date->format('d.m.Y')}}</div>
                    <div class="marka">{{$sale->cement->type}}</div>
                    <div class="car">{{$sale->car_number}}</div>
                    </div>
                    <div class="list-product-center">
                    <div class="sana red">{{$sale->date_of_return->format('d.m.Y')}}</div>
                    <div class="name-cilent">{{$data->client->name}}</div>
                    </div>
                    <div class="list-product-right text-end">
                    <div class="kg">{{$sale->kg}} <span class="s-k-style">kg</span> </div>
                    <div class="sum">{{$sale->get_amount}} <span class="s-k-style">so'm</span> </div>
                    <div class="summa">{{$sale->get_amount*$sale->kg}} <span class="s-k-style">so'm</span> </div>
                    </div>
                </div>
              @endforeach
           </div>

           <!-- Itme Tab Content -->
           <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="d-flex mx-3">
                 <a href="./cilents.html" class="btn btn-secondary w-50">
                    Orqaga
                 </a>
                 <button type="button" class="btn btn-primary w-50 ms-1" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    + Yangi qo'shish
                 </button>
              </div>

              <div class="d-flex my-3 mx-1 p-3 bg-body rounded shadow-sm list-product">
                 <div class="list-product-left w-50">
                    <div class="sana">02.06.2024</div>
                    <div class="car">Qo'qon bozori oldida oldim</div>
                 </div>
                 <div class="list-product-right text-end w-50">
                    <div class="summa">50 000 000 <span class="s-k-style">so'm</span> </div>
                    <div class="d-flex justify-content-end">
                       <button type="button" class="btn btn-danger mini-btn" data-bs-toggle="modal"
                          data-bs-target="#deletM">
                          D
                       </button>
                       <button type="button" class="btn btn-primary mini-btn ms-1" data-bs-toggle="modal"
                          data-bs-target="#upDate">
                          U
                       </button>
                    </div>
                 </div>
              </div>
           </div>
        </div>

     </main>

     <!-- Modal Create-->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">To'lov qo'shish</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                 <form action="">

                    <div class="mb-3">
                       <label for="exampleInputPassword2" class="form-label"></label>
                       <input type="date" class="form-control" id="exampleInputPassword2">
                    </div>

                    <div class="mb-3">
                       <label for="exampleInputSum" class="form-label">Summa</label>
                       <input type="text" class="form-control" id="exampleInputSum">
                    </div>

                    <div class="mb-3">
                       <label for="exampleInputcar" class="form-label">Izox</label>
                       <input type="text" class="form-control" id="exampleInputcar">
                    </div>




                    <div class="modal-footer">
                       <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yopish</button>
                       <button type="button" class="btn btn-success">Saqlamoq</button>
                    </div>
                 </form>
              </div>

           </div>
        </div>
     </div>

     <!-- Modal Update-->
     <div class="modal fade" id="upDate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="upDateLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title" id="upDateLabel">To'lov o'zgartrish</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                 <form action="">

                    <div class="mb-3">
                       <label for="exampleInputPassword2" class="form-label"></label>
                       <input type="date" class="form-control" id="exampleInputPassword2">
                    </div>

                    <div class="mb-3">
                       <label for="exampleInputSum" class="form-label">Summa</label>
                       <input type="text" class="form-control" id="exampleInputSum">
                    </div>

                    <div class="mb-3">
                       <label for="exampleInputcar" class="form-label">Izox</label>
                       <input type="text" class="form-control" id="exampleInputcar">
                    </div>




                    <div class="modal-footer">
                       <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yopish</button>
                       <button type="button" class="btn btn-success">Saqlamoq</button>
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

@endsection

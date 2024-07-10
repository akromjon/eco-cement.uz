<div>
    <main>
        <div class="d-flex mx-3">
            @include('components.return-back')
        </div>
        @foreach($orders as $key => $order)
            <div class=" text-muted m-3 p-3 bg-body rounded shadow-sm">
                <a href="{{route('transactions.show',$order->id)}}" class="d-flex text-decoration-none">
                    <div class="ms-3 mb-0 small  border-bottom w-100">
                        <div class="">
                            <strong class="text-menu  name-cilent font-14">{{$order->name}}</strong><br>
                            <strong class="text-menu  font-14 minus">{{$order->id}}</strong>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </main>
</div>

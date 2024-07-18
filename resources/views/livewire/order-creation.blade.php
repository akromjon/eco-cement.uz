<div>
    <main>
        <div class="d-flex mx-3">
            @include('components.return-back')
        </div>
        @foreach($clients as $key => $client)
        <div class=" text-muted m-3 p-3 bg-body rounded shadow-sm">
            <a href="{{route('transactions.show',$client->id)}}" class="d-flex text-decoration-none">
                <div class="ms-3 mb-0 small  border-bottom w-100">
                    <div class="">
                        <strong class="text-menu  name-cilent font-14">{{$client->name}}</strong><br>
                        <strong class="text-menu  font-14 minus">
                            @if($client->transactions->sum('dept') > 0)
                            {{"-".$client->transactions->sum('dept')}}
                            @elseif($client->transactions->sum('balance') > 0)
                            {{ $client->transactions->sum('balance') }}
                            @elseif($client->transactions->sum('dept')==0 && $client->transactions->sum('balance')==0)
                            0
                            @endif
                        </strong>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </main>
</div>

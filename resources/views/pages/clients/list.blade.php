@extends('layouts.main')
@section('title')
{{ $data?->page_name}}
@endsection
@section('content')
<main>

    <div class="d-flex mx-3">
        @include('components.return-back')
    </div>

    <div class=" text-muted m-3 p-3 bg-body rounded shadow-sm">
        <a href="./cilent-list.html" class="d-flex text-decoration-none">
            <div class="ms-3 mb-0 small  border-bottom w-100">
                <div class="">
                    <strong class="text-menu  name-cilent font-14">Alisher O'rinov Anidijon</strong><br>
                    <strong class="text-menu  font-14 minus">- 100 000 000 so'm</strong>
                </div>
            </div>
        </a>
    </div>
    <div class=" text-muted m-3 p-3 bg-body rounded shadow-sm">
        <a href="./cilent-list.html" class="d-flex text-decoration-none">
            <div class="ms-3 mb-0 small  border-bottom w-100">
                <div class="">
                    <strong class="text-menu name-cilent font-14">Alisher O'rinov Anidijon</strong><br>
                    <strong class="text-menu  font-14">300 000 000 so'm</strong>
                </div>
            </div>
        </a>
    </div>

</main>
@endsection

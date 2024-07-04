@extends('layouts.main')
@section('title')
    {{ $data?->page_name}}
@endsection
@section('content')
<main>
    @livewire('sale-creation')
</main>
@endsection

@extends('layouts.main')
@section('title')
    {{ $data?->page_name}}
@endsection
@section('content')
<main>
    @livewire('order-creation')
</main>
@endsection

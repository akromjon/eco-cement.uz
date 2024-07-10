@extends('layouts.main')
@section('title')
    {{ $data?->page_name}}
@endsection
@section('content')
    @livewire('finance')
@endsection

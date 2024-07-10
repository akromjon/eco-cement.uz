@extends('layouts.main')
    @section('title')
        {{ $data?->page_name}}
    @endsection
    @section('content')
        @livewire('transaction-show',['client_id'=>$data->client_id])
    @endsection

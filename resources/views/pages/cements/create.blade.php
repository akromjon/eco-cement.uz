@extends('layouts.main')
@section('title')
    {{  $data?->page_name}}
@endsection
@section('content')
    <main>
       @livewire('cement-creation')
     </main>
@endsection

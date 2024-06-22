@extends('layouts.main')
@section('title')
    {{  $data?->page_name}}
@endsection
@section('content')
    @include('components.main')
@endsection

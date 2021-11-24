@extends('layout.app')

@section('content')
    <h1>Hello</h1>
    @foreach(\App\Models\Domain::all() as $domain)
        <p>{{$domain->name}}</p>
    @endforeach
@endsection

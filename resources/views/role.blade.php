@extends('layout.app')

@section('content')

    @foreach(\App\Models\Role::all() as $domain)
        <p>{{$domain->name}}</p>
    @endforeach
@endsection

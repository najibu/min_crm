@extends('layouts.app')

@section('content')
    <clients-index
        :create-link="{{ json_encode(route('clients.create')) }}"
    ></clients-index>
@endsection

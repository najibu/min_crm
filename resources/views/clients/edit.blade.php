@extends('layouts.app')

@section('content')
    <clients-edit
        :client-data="{{ $client }}"
    ></clients-edit>
@endsection

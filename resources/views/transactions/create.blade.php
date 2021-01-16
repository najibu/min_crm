@extends('layouts.app')

@section('content')
    <transactions-create
        :clients="{{ $clients }}"
    ></transactions-create>
@endsection

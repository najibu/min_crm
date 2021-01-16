@extends('layouts.app')

@section('content')
    <transactions-index
        :create-link="{{ json_encode(route('transactions.create')) }}"
    ></transactions-index>
@endsection

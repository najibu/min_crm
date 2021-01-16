@extends('layouts.app')

@section('content')
    <transactions-edit
        :clients="{{ $clients }}"
        :transaction-data="{{ $transaction }}"
    ></transactions-edit>
@endsection

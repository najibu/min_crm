@extends('layouts.app')

@section('content')
    <transactions-show
        :transaction="{{ $transaction }}"
    ></transactions-show>
@endsection

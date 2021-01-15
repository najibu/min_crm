@extends('layouts.app')

@section('content')
    <clients-show
        :client="{{ $client }}"
    ></clients-show>
@endsection

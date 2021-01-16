<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\Transaction as Requests;
use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\IndexRequest $request)
    {
        return view('transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Requests\IndexRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(Requests\IndexRequest $request)
    {
        $clients = Client::all();

        return view('transactions.create', compact('clients'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @param  Requests\IndexRequest $request
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction, Requests\IndexRequest $request)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @param  Requests\IndexRequest $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction, Requests\IndexRequest $request)
    {
        $clients = Client::all();

        return view('transactions.edit', compact(
            'transaction',
            'clients'
        ));
    }
}

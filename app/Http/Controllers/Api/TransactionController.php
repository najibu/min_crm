<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\Http\Requests\Api\Transaction as Requests;

class TransactionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\IndexRequest $request)
    {
        $transactions = Transaction::paginate(10);

        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreRequest $request, Transaction $transaction)
    {
        $transaction->create($request->all());

        return response()->json('Transaction successfully created.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return response()->json('Transaction successfully update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json('Transaction successfully deleted.');
    }
}

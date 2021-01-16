<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\Client as Requests;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Requests\IndexRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\IndexRequest $request)
    {
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Requests\IndexRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(Requests\IndexRequest $request)
    {
        return view('clients.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  Client $client
     * @param  Requests\IndexRequest $request
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Requests\IndexRequest $request)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Requests\IndexRequest $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, Requests\IndexRequest $request)
    {
        return view('clients.edit', compact('client'));
    }
}

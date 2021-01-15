<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client as Requests;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\IndexRequest $request)
    {
        $clients = Client::paginate(10);

        return response()->json($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreRequest $request, Client $client)
    {
        $data = $request->except('avatar');

        $image = $request->avatar;

        $data['avatar'] = Storage::disk('local')->put('public', $image);

        $client->create($data);

        return response()->json('Client successfully created.');
    }
}

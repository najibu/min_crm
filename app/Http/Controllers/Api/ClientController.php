<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client\IndexRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        $clients = Client::paginate(10);

        return response()->json($clients);
    }
}

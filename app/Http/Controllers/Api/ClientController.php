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
        $data = $this->processData($request);

        $client->create($data);

        return response()->json('Client successfully created.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateRequest $request, Client $client)
    {
        $data = $this->processData($request);

        $client->update($data);

        return response()->json('Client successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json('Client successfully deleted.');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function processData($request)
    {
        $data = $request->except('avatar');

        $image = $request->avatar;

        if ($image) {
            $fileName = $image->getClientOriginalName();
            Storage::putFileAs("public", $image, $fileName);

            $data['avatar'] = $fileName;
        }

        return $data;
    }
}

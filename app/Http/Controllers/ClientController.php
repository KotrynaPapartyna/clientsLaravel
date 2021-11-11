<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view("client.index",["clients"=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clients = Client::all();
        return view("client.create", ["clients" => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createClients(Request $request)
    {
        $clientsCount = $request->clientsCount;

        if(!$clientsCount) {
            $clientsCount = 2;
        }

        if($request->clientAdd == "plus") {
            $clientsCount++;
        } else if($request->clientAdd == "minus") {
            $clientsCount--;
        }

        return view("client.createClients", ["clientsCount" => $clientsCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createJS(Request $request)
    {
        $clientsCount = $request->clientsCount;

        if(!$clientsCount) {
            $clientsCount = 1;
        }
        return view('client.createJS', ['clientsCount' => $clientsCount]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // vieno kliento pridejimas- veikia gerai
    public function store(Request $request)
    {
        $client = new Client;

        $client->name = $request->clientName;
        $client->surname = $request->clientSurname;
        $client->description = $request->clientDescription;

        $client->save();

        return redirect()->route("client.index");
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // klientu pridejimas su lentele
    public function storeClients(Request $request)
    {
        // validacijos dar nesutvarkytos
        $request->validate([
            "clientName.*.name" => "required",
            "clientSurname.*.surname" => "required",
            "clientDescription.*.description" => "required",
        ]);

        $clientsCount = count($request->clientName);

        for ($i = 0; $i<$clientsCount; $i++ ) {

            $client = new Client;

        $client->name = $request->clientName[$i];
        $client->surname = $request->clientSurname[$i];
        $client->description = $request->clientDescription[$i];

        $client->save();

        return redirect()->route("client.index");
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // pridejimas su JS veikia- tik nesuprogramuoti mygtukai
    public function storeJS(Request $request)
    {

        $clientsCount = count($request->clientName);

        for($i = 0; $i<$clientsCount; $i++) {

            $client = new Client;

            $client->name = $request->clientName[$i];
            $client->surname = $request->clientSurname[$i];
            $client->description = $request->clientDescription[$i];

            $client->save();
            }

            return redirect()->route("client.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}

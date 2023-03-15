<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        return view('index', compact('clients'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $client = Client::create($input);
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $client->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        return redirect()->route('client');
    }
}

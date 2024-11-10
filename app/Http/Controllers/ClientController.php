<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function  client()
    {
        $models = Client::orderBy('id', 'desc')->paginate(5);
        return view('/client.index', ['models' => $models]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(ClientStoreRequest $request)
    {
        $data = $request->all();

        Client::create($data);
        return redirect('/client');
    }

    
    public function delete($id)
    {
        $model = Client::find($id);
        $model->delete();
        return redirect('/client')->with('success', 'Category successfully deleted');
    }

    public function update(ClientUpdateRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        
        $client->login = $request->input('login');
        
        if ($request->filled('password')) {
            $client->password = bcrypt($request->input('password'));
        }
    
        $client->save();
    
        return redirect()->route('client.index')->with('success', 'Client updated successfully.');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'image'=>'required|image',
            'cedula'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'observations'=>'',
        ]);        

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $client = auth()->user()->clients()->create([
            'name' => $data['name'],
            'image' => $imagePath,
            'cedula' => $data['cedula'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'observations' => $data['observations']            
        ]);

        return redirect('/home');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Client $client)
    {
        //Obteniendo y validando datos
        $data = request()->validate([
            'name' => 'required',
            'image' => 'image',
            'cedula' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'observations' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        $client->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('/home');
    }

    public function destroy(Client $client)
    {
        //dd($client->id);
        $client->delete();
        return redirect('/home');
    }
}

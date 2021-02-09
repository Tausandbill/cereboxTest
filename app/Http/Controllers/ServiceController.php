<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function create(Client $client)
    {
        return view('services.create', compact('client'));
    }

    public function store(Client $client)
    {
        $data = request()->validate([
            'name' => 'required',
            'image' => 'required|image',
            'type' => 'required',
            'start' => 'required',
            'end' => 'required',
            'observations' => '',
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        
        $client->services()->create([
            'name' => $data['name'],
            'image' => $imagePath,
            'type' => $data['type'],
            'start' => strtotime(request()->start),
            'end' => strtotime(request()->end),
            'observations' => $data['observations']
        ]);

        return redirect('/clients/show/'. $client->id);
    }
}

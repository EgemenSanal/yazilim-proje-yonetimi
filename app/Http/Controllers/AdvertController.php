<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdvertRequest;
use App\Http\Requests\UpdateAdvertRequest;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adverts = Advert::all();
        $adverts->transform(function ($advert) {
           if($advert->video_path){
               $advert->video_url = asset('storage/'.$advert->video_path);
           }
           return $advert;
        });
        return response()->json($adverts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
           'title' => 'required',
           'description' => 'required',
           'price' => 'required',
           'location' => 'sometimes|required',
           'lesson' => 'required',
            'profession' => 'required',
            'video_file' => 'nullable|mimes:mp4,mov,ogg,webm',
        ]);
        $advert = new Advert();
        $advert->title = $request->title;
        $advert->description = $request->description;
        $advert->price = $request->price;
        $advert->location = $request->location;
        $advert->lesson = $request->lesson;
        $advert->profession = $request->profession;

        if(request()->hasFile('video_file')){
            $file = request()->file('video_file')->store('video', 'public');
            $advert->video_path = $file;
        }
        $advert->save();
        return response()->json(['message' => 'Advert added!'], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $selected_advert = Advert::find($id);
        if(!$selected_advert){
            return response()->json(['message' => 'Advert not found!'], 404);
        }

            if($selected_advert->video_path){
                $selected_advert->video_url = asset('storage/'.$selected_advert->video_path);
                return $selected_advert;
            }
        return response()->json($selected_advert);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advert $advert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvertRequest $request, Advert $advert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advert $advert)
    {
        //
    }
}

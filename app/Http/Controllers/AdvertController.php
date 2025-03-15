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
        return Advert::all();
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
        ]);

        $advert = Advert::create($fields);
        return [
          'data' => $advert,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Advert $advert)
    {
        //
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

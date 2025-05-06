<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Http\Requests\UpdatePurchaseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        $member_id = Auth::id();
        $validated = $request->validate([
            'course_id' => 'required',
            'teacher_id' => 'required'
        ]);
        $validated['member_id'] = $member_id;


        Purchase::create($validated);
        return [
            'message' => 'success'
        ];
    }


    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}

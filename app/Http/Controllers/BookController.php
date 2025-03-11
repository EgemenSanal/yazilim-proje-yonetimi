<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
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
            'author' => 'required',
            'description' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'pages' => 'required',
            'file_path' => 'required',
            'cover_image' => 'required',
            '18+' => 'required',
        ]);
        Book::create($fields);
        return response()->json([
            'Book created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
        return response()->json([
            'message' => "Book not found"
        ]);
        }
        return response()->json([
            $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function put(Request $request, Book $book)
    {
        $fields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'pages' => 'required',
            'file_path' => 'required',
            'cover_image' => 'required',
            '18+' => 'required',
        ]);
        $book->update($fields);
        return response()->json(['Book updated successfully']);
    }
    public function patch(Request $request, Book $book){
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required',
            'author' => 'sometimes|required',
            'description' => 'sometimes|required',
            'publisher' => 'sometimes|required',
            'year' => 'sometimes|required',
            'pages' => 'sometimes|required',
            'file_path' => 'sometimes|required',
            'cover_image' => 'sometimes|required',
            '18+' => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $book->update($validator->validated());

        return response()->json(['message' => 'Book updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return ['Book deleted successfully'];
    }
}

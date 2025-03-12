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
        //validation
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer',
            'age_limit' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10000',
        ]);

        //save book infos
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->publisher = $request->publisher;
        $book->year = $request->year;
        $book->age_limit = $request->age_limit;

        //save cover image
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('cover_images', 'public');
            $book->cover_image_path = $coverImagePath;
        }

        //save pdf file
        if ($request->hasFile('pdf_file')) {
            $pdfFilePath = $request->file('pdf_file')->store('pdf_files', 'public');
            $book->pdf_file_path = $pdfFilePath;
        }

        $book->save();

        return response()->json(['message' => 'Kitap başarıyla eklendi!'], 201);
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

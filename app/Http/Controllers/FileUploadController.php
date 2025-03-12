<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFileUploadRequest;
use App\Http\Requests\UpdateFileUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function upload(Request $request)
    {
        // Validasyon
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,pdf|max:5120', // 5MB sınır
        ]);

        // Dosyayı storage/app/public/uploads içine kaydet
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');

            // URL döndür (public storage linki olacak)
            return response()->json([
                'message' => 'Dosya yüklendi!',
                'url' => asset('storage/' . $path),
                'path' => $path
            ], 200);
        }

        return response()->json(['message' => 'Dosya bulunamadı.'], 400);
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
    public function store(StoreFileUploadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileUploadRequest $request, FileUpload $fileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileUpload $fileUpload)
    {
        //
    }
}

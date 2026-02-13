<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(
            Book::all()
        );
    }

    public function show($id)
    {
        return response()->json(
            Book::where('book_id', $id)->firstOrFail()
        );
    }
}

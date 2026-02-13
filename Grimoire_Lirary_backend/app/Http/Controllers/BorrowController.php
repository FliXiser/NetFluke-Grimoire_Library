<?php

namespace App\Http\Controllers;

use App\Models\Borrow;

class BorrowController extends Controller
{
    public function index()
    {
        return response()->json(
            Borrow::with('items.book')->get()
        );
    }

    public function show($id)
    {
        return response()->json(
            Borrow::with('items.book')
                ->where('borrow_id', $id)
                ->firstOrFail()
        );
    }
}

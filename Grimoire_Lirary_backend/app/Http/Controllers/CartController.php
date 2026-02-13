<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // เพิ่มของลงตะกร้า
    public function add(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'book_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        DB::table('carts')->insert([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            'message' => 'เพิ่มหนังสือลงตะกร้าแล้ว'
        ]);
    }

    // ดูตะกร้าตาม user
    public function show($userId)
    {
        $cart = DB::table('carts')
            ->where('user_id', $userId)
            ->get();

        return response()->json($cart);
    }
}

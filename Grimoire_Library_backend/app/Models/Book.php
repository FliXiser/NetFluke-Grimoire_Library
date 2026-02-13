<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'book_id';

    protected $fillable = [
        'book_name',
        'category',
        'description',
        'total_copies',
        'available_copies',
        'borrowed_count',
    ];

    // หนังสือถูกยืมหลายครั้ง
    public function borrowItems()
    {
        return $this->hasMany(BorrowItem::class, 'book_id', 'book_id');
    }
}

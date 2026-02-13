<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BorrowItem extends Model
{
    use HasFactory;

    protected $table = 'borrow_items';
    protected $primaryKey = 'borrow_item_id';

    protected $fillable = [
        'borrow_id',
        'book_id',
        'quantity',
        'fine_amount',
    ];

    // รายการนี้อยู่ในการยืมครั้งหนึ่ง
    public function borrow()
    {
        return $this->belongsTo(Borrow::class, 'borrow_id', 'borrow_id');
    }

    // รายการนี้อ้างถึงหนังสือ
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }
}

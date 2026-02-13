<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';
    protected $primaryKey = 'borrow_id';

    protected $fillable = [
        'user_id',
        'borrow_date',
        'due_date',
        'return_date',
        'status',
        'total_fine',
    ];

    // การยืมเป็นของ User คนหนึ่ง
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // การยืม 1 ครั้ง มีหลายเล่ม
    public function items()
    {
        return $this->hasMany(BorrowItem::class, 'borrow_id', 'borrow_id');
    }
}

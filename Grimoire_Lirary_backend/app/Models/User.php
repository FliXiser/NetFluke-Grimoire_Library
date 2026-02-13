<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    // User มีตะกร้า 1 ใบ
    public function cart()
    {
        return $this->hasOne(Cart::class, 'user_id', 'user_id');
    }

    // User ยืมหนังสือได้หลายครั้ง
    public function borrows()
    {
        return $this->hasMany(Borrow::class, 'user_id', 'user_id');
    }
}

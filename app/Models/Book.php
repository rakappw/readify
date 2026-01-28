<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'description',
        'category',
        'total_copies',
        'available_copies',
        'cover_image'
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function isAvailable()
    {
        return $this->available_copies > 0;
    }
}

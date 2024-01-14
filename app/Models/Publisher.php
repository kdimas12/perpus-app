<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $table = "book_publisher";
    protected $fillable = ['name'];
    protected $primaryKey = 'book_publisher_id';
    // protected $timestamp = true;

    public function books()
    {
        return $this->hasMany(Book::class, 'book_publisher_id');
    }
}

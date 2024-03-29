<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "book_category";
    protected $fillable = ['name'];
    protected $primaryKey = 'book_category_id';

    public function books()
    {
        return $this->hasMany(Book::class, 'book_category_id');
    }
}

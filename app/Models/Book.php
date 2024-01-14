<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "book";
    protected $fillable = ['book_category_id', 'code', 'title', 'author', 'genre', 'year', 'edition', 'isbn', 'city', 'description', 'book_publisher_id', 'status'];
    protected $primaryKey = 'book_id';

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'book_publisher_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'book_category_id');
    }

    public function alternative()
    {
        return $this->hasOne(Alternative::class, 'alternative_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $table = 'alternative';
    protected $fillable = ['book_id'];
    protected $primaryKey = 'alternative_id';

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class, 'alternative_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluation';
    protected $fillable = ['alternative_id', 'book_type', 'book_loan', 'popularity', 'availability'];
    protected $primaryKey = 'evaluation_id';

    public function alternative()
    {
        return $this->belongsTo(Alternative::class, 'alternative_id');
    }
}

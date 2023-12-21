<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['publisher_name'];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'publisher_id';

    public function books()
    {
        return $this->hasMany(Book::class, 'publisher_id');
    }
}

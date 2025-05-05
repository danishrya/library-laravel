<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    /**the atributes that are mass asignable 
    *
    *@var array<int|string>
    */
    protected $fillable = [
        'name',
        'publisher',
        'description',
        'published_date',
        'isbn',
        'cover_image',
    ];
}

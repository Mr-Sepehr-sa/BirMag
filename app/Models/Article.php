<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'slug', 'writer_id', 'cat_id' , 'hashtag' , 'body' , 'status' , 'pic' , 'view'];
    use HasFactory;
}

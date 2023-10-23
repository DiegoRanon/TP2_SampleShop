<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];
    public $timestamps = false;
//relation une à plusiers entre category et article
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}

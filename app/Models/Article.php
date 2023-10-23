<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model

{
   
   // use HasFactory;
    protected $fillable = ['title', 'content','photo'];


// relation entre user et article
    public function user()
{
    return $this->belongsTo(User::class);
}


    // relation entre category et article
    public function category()
{
    return $this->belongsTo(category::class);
}
//relation entre article et comments
public function comments()
{
    return $this->hasMany(Comment::class);
}

// recuperation des commentaires valides

public function validComments()
{
    return $this->comments()->whereHas('user', function ($query) {
        $query->whereValid(true);
    });
}

public function etiquettes()
{
    return $this->belongsToMany(Etiquette::class);
}

}


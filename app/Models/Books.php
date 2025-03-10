<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function loans(){
        return $this->hasMany(Loan::class);  //1 a muchos
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeArticle extends Model
{
    use HasFactory;

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function propriete_articles() {
        return $this->hasMany(ProprieteArticle::class);
    }
}

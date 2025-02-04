<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DureeLocation extends Model
{
    use HasFactory;

    public function tarifications() {
        return $this->hasMany(Tarification::class);
    }
}

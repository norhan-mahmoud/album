<?php

namespace App\Models;

use App\Models\photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class album extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function photos()
    {
        return $this->hasMany(photo::class);
    }
}

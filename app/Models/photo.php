<?php

namespace App\Models;

use App\Models\album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class photo extends Model
{
    use HasFactory;
    protected $fillable = ['name','album_id','path'];


    public function album(): BelongsTo
    {
    return $this->belongsTo(album::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'order_number', 'visible', 'slug'];

    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }
}

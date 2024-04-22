<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'featured_image', 'age', 'breed', 'weight', 'gender', 'injured'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

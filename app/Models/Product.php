<?php

namespace App\Models;

use App\Models\Sku;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'short_description',
        'long_description',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function photos():HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function skus():HasMany
    {
        return $this->hasMany(Sku::class);
    }
}

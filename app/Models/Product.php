<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed $image_path
 */
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'short_text',
        'text',
        'inage_path',
        'price',
        'quantity',
        'is_published',
        'collections_id'
    ];

    public function imageUrl()
    {
        return url( Storage::url($this->image_path));
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

}

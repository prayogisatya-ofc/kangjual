<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'gallery' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    protected static function booted() {
        static::deleting(function ($product) {
            if ($product->thumbnail) {
                Storage::disk('public')->delete($product->thumbnail);
            }

            if ($product->gallery) {
                Storage::disk('public')->delete($product->gallery);
            }

            if ($product->file) {
                Storage::disk('private')->delete($product->file);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('thumbnail')) {
                Storage::disk('public')->delete($product->getOriginal('thumbnail'));
            }

            if ($product->isDirty('gallery')) {
                Storage::disk('public')->delete($product->getOriginal('gallery'));
            }

            if ($product->isDirty('file')) {
                Storage::disk('private')->delete($product->getOriginal('file'));
            }
        });
    }
}

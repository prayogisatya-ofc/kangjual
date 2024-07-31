<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function booted() {
        static::deleting(function ($category) {
            if ($category->icon) {
                Storage::disk('public')->delete($category->icon);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('icon')) {
                Storage::disk('public')->delete($category->getOriginal('icon'));
            }
        });
    }
}

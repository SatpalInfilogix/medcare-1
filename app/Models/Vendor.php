<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Vendor extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=[];

    public function assets()
    {
        return $this->hasMany(VendorAsset::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true, // Regenerate slug on name change
                'unique' => true, // Ensure uniqueness
            ]
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'catalog_id'
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function ($products) {
            $products->slug = Str::slug($products->name);
        });

        static::updating(function ($products) {
            $products->slug = Str::slug($products->name);
        });
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function flavor()
    {
        return $this->belongsTo(Flavor::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

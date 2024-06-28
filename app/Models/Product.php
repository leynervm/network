<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name', 'modelo', 'mac', 'ip', 'image', 'stock', 'pricebuy', 'pricesale', 'unit', 'marca_id'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function setModeloAttribute($value)
    {
        $this->attributes['modelo'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }

    public function getImage()
    {
        return Storage::url('images/products/' . $this->image);
    }
}

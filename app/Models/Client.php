<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['document', 'name', 'direccion', 'ubigeo_id'];
    public $timestamps = false;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function ubigeo(): BelongsTo
    {
        return $this->belongsTo(Ubigeo::class);
    }

    public function networks(): HasMany
    {
        return $this->hasMany(Network::class);
    }

    public function recibos(): HasMany
    {
        return $this->hasMany(Recibo::class);
    }
}

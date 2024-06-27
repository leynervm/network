<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Boxnav extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'outs', 'direccion', 'boxnavable_id', 'boxnavable_type'];
    public $timestamps = false;

    const DISPONIBLE = '0';
    const OCUPADO = '1';

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function spliter(): BelongsTo
    {
        return $this->belongsTo(Spliter::class);
    }

    public function portboxnavs(): HasMany
    {
        return $this->hasMany(Portboxnav::class);
    }
}

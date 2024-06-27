<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Spliter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'outs', 'direccion', 'olt_id'];
    public $timestamps = false;

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

    public function olt(): BelongsTo
    {
        return $this->belongsTo(Olt::class);
    }

    public function boxnavs(): HasMany
    {
        return $this->hasMany(Boxnav::class);
    }
}

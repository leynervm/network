<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Portboxnav extends Model
{
    use HasFactory;

    const DISPONIBLE = '0';
    const OCUPADO = '1';


    public $timestamps = false;
    protected $fillable = [
        'code', 'status', 'boxnav_id', 'alias', 'direccion'
    ];

    public function setAliasAttribute($value)
    {
        $this->attributes['alias'] = $value ? trim(mb_strtoupper($value, "UTF-8")) : null;
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] = $value ? trim(mb_strtoupper($value, "UTF-8")) : null;
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function boxnav(): BelongsTo
    {
        return $this->belongsTo(Boxnav::class);
    }

    public function network(): MorphOne
    {
        return $this->morphOne(Network::class, 'networkable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Antena extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'direccion'];
    public $timestamps = false;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function networks(): MorphMany
    {
        return $this->morphMany(Network::class, 'networkable');
    }
}

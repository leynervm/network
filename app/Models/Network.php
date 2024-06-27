<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Network extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'code', 'portnumber', 'descripcion', 'type',
        'price', 'direccion', 'typelocal', 'status', 'client_id',
        'ubigeo_id', 'networkable_id', 'networkable_type',
    ];
    public $timestamps = false;

    const ALQUILADO = 'ALQUILADO';
    const PROPIO = 'PROPIO';

    const TV = 'CABLE TELEVISIÓN';
    const FIBRA = 'FIBRA OPTICA';
    const FIBRA_TV = 'FIBRA OPTICA + CABLE TELEVISIÓN';
    const SATELITAL = 'INTERNET SATELITAL';

    const ACTIVO = '0';
    // const BAJA = '1';
    const SUSPENDIDO = '2';

    const EQUIPO_ALQUILADO = 'ALQUILADO';
    const EQUIPO_VENDIDO = 'VENDIDO';

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] =  trim(mb_strtoupper($value, "UTF-8"));
    }


    public function networkable(): MorphTo
    {
        return $this->morphTo();
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function ubigeo(): BelongsTo
    {
        return $this->belongsTo(Ubigeo::class);
    }

    public function recibos(): HasMany
    {
        return $this->hasMany(Recibo::class);
    }

    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class);
    }

    public function isFibra()
    {
        return $this->type == self::TV || $this->type == self::FIBRA || $this->type == self::FIBRA_TV;
    }

    public function isSatelital()
    {
        return $this->type == self::SATELITAL;
    }

    public function isSuspendido()
    {
        return $this->status == self::SUSPENDIDO;
    }

    public function isActivo()
    {
        return $this->status == self::ACTIVO;
    }

    public function scopeActivos($query)
    {
        return $query->where('status', self::ACTIVO);
    }
}

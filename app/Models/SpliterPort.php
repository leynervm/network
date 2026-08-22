<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpliterPort extends Model
{
    use HasFactory;

    protected $table = 'spliter_ports';
    public $timestamps = false;

    protected $fillable = [
        'spliter_id',
        'port_number',
        'alias',
        'direccion',
    ];

    public function setAliasAttribute($value)
    {
        $this->attributes['alias'] = $value ? trim(mb_strtoupper($value, "UTF-8")) : null;
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] = $value ? trim(mb_strtoupper($value, "UTF-8")) : null;
    }

    public function spliter(): BelongsTo
    {
        return $this->belongsTo(Spliter::class);
    }
}

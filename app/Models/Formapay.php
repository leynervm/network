<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formapay extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'type'];
    public $timestamps = false;

    const EFECTIVO = '0';
    const TRANSFERENCIA = '1';

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function isTransferencia()
    {
        return $this->type == self::TRANSFERENCIA;
    }
}

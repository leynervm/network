<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'month', 'amount', 'codetransferencia', 'detalle', 'formapay_id',
        'paymentable_id', 'paymentable_type'
    ];
    public $timestamps = false;

    public function setCodetransferenciaAttribute($value)
    {
        $this->attributes['codetransferencia'] =  trim(mb_strtoupper($value, "UTF-8"));
    }

    public function setDetalleAttribute($value)
    {
        $this->attributes['detalle'] =  trim(mb_strtoupper($value, "UTF-8"));
    }


    public function paymentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function formapay(): BelongsTo
    {
        return $this->belongsTo(Formapay::class);
    }
}

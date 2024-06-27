<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Recibo extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'vencimiento', 'seriecompleta', 'month', 'amount', 'descuento',
        'total', 'status', 'seriepago_id', 'client_id', 'network_id',
    ];
    public $timestamps = false;

    public function network(): BelongsTo
    {
        return $this->belongsTo(Network::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function seriepago(): BelongsTo
    {
        return $this->belongsTo(Seriepago::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function payment(): MorphOne
    {
        return $this->morphOne(Payment::class, 'paymentable');
    }
}

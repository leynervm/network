<?php

namespace Database\Seeders;

use App\Models\Formapay;
use App\Models\Recibo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recibos = Recibo::all();
        foreach ($recibos as $recibo) {
            $formapay = Formapay::all()->random();

            $recibo->payment()->create([
                'date' => $recibo->date,
                'amount' => $recibo->total,
                'month' => $recibo->month,
                'codetransferencia' => $formapay->isTransferencia() ? Str::random() : null,
                'detalle' => null,
                'formapay_id' => $formapay->id,
            ]);
        }
    }
}

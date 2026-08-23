<?php

namespace Database\Seeders;

use App\Models\Boxnav;
use App\Models\Olt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OltSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $outsOLT = 16;
        $letters = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];

        $olt = Olt::create([
            'name' => 'OLT PRINCIPAL',
            'outs' => $outsOLT
        ]);

        for ($i = 0; $i < $outsOLT; $i++) {
            $spliter = $olt->spliters()->create([
                'name' => 'SPLITER ' . $i + 1,
                'code' => $i + 1,
                'outs' => 16,
                'direccion' => '',
            ]);
        }

        foreach ($olt->spliters as $spliter) {
            // $outsSpliter = 8;
            for ($i = 0; $i < $spliter->outs; $i++) {
                $codeBoxnav = trim($spliter->code) . '-' . $i + 1;
                $boxnav = $spliter->boxnavs()->create([
                    'name' => 'CAJA NAP ' . $codeBoxnav,
                    'code' => $codeBoxnav,
                    'outs' => 8,
                    'direccion' => '',
                    'status' => Boxnav::DISPONIBLE,
                    'splitter_port' => $i + 1,
                ]);
            }

            if (count($spliter->boxnavs) > 0) {
                foreach ($spliter->boxnavs as $boxnav) {
                    for ($i = 0; $i < $boxnav->outs; $i++) {
                        $boxnav->portboxnavs()->create([
                            'code' => 'PORT-' . $i + 1,
                        ]);
                    }
                }
            }
        }
    }
}

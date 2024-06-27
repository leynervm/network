<?php

namespace App\Exports;

use App\Models\Network;
use Maatwebsite\Excel\Concerns\FromCollection;

class NetworksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Network::all();
    }
}

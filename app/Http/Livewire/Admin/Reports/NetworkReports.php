<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\Client;
use Livewire\Component;

class NetworkReports extends Component
{
    public function render()
    {
        $clients = Client::whereHas('networks')->get();
        return view('livewire.admin.reports.network-reports', compact('clients'));
    }
}

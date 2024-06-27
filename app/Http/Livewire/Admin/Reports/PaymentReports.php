<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\Formapay;
use Livewire\Component;

class PaymentReports extends Component
{
    public function render()
    {
        $formapays = Formapay::all();
        return view('livewire.admin.reports.payment-reports', compact('formapays'));
    }
}

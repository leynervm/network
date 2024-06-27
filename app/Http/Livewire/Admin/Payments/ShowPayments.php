<?php

namespace App\Http\Livewire\Admin\Payments;

use App\Models\Payment;
use Livewire\Component;

class ShowPayments extends Component
{
    public function render()
    {
        $payments = Payment::orderBy('month', 'desc')->orderBy('date', 'desc')->paginate();
        return view('livewire.admin.payments.show-payments', compact('payments'));
    }
}

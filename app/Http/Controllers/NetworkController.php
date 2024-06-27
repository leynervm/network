<?php

namespace App\Http\Controllers;

use App\Models\Olt;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    public function ports(Olt $olt)
    {
        return view('network.ports', compact('olt'));
    }
}

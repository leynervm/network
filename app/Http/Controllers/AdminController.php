<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\Olt;
use App\Models\Oltport;
use App\Models\Recibo;
use App\Models\Spliter;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class AdminController extends Controller
{
    public function olts()
    {
        return view('admin.olts.index');
    }

    public function show(Olt $olt)
    {
        $olt->load('ports');
        return view('admin.olts.show', compact('olt'));
    }

    // public function oltports(Olt $olt)
    // {
    //     return view('admin.olts.oltports', compact('olt'));
    // }

    public function boxnavs(Olt $olt, Spliter $spliter)
    {
        return view('admin.olts.spliter', compact('olt', 'spliter'));
    }

    public function antenas()
    {
        return view('admin.antenas.index');
    }

    public function recibos()
    {
        return view('admin.recibos.index');
    }

    public function shownetwork(Network $network)
    {
        $network->load([
            'networkable' => function (\Illuminate\Database\Eloquent\Relations\MorphTo $morphTo) {
                $morphTo->morphWith([
                    \App\Models\Portboxnav::class => ['boxnav.spliter.olt'],
                ]);
            },
        ]);
        return view('admin.recibos.networkrecibos', compact('network'));
    }

    public function reports()
    {
        return view('admin.reports.index');
    }

    public function products()
    {
        return view('admin.products.index');
    }

    public function marcas()
    {
        return view('admin.marcas.index');
    }

    public function payments()
    {
        return view('admin.payments.index');
    }

    public function print(Recibo $recibo)
    {
        $pdf = PDF::setPaper([0, 0, 226.77, 500])->loadView('admin.print.index', compact('recibo'));
        return $pdf->stream();

        // return view('admin.print.index', compact('recibo'));
    }

    public function deletespliter(Spliter $spliter)
    {
        $spliter->delete();
        return redirect()->back();
    }
}

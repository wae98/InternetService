<?php

namespace App\Http\Controllers;

use App\Models\PaymentService;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function payments($id){
        $payments = PaymentService::find($id);

        $pdf = Pdf::loadView('payments.comprobante', compact('payments'));
        return $pdf->download('comprobante '.$payments->serviceprovider->customer->names.'.pdf');
    }
}

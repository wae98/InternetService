<?php

namespace App\Http\Controllers;

use App\Models\PaymentService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function payments($id){
        $payments = PaymentService::find($id);

        $pdf = Pdf::loadView('payments.comprobante', compact('payments'));
        return $pdf->download('comprobante '.$payments->serviceprovider->customer->names.'.pdf');
    }

    public function create($id){
        $bindings = [
            'id' => $id
        ];
        $dateTime = new \DateTime();
        $date_before = new \DateTime();
        $date_last = new \DateTime();
        $price= 0;
        $installation_payment= 0;
        $fecha_actual = $dateTime->format("m");
        $anio = $dateTime->format("Y");
        $last_date = DB::select('SELECT
                                        MAX(PS.DATE) as MAX_DATE,
                                        PS.ID AS PAYMENT_SERVICE_ID
                                        FROM PAYMENT_SERVICES PS
                                        WHERE SERVICE_PROVIDER_ID =  :id
                                        GROUP BY PS.DATE, PS.ID', $bindings);
        $data = DB::select('SELECT S.PRICE, ST.PAYMENT_DATE, S.INSTALLATION_PRICE FROM SERVICE_PROVIDERS SP
                                    INNER JOIN SERVICES S ON SP.SERVICE_ID = S.ID
                                    INNER JOIN CUSTOMERS C ON SP.CUSTOMER_ID = C.ID
                                    INNER JOIN SECTORS ST ON C.SECTOR_ID = ST.id
                                    WHERE SP.ID = :id', $bindings);
        foreach ($data as $value){
            $price =  $value->PRICE;
            $payment_date =  $value->PAYMENT_DATE;
            $installation_payment =  $value->INSTALLATION_PRICE;
        }
        foreach ($last_date as $key){
            $date_before = date("Y-m-d",strtotime($key->MAX_DATE."+ 1 month "));
            $date_last = date("m",strtotime($key->MAX_DATE));
            $PAYMENT_SERVICE_ID = $key->PAYMENT_SERVICE_ID;
        }
        if ($last_date !== null && $last_date == 0){
            if ($fecha_actual == $date_last){
                $payments = PaymentService::find($PAYMENT_SERVICE_ID);
                $pdf = Pdf::loadView('payments.comprobante', compact('payments'));
                return $pdf->download('comprobante '.$payments->serviceprovider->customer->names.'.pdf');
            }else{
                $payments = PaymentService::create(
                    [
                        'date' =>  $date_before,
                        'observations' =>  'SE GENERA EL PAGO DEL MES.',
                        'total' =>  $price,
                        'service_provider_id' =>  $id,
                        'user_id' => Auth::id(),
                    ]
                );
                $pdf = Pdf::loadView('payments.comprobante', compact('payments'));
                return $pdf->download('comprobante '.$payments->serviceprovider->customer->names.'.pdf');
            }
        }
        else{
            $date_intallation= date("Y-m-d", strtotime($anio.$fecha_actual.$payment_date));
            $payments = PaymentService::create(
                [
                    'date' =>  $date_intallation,
                    'observations' =>  'SE GENERA PAGO POR INSTALACION DEL SERVICIO.',
                    'total' =>  $installation_payment,
                    'service_provider_id' =>  $id,
                    'user_id' => Auth::id(),
                ]
            );
            $pdf = Pdf::loadView('payments.comprobante', compact('payments'));
            return $pdf->download('comprobante '.$payments->serviceprovider->customer->names.'.pdf');
        }
    }
}

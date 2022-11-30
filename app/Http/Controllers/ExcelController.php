<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    function __construct()
    {
        $this->middleware('can:reports')->only('PaymentsIndex, CustomerIndex, FailsIndex, ServicesIndex');
    }
    public function PaymentsIndex(){
        return view('payments.report');
    }
    public function payments(Request $request){
        $bindings = [
            'init_date' => $request->init_date,
            'end_date' => $request->end_date,
        ];
        $payments = DB::select('SELECT
                                        S.NAME AS PLAN,
                                        S.PRICE AS PRECIO,
                                        S.DESCRIPTION AS DESCRIPCION,
                                        C.NAMES AS CLIENTE,
                                        C.PHONE_NUMBER AS TELEFONO,
                                        C.ADDRESS AS DIRECCION,
                                        CASE
                                        WHEN SP.STATUS = 1 THEN "Activo"
                                        ELSE "Inactivo"
                                        END as SERVICIO,
                                        PS.DATE AS FECHA_PAGO,
                                        PS.TOTAL,
                                        PS.OBSERVATIONS AS OBSERVACIONES,
                                        U.NAME AS CREADO_POR,
                                        PS.CREATED_AT AS FECHA_REGISTRO
                                    FROM PAYMENT_SERVICES PS
                                    INNER JOIN SERVICE_PROVIDERS SP ON PS.SERVICE_PROVIDER_ID = SP.ID
                                    INNER JOIN USERS U ON PS.USER_ID = U.ID
                                    INNER JOIN CUSTOMERS C ON C.ID = SP.CUSTOMER_ID
                                    INNER JOIN SERVICES S ON S.ID = SP.SERVICE_ID
                                    WHERE PS.DATE >= :init_date AND PS.DATE <= :end_date
                                ', $bindings);
        return FastExcel($payments)->download('Pagos realizados de fecha '.$request->init_date .' - '.$request->end_date.'.xlsx');
    }
    public function CustomersIndex(){
        return view('customers.report');
    }
    public function customers(Request $request){
        $customers = Customer::leftJoin('sectors', 'customers.sector_id','sectors.id')
            ->leftJoin('users', 'customers.user_id', 'users.id')
            ->select(
                'customers.names as CLIENTE',
                'customers.phone_number as TELEFONO',
                'customers.address as DIRECCION',
                'customers.references_address as REFERENCIAS',
                'sectors.name as SECTOR',
                'users.name  as CREADO_POR',
                'customers.created_at as FECHA_CREACION'
            )->whereBetween('customers.created_at', [$request->init_date,$request->end_date])->get();
        return FastExcel($customers)->download('Cartera de Clientes de  fecha '.$request->init_date .' - '.$request->end_date.'.xlsx');
    }
    public function ServicesIndex(){
        return view('servicesproviders.report');
    }

    public function FailsIndex(){
        return view('fails.report');
    }


    public function services(Request $request){
        $bindings = [
            'init_date' => $request->init_date,
            'end_date' => $request->end_date,
        ];
        $payments = DB::select('SELECT
                                            S.NAME AS PLAN,
                                            S.PRICE AS PRECIO,
                                            S.DESCRIPTION AS DESCRIPCION,
                                            ST.NAME AS SECTOR,
                                            C.NAMES AS CLIENTE,
                                            C.PHONE_NUMBER AS TELEFONO,
                                            C.ADDRESS AS DIRECCION,
                                            M.UBICATION AS UBICACION_MUFA,
                                            M.NUMBER AS NUMERO_MUFA,
                                            CASE
                                            WHEN M.IS_CABLE_ONU = 1 THEN "SI"
                                            ELSE "NO"
                                            END as CABLE_ONU,
                                            M.POSITION_ONU_OLT,
                                            M.NUMBER_CONEXION AS NUMBER_CONEXION_MUFA,
                                            CASE
                                            WHEN M.STATUS = 1 THEN "Activo"
                                            ELSE "Inactivo"
                                            END as STATUS_MUFA,
                                            CASE
                                            WHEN SP.STATUS = 1 THEN "Activo"
                                            ELSE "Inactivo"
                                            END as SERVICIO,
                                            SP.OBSERVATIONS AS OBSERVACIONES,
                                            U.NAME AS CREADO_POR,
                                            SP.CREATED_AT
                                    FROM SERVICE_PROVIDERS SP
                                    INNER JOIN USERS U ON SP.USER_ID = U.ID
                                    INNER JOIN CUSTOMERS C ON C.ID = SP.CUSTOMER_ID
                                    INNER JOIN SECTORS ST ON ST.ID = C.SECTOR_ID
                                    INNER JOIN SERVICES S ON S.ID = SP.SERVICE_ID
                                    INNER JOIN MUFAS M ON M.ID = SP.MUFA_ID
                                    WHERE SP.CREATED_AT >= :init_date AND SP.CREATED_AT <= :end_date
                                ', $bindings);
        return FastExcel($payments)->download('Servicios Adquiridos de fecha '.$request->init_date .' a '.$request->end_date.'.xlsx');
    }

    public function fails(Request $request){
        $bindings = [
            'init_date' => $request->init_date,
            'end_date' => $request->end_date,
        ];
        $payments = DB::select('SELECT
                                        S.NAME AS PLAN,
                                        S.PRICE AS PRECIO,
                                        S.DESCRIPTION AS DESCRIPCION,
                                        ST.NAME AS SECTOR,
                                        F.DATE_REPORT AS FECHA_REPORTE,
                                        F.DATE_REPAIR AS FECHA_REPARACION,
                                        F.OBSERVATIONS AS OBSERVACIONES_FALLA,
                                        CASE
                                        WHEN M.STATUS = 1 THEN "EN PROCESO"
                                        ELSE "RESUELTO"
                                        END as CABLE_ONU,
                                        C.NAMES AS CLIENTE,
                                        C.PHONE_NUMBER AS TELEFONO,
                                        C.ADDRESS AS DIRECCION,
                                        M.UBICATION AS UBICACION_MUFA,
                                        M.NUMBER AS NUMERO_MUFA,
                                        CASE
                                        WHEN M.IS_CABLE_ONU = 1 THEN "SI"
                                        ELSE "NO"
                                        END as CABLE_ONU,
                                        M.POSITION_ONU_OLT,
                                        M.NUMBER_CONEXION AS NUMBER_CONEXION_MUFA,
                                        CASE
                                        WHEN M.STATUS = 1 THEN "Activo"
                                        ELSE "Inactivo"
                                        END as STATUS_MUFA,
                                        CASE
                                        WHEN SP.STATUS = 1 THEN "Activo"
                                        ELSE "Inactivo"
                                        END as SERVICIO,
                                        SP.OBSERVATIONS AS OBSERVACIONES,
                                        U.NAME AS CREADO_POR,
                                        F.CREATED_AT AS "FECHA DE CREACION "
                                    FROM SERVICE_PROVIDERS SP
                                    INNER JOIN FAILS F ON SP.ID = F.SERVICE_PROVIDER_ID
                                    INNER JOIN USERS U ON SP.USER_ID = U.ID
                                    INNER JOIN CUSTOMERS C ON C.ID = SP.CUSTOMER_ID
                                    INNER JOIN SECTORS ST ON ST.ID = C.SECTOR_ID
                                    INNER JOIN SERVICES S ON S.ID = SP.SERVICE_ID
                                    INNER JOIN MUFAS M ON M.ID = SP.MUFA_ID
                                    WHERE F.CREATED_AT >= :init_date AND F.CREATED_AT <= :end_date
                                ', $bindings);
        return FastExcel($payments)->download('Fallas reportadas de fecha '.$request->init_date .' a '.$request->end_date.'.xlsx');
    }
}


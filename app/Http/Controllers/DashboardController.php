<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Empleado;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.index');
    }
}

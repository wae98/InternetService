<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE</title>
</head>
<style>
    ul {
        list-style-type: none;
    }

    .titulo {
        font-size: 1.3rem;
        font-weight: bold;
        color: rgb(58, 58, 62);
        font-family: Arial, Helvetica, sans-serif;
    }

    li {
        color: rgb(58, 58, 62);
        font-family: Arial, Helvetica, sans-serif;
    }

    h2 {
        text-align: center;
        color: #063f06;
    }

    h3 {
        text-align: center;
        color: #063f06;
    }

    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 95%;
    }

    .customers td,
    .customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table {
        border-collapse: collapse;
        border: none;
        border-spacing: 0;
        width: 95%;
        margin: auto;
    }

    td {
        padding: 0;
    }

    .customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .customers tr:hover {
        background-color: #ddd;
    }

    .customers th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #649EBD;
        color: white;
    }

    .encabezadoP {
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 0.8rem;
        text-align: left;
        background-color: #091160;
        color: white;
    }
    .encabezadoM {
        font-size: 0.6rem;
    }
    .encabezadoR {
        font-size: 0.8rem;
    }
</style>

<body>
<table>
        <tr>
            <td>
                <ul>
                    <li class="titulo">MOMOSNET TV</li>
                    <li class="encabezadoR"><b>Tel: 44883004 - 77365196</b></li>
                    <li class="encabezadoR"><b>Comprobante de Pago</b></li>
                </ul>
            </td>
            <td>
                <ul>
                    <li class="encabezadoR"><b>Numero: </b>TKT-{{$payments->id}} </li>
                    <li class="encabezadoR"><b>Fecha:</b> {{date("d/m/Y", strtotime($payments->date))}} </li>
                    <li class="encabezadoR"><b>Emisor:</b>  {{$payments->user->name}} </li>
                </ul>
            </td>
        </tr>
</table>
<table class="customers">
    <tr>
        <td class="encabezadoP">Datos del Cliente</td>
    </tr>
</table>
<table class="customers">

        <tr>
            <td class="encabezadoM"><strong>Nombres y Apellidos: </strong>{{$payments->serviceprovider->customer->names}}</td>
            <td class="encabezadoM"><strong>Direccion: </strong> {{$payments->serviceprovider->customer->address}}</td>
            <td class="encabezadoM"><strong>Telefono: </strong> {{$payments->serviceprovider->customer->phone_number}}</td>
        </tr>

</table>
<br>
<table class="customers">
    <tr>
        <td class="encabezadoP">Plan</td>
        <td class="encabezadoP">Descripcion</td>
        <td class="encabezadoP">Subtotal</td>
    </tr>

        <tr>
            <td class="encabezadoM">{{$payments->serviceprovider->service->name}}</td>
            <td class="encabezadoM">{{$payments->serviceprovider->service->description}}</td>
            <td class="encabezadoM">Q. {{number_format($payments->total,2)}}</td>

        </tr>

    <tr>
        <td class="encabezadoM" colspan="2"><b>Total</b></td>
        <td class="encabezadoM" ><b>Q. {{number_format($payments->total,2)}}</b></td>
    </tr>
</table>
<center><p><b>Gracias por su pago</b></p></center>
<center><span>Pago realizado el dia {{date("d/m/Y", strtotime($payments->created_at))}}</span></center>
</body>

</html>

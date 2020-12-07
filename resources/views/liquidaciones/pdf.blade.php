<!DOCTYPE html>
<html lang="es">

<head>
    <title>Liquidación #{{ $invoice->id }}</title>
</head>

<style>
    .logo-container__info {
        float: left;
    }

    .logo-container__dates {
        float: right;
    }

    /*  */
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<body>

    <div>
        <div class="logo-container">
            <div class="logo-container__info">
                ### REMATES ISI ### <br>
                Rodriguez Peña 6342 <br>
                7600 - Mar del Plata
            </div>
            <div class="logo-container__dates">
                Fecha: {{ date('d/m/Y') }} <br>
                Liquidación #{{ $invoice->id }}
            </div>
        </div>

        <br><br><br>
        <hr>
        <br>
        <p>
            Datos generales de la liquidación #{{ $invoice->id }}
        </p>
        <table>
            <tr>
                <th>Fecha</th>
                <th>Tipo de liquidación</th>
                <th>{{ ucfirst($invoice->type_invoice) }}</th>
            </tr>
            <tr>
                <td>{{ date('d/m/Y', strtotime($invoice->created_at)) }}</td>
                <td>{{ ucfirst($invoice->type_invoice) }}</td>
                <td>{{ ucfirst($invoice->user->name) }} {{ ucfirst($invoice->user->lastname) }}</td>
            </tr>
        </table>
        <br>
        <p>
            Información sobre la mercadería vendida y su precio final.
        </p>
        <table>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Importe</th>
            </tr>
            @foreach ($invoice->products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ ucfirst($product->description) }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>${{ $product->pivot->total }}</td>
            </tr>
            @endforeach
        </table>
        <br>
        <table>
            <tr>
                <th>Comisión</th>
                <th>Seña</th>
                <th>Importe total y final</th>
            </tr>
            <tr>
                <td>${{ $invoice->commission }}</td>
                <td>${{ $invoice->partial_payment }} </td>
                <td style="text-align: center;"> <strong style="font-size: 30px;"> ${{ $invoice->total }}</strong></td>
            </tr>
        </table>
    </div>

</body>

</html>
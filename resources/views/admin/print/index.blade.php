<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TICKET {{ $recibo->seriecompleta }}</title>
</head>
<style>

    @page {
        padding: 0;
        margin: 0.35mm;
    }

    .page {
        font-size: 10px;
        padding: 10px;
        font-family: 'Arial';
    }

    .page h1 {
        font-size: 14px;
        text-align: center;
        line-height: 0.6rem;
    }
</style>

<body class="page">
    <h1>RECIBO</h1>
    <h1>{{ $recibo->seriecompleta }}</h1>

    <p>CLIENTE : <span>[{{ $recibo->client->document }}]</span> {{ $recibo->client->name }}</p>
  
    <p>DIRECCIÓN : {{ $recibo->network->direccion }}</p>


    <p>MONTO : {{ number_format($recibo->amount, 2, '.', ', ') }}</p>

    <p>VENCE : {{ formatDate($recibo->venimiento, 'DD MMMM Y') }}</p>

    <p>SERVICIO : {{ $recibo->network->type }} - {{ $recibo->network->descripcion }}</p>

    @if ($recibo->payment)
        <h1>PAGADO</h1>
        <p>FECHA PAGO :{{ formatDate($recibo->payment->date, 'DD MMMM Y hh:mm A') }}</p>
        <p>FORMA PAGO :{{ $recibo->payment->formapay->name }}</p>
        <p>CODIGO TRANSF :{{ $recibo->payment->codetransferencia }}</p>
        <p>DETALLE :{{ $recibo->payment->detalle }}</p>
    @endif
</body>

</html>

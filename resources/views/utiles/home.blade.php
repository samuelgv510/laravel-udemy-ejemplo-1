@extends('../layouts.frontend')
@section('content')
    <h1>Útiles</h1>
    <ul>
        <li>
            <a href="{{ route('utiles.pdf') }}">Reporte PDF</a>
        </li>
        <li>
            <a href="{{ route('utiles.excel') }}">Reporte Excel</a>
        </li>
        <li>
            <a href="{{ route('utiles.cliente_rest') }}">Cliente Rest con guzzlehttp</a>
        </li>
        <li>
            <a href="{{ route('utiles.cliente_soap') }}">Cliente SOAP</a>
        </li>
    </ul>
@endsection

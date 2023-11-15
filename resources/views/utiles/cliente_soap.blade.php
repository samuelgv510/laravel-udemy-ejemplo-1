@extends('../layouts.frontend')
@section('title', 'Útiles')
@section('content')
    <main class="container">
        <h1>Cliente SOAP</h1>
        <x-flash />
        {{-- <h2>Respuesta: <strong>{{ $datos }}</strong></h2> --}}
        {{-- <?php echo '<pre>';
        print_r($datos); ?> --}}
        <table class="table table-boredered">
            <thead>
                <tr>
                    <th>sISOCode</th>
                    <th>sName</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos->ListOfCountryNamesByCodeResult->tCountryCodeAndName as $dato)
                    <tr>
                        <td><?php echo $dato->sISOCode; ?></td>
                        <td><?php echo $dato->sName; ?></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection

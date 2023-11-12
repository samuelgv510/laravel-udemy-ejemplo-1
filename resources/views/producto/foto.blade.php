@extends('../layouts.frontend')
@section('content')
    <h1>Fotos del producto: {{ $producto->nombre }}</h1>
    <x-flash />
    <hr>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fotos as $foto)
                    <tr>
                        <td>
                            <img src="{{ asset('upload/productos/' . $foto->nombre) }}" alt="" width="200"
                                height="200">
                        </td>
                        <td>
                            <a href="javascript:void(0);"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

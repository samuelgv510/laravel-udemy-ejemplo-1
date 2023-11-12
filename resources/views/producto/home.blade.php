@extends('../layouts.frontend')
@section('content')
    <h1>BD MySQL</h1>
    <x-flash />
    <p class="d-flex justify-content-end">
        <a href="{{ route('producto.add') }}" class="btn btn-success"><i class="fas fa-check"></i>Crear</a>
    </p>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Fotos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>
                            <a href="">{{ $producto->categoria->nombre }}</a>
                        </td>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ number_format($producto->precio, 0, '', '.') }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ substr($producto->descripcion, 0, 50) }}...</td>
                        <td>{{ Helper::invierte_fecha($producto->fecha) }}</td>
                        <td>
                            <a href=""><i class="fas fa-camera"></i></a>
                        </td>
                        <td>{{ $producto->nombre }}</td>
                        <td>
                            <a href=""><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

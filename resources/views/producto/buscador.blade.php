@extends('../layouts.frontend')
@section('content')
    <h1>BD MySQL Buscador</h1>
    <h3>Resultados para el término: <strong>{{ $b }}</strong></h3>
    <x-flash />
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6">
            <form name="form_buscador" action="{{ route('producto.buscador') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar..." name="b" id="b"
                        value="{{ $b }}">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="buscador();">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
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
                            <a
                                href="{{ route('producto.categoria', ['id' => $producto->categoria->id]) }}">{{ $producto->categoria->nombre }}</a>
                        </td>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ number_format($producto->precio, 0, '', '.') }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ substr($producto->descripcion, 0, 50) }}...</td>
                        <td>{{ Helper::invierte_fecha($producto->fecha) }}</td>
                        <td>
                            <a href="{{ route('producto.fotos', ['id' => $producto->id]) }}"><i
                                    class="fas fa-camera"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('producto.edit', ['id' => $producto->id]) }}"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);"
                                onclick="confirmAlert('Realmente desea eliminar este registro?','{{ route('producto.delete', ['id' => $producto->id]) }}')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

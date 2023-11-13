@extends('../layouts.frontend')
@section('content')
    <h1>BD MySQL</h1>
    <ul>
        <li>
            <a href="{{ route('categoria.inicio') }}">Categorías</a>
        </li>
        <li>
            <a href="{{ route('producto.inicio') }}">Productos</a>
        </li>
        <li>
            <a href="{{ route('producto.paginacion') }}">Paginación</a>
        </li>
        <li>
            <a href="{{ route('producto.buscador') }}">Buscador Interno</a>
        </li>
    </ul>
@endsection

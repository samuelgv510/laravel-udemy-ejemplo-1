@extends('../layouts.frontend')
@section('content')
    <h1>Formularios</h1>
    <ul>
        <li>
            <a href="{{ route('formulario.simple') }}">Simple</a>
        </li>
        <li>
            <a href="{{ route('formulario.flash') }}">Flash</a>
        </li>
        <li>
            <a href="">Upload</a>
        </li>
    </ul>
@endsection

@extends('../layouts.frontend')
@section('content')
    <h1>E-mail</h1>
    <a href="{{ route('email.enviar') }}">Enviar</a>
    <x-flash />
@endsection

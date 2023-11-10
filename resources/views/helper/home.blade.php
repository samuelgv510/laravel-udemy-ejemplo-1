@extends('../layouts.frontend')
@section('content')
    <h1>Helper</h1>
    {{ Str::slug('mi muñeca me habló') }}
    <hr>
    <h3>{{ $version }}</h3>
@endsection

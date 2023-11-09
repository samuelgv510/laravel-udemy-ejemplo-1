@extends('../layouts.frontend')
@section('content')
    <h1>Simple</h1>
    <form action="{{ route('formulario.simple.post') }}" method="POST" name="form">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="correo">E-Mail</label>
            <input type="text" name="correo" id="correo" class="form-control">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <hr>
        {{ csrf_field() }}
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
@endsection

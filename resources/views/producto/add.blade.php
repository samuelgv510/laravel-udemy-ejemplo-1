@extends('../layouts.frontend')
@section('content')
    <h1>BD MySQL</h1>
    <x-flash />
    <form action="{{ route('producto.add.post') }}" method="POST">
        <div class="form-group">
            <label for="categoria_id">Categoria:</label>
            <select name="categoria_id" id="categoria_id" class="form-control">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio') }}"
                onkeypress="return soloNumeros(event)">
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <select name="stock" id="stock" class="form-control">
                @for ($i = 1; $i <= 100; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
        </div>
        <hr>
        {{ csrf_field() }}
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
@endsection

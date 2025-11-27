<!-- Javier Hernandez Gonzalez -->
@if ($errors)
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
@endif

<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <label for="nombre-producto">Nombre:</label>
    <input type="text" name="nombre-producto" id="nombre-producto">
    <label for="descripcion-producto">Descripción:</label>
    <input type="text" name="descripcion-producto" id="descripcion-producto">
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio">
    <label for="unidades">Unidades:</label>
    <input type="number" name="unidades" id="unidades">
    <label for="categoria-producto">Categoría:</label>
    <select name="categoria-producto" id="categoria-producto">
        <option value="Electrónica">Electrónica</option>
        <option value="Deporte">Deporte</option>
    </select>
    <button type="submit">Guardar producto</button>
</form>

@if (session()->has('unidades'))
<h3>
    Se han registrado
    {{ session('unidades') }}
    unidades correctamente
</h3>

@endif
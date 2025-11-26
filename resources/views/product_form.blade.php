{{-- Vista del formulario para crear productos --}}
{{-- El formulario envía los datos al método store del ProductController --}}
<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <label for="nombre-producto">Nombre del producto:</label>
    <input type="text" name="nombre-producto" id="nombre-producto" maxlength="50" required>
    <br>
    <label for="descripcion-producto">Descripción:</label>
    <input type="text" name="descripcion-producto" id="descripcion-producto" required>
    <br>
    <label for="categoria-producto">Categoría:</label>
    <select name="categoria-producto" id="categoria-producto" required>
        <option value="Informática">Informática</option>
        <option value="Bricolaje">Bricolaje</option>
    </select>
    <br>
    <label for="precio-producto">Precio:</label>
    <input type="number" name="precio-producto" id="precio-producto" min="1" required>
    <br>
    <button type="submit">Guardar producto</button>
</form>
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
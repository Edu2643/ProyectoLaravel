<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Cliente</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Cliente" required>
    </div>
    <div class="mb-3">
        <label for="rfc" class="form-label">RFC del Cliente</label>
        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC del Cliente" required>
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección del Cliente</label>
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección del Cliente" required>
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono del Cliente</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono del Cliente" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email del Cliente</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email del Cliente" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cliente</button>
</form>
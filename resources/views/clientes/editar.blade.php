
                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Cliente</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="rfc" class="form-label">RFC del Cliente</label>
                        <input type="text" class="form-control" id="rfc" name="rfc" value="{{ $cliente->rfc }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección del Cliente</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono del Cliente</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email del Cliente</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            
<style>
    label {
    color: #ffffff; /* Color blanco */
}
</style>
<form action="{{ route('perfiles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Perfil</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Perfil" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Perfil</button>
</form>
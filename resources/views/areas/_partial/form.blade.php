@csrf
<div class="form-group">
  <label>Descrição</label>
  <input name="description" value="{{ isset($area) ? $area->description : '' }}" type="text" class="form-control" placeholder="Entre com uma descrição">
</div>
<div class="form-group">
  <label>Cor</label>
  <input name="color" value="{{ isset($area) ? $area->color : '' }}" type="text" class="form-control" placeholder="Entre com uma cor">
</div>

<div class="row mt-3">
  <div class="col-12 col-md-6">
      <a href="{{ route('areas.index') }}" class="btn btn-danger btn-block">Cancelar</a>
  </div>
  <div class="col-12 col-md-6">
      <button type="submit" class="btn btn-success btn-block">Salvar</button>
  </div>
</div>

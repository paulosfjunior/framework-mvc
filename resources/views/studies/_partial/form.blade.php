@csrf
<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-6 col-6">
        <label class="control-label">Descrição</label>
        <input type="text" name="description" value="@if(isset($study)) {{ $study->description }} @else {{ old('description') }}  @endif" class="form-control">
        @if($errors->has('description'))
        <small class="form-text text-danger">
            {{ $errors->first('description') }}
        </small>
        @endif
    </div>

    <div class="col-md-6 col-lg-6 col-sm-6 col-6">
        <label class="control-label">Área</label>
        <select name="area_id" class="form-control">
            @if(isset($areas))
            @foreach($areas as $area)
            @if(isset($study) && $study->area_id == $area->id)
            <option value="{{ $area->id }}" selected>
                {{ $area->description }}
            </option>
            @else
            <option value="{{ $area->id }}">
                {{ $area->description }}
            </option>
            @endif
            @endforeach
            @else
            <option value="" selected>Nenhuma área encontrada</option>
            @endif
        </select>
    </div>

</div>

<div class="row mt-3">
    <div class="col-md-6 col-lg-6 col-sm-6 col-6">
        <label class="control-label">Data inicial</label>
        <input type="date" name="date_init" class="form-control" value="{{ isset($study) ? $study->date_init : '' }}">
    </div>

    <div class="col-md-6 col-lg-6 col-sm-6 col-6">
        <label class="control-label">Data final</label>
        <input type="date" name="date_finish" class="form-control" value="{{ isset($study) ? $study->date_finish : '' }}">
    </div>

</div>

<div class="row mt-3">
    <div class="col-md-6 col-sm-6 col-lg-6 col-6">
        <label class="control-label">Situação</label>
        <select name="status" class="form-control">
            <option value="Finalizado" {{ isset($study) && $study->status == 'Finalizado' ? 'selected' : ''  }}>Finalizado
            </option>
            <option value="Em atraso" {{ isset($study) && $study->status == 'Em atraso' ? 'selected' : ''  }}>Em atraso</option>
            <option value="Em andamento" {{ !isset($study) ? "selected" : "" }} {{ isset($study) && $study->status == 'Em andamento' ? 'selected' : ''  }}>Em andamento</option>
        </select>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        <a href="{{ route('estudos.index') }}" class="btn btn-danger btn-block">Cancelar</a>
    </div>
    <div class="col-12 col-md-6">
        <button type="submit" class="btn btn-success btn-block">Salvar</button>
    </div>
</div>

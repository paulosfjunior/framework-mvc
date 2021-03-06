@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Listagem de Áreas
    </h1>
    <h2>
        <a href="{{ route('areas.create') }}">
            <button type="button" class="btn btn-primary">Cadastrar</button>
        </a>
    </h2>

    <table class="table">
        <thead>
          <tr class="row">
            <th class="col">ID</th>
            <th class="col">Descrição</th>
            <th class="col">Cor</th>
            <th class="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($areas as $area)
                <tr class="row">
                    <th class="col">{{ $area->id }}</th>
                    <td class="col">{{ $area->description }}</td>
                    <td class="col">{{ $area->color }}</td>
                    <td class="col">
                        <div class="row">
                            <div class="col-12 col-md-6 p-0 pr-1 pb-1">
                                <a href="{{ route('areas.edit', ['area' => $area->id]) }}" class="btn btn-warning btn-block">Editar</a>
                            </div>
                            <div class="col-12 col-md-6 p-0 pr-1 pb-1">
                                <form action="{{ route('areas.destroy', ['area' => $area->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger  btn-block">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $areas->links() }}
</div>
@endsection

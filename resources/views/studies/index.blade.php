@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Listagem de Estudos
    </h1>
    <h2>
        <a href="{{ route('estudos.create') }}">
            <button type="button" class="btn btn-primary">Cadastrar</button>
        </a>
    </h2>

    <table class="table">
        <thead>
          <tr class="row">
            <th class="col">ID</th>
            <th class="col">Descrição</th>
            <th class="col">Status</th>
            <th class="col">Area</th>
            <th class="col">Data Inicial</th>
            <th class="col">Data Final</th>
            <th class="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($studies as $estudo)
                <tr class="row">
                    <td class="col">{{ $estudo->id }}</th>
                    <td class="col">{{ $estudo->description }}</td>
                    <td class="col">{{ $estudo->status }}</td>
                    <td class="col">{{ $estudo->area_id }}</td>
                    <td class="col">{{ $estudo->date_init }}</td>
                    <td class="col">{{ $estudo->date_finish }}</td>
                    <td class="col">
                        <div class="row">
                            <div class="col-12 col-md-6 p-0 pr-1 pb-1">
                                <a href="{{ route('estudos.edit', ['estudo' => $estudo->id]) }}" class="btn btn-warning btn-block">Editar</a>
                            </div>
                            <div class="col-12 col-md-6 p-0 pr-1 pb-1">
                                <form action="{{ route('estudos.destroy', ['estudo' => $estudo->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-block">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $studies->links() }}
</div>
@endsection

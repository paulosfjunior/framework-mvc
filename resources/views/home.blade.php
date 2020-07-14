@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row text-center d-flex justify-content-around text-white">
                        <div class="card col-md-3 bg-danger m-1">
                            <div class="card-body">
                                <h5 class="card-title">Estudos em Atraso</h5>
                                <p class="card-text">{{ $estudos['Em atraso'] ?? 0 }}</p>
                            </div>
                        </div>
                        <div class="card col-md-3 bg-primary m-1">
                            <div class="card-body">
                                <h5 class="card-title">Estudos em Andamento</h5>
                                <p class="card-text">{{ $estudos['Em andamento'] ?? 0 }}</p>
                            </div>
                        </div>
                        <div class="card col-md-3 bg-success m-1">
                            <div class="card-body">
                                <h5 class="card-title">Estudos Finalizados</h5>
                                <p class="card-text">{{ $estudos['Finalizado'] ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <canvas class="mt-4" id="grafico"></canvas>
                    <script>
                        var ctx = document.getElementById('grafico').getContext('2d');
                        var titulos = <?php echo '["' . implode('", "', array_keys($estudos) ) . '"]' ?>;
                        var estudos = <?php echo '["' . implode('", "', $estudos) . '"]' ?>;
                        var dados = {};
                        var label = [];
                        var valor = [];
                        var cor = []
                        for (const t of titulos) {
                            label.push(t);
                            switch (t) {
                                case 'Finalizado':
                                    tCor = 'rgba(50, 250, 50, 0.75)';
                                    break;
                                case 'Em andamento':
                                    tCor = 'rgba(50, 50, 250, 0.75)';
                                    break;
                                case 'Em atraso':
                                    tCor = 'rgba(250, 50, 50, 0.75)';
                                    break;
                                default:
                                    tCor = 'rgba(0, 0, 0, 0.75)';
                            }
                            cor.push(tCor);
                        }
                        for (const e of estudos) {
                            valor.push(e);    
                        }
                        dados['labels'] = label;
                        dados['datasets'] = [{data: valor, backgroundColor: cor}];
                        var chart = new Chart(ctx, {
                            type: 'doughnut',
                            data: dados,
                            options: {
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts_manutencao.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Equipamento</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Equipamento</h5>
                </div>
                <div class="card-body">
                    <p>ID : {{$equipment->id}}</p>
                    <p>Nome : {{$equipment->name}}</p>
                    <p>Destino : {{$equipment->destination->name ?? ''}}</p>
                    <p>Área : {{$equipment->area->name ?? ''}}</p>
                    <p>Marca : {{$equipment->make}}</p>
                    <p>Modelo : {{$equipment->model}}</p>
                    <p>Tipo : {{$equipment->type->name}}</p>
                    <p>Ano : {{$equipment->year}}</p>
                    <p>Serial : {{$equipment->serial}}</p>
                    <p>Chassis : {{$equipment->chassis}}</p>
                    <p>Estado : @if($equipment->status == 1) <span class="badge bg-success">Disponível</span> @else <span class="badge bg-danger">Indisponível</span> @endif</p>
                    
                    <hr>

                    <h5 class="card-title">Disponibilidade</h5>

                    <p>Tempo de paralização total : {{$time_total}}Horas</p>
                    <p>Tempo de paralização este ano : {{$time_y}}Horas</p>
                    <p>Tempo de paralização este mês : {{$time_m}}Horas</p>
                    <p>Tempo de paralização hoje : {{$time_t}}Horas</p>
                    <p>Nº de MCSCR : {{count($equipment->mcscr)}}</p>

                    <hr>

                    <h5 class="card-title">Custos envolvidos neste Equipamento</h5>

                    <p>Total Custo Mão de Obra : {{$equipment->mcscr->sum('custo_mao_obra')}} MT</p>
                    <p>Total Custo Material : {{$equipment->mcscr->sum('custo_material')}} MT</p>
                  

                    <hr>

                    <div class="table-responsive">
                        <table id="myTable" class="table display" >
                            <thead>
                                <tr>
                                    {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                    <th style="width:10%">Estado</th>
                                    <th style="width:10%">Aberto Em</th>
                                    <th style="width:10%">Fechado Em</th>
                                    <th style="width:10%">Tempo paralisado</th>
                                    <th style="width:15%">Motivo</th>
                                    <th style="width:15%">Solução</th>
                                    <th style="width:10%">Custo Mão de Obra</th>
                                    <th style="width:10%">Custo Material</th>
                                    <th>{{__('text.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipment->mcscr as $item)
                                    <tr>
                                        {{-- <td>{{$item->id}}</td> --}}
                                        <td>@if ($item->status == 0) <span class="badge bg-danger">Em execução</span> @else <span class="badge bg-success">Terminado</span> @endif</td>
    
                                        <td>{{date('d-m-Y H:m:s',strtotime($item->open_at)) }}</td>
                                        <td>{{date('d-M-Y H:m:s',strtotime($item->close_at))}}</td>
                                        @if ($item->close_at == null)
                                        <?php
                                            $created_at = strtotime($item->open_at);
                                            $closed_at = strtotime(Date::now());
    
                                            $time = $closed_at - $created_at;
    
    
                                        ?>
                                        <td style="color:red">{{round($time/3600, 1);  }}Horas({{round($time/60, 1);  }}Minutos)</td>
                                        @else
                                        <?php
                                        $created_at = strtotime($item->open_at);
                                        $closed_at = strtotime($item->close_at);
    
                                        $time = $closed_at - $created_at;
    
    
                                        ?>
                                        <td style="color:red">{{round($time/3600, 1);  }}Horas({{round($time/60, 1);  }}Minutos)</td>
                                        @endif
                                       
    
    
                                        
                                        <td>{{$item->motivo}}</td>
                                        <td>{{$item->solucao}}</td>
                                        <td>{{$item->custo_mao_obra}} MT</td>
                                        <td>{{$item->custo_material}} MT</td>
                                        <td class="table-action">
                                            @if ($item->status == 0)
                                                <a href="{{URL::to('/mcscr/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                            @endif
                                            
                                            <a href="{{URL::to('/mcscr/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                            {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                                        </td> 
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <h5 class="card-title">Custos Envolvidos no Equipamento</h5>
                                        <h6 class="card-subtitle text-muted">Custos de Mão de Obra x Custos de Material.</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="chartjs-dashboard-pie2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-12 col-lg-6">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <h5 class="card-title">MCSCR por Dia</h5>
                                        <h6 class="card-subtitle text-muted">MCSCR registrados por dia para cada.</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="chartjs-dashboard-line"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
     --}}
                            <div class="col-12 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">MCSCR por Mês</h5>
                                        <h6 class="card-subtitle text-muted">MCSCR registrados por mês durante corrente ano.</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="chartjs-dashboard-bar2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Pie chart
    var maoobra = @json($equipment->mcscr->sum('custo_mao_obra'));
    var material = @json($equipment->mcscr->sum('custo_material'));
    new Chart(document.getElementById("chartjs-dashboard-pie2"), {
        type: "pie",
        data: {
            labels: ["Mão de obra", "Material"],
            datasets: [{
                data: [maoobra, material ],
                backgroundColor: [
                    window.theme.primary,
                    window.theme.warning,
                   
                ],
                borderWidth: 5
            }]
        },
        options: {
            responsive: !window.MSInputMethodContext,
            maintainAspectRatio: false,
            legend: {
                display: true
            },
            cutoutPercentage: 75
        }
    });
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    // Bar chart
   
    new Chart(document.getElementById("chartjs-dashboard-bar2"), {
        type: "bar",
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Otu", "Nov", "Dez"],
            datasets: [{
                label: "Este ano",
                backgroundColor: window.theme.primary,
                borderColor: window.theme.primary,
                hoverBackgroundColor: window.theme.primary,
                hoverBorderColor: window.theme.primary,
                data: [<?php echo $dados_graficobarra ?>],
                barPercentage: .75,
                categoryPercentage: .5
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 20
                    }
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    }
                }]
            }
        }
    });
    });
    </script>
@endsection
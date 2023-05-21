@extends('manutencao_areas.layouts_area_manutencao.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Tipo Equipamento</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tipo de Equipamento</h5>
                </div>
                <div class="card-body">
                   <div class="row">
                    <div class="col">
                        <p>Nome : {{$type->name}}</p>
                        <p>Número de Equipamentos : {{count($type->equipment->where('area_id',Auth::user()->role_id))}}</p>
                        <p style="color:green">Equipamentos Disponíveis : {{count($type->equipment->where('area_id',Auth::user()->role_id)->where('status',1))}}</p>
                        <p style="color:red">Equipamentos Indisponíveis: {{count($type->equipment->where('area_id',Auth::user()->role_id)->where('status',0))}}</p>
                    </div>
                    <div class="col">

                        <p>Percentagem disponibilidade:</p>
                        @if (count($type->equipment->where('area_id',Auth::user()->role_id))>0)
                        <h2>{{round(count($type->equipment->where('area_id',Auth::user()->role_id)->where('status',1))*100/count($type->equipment->where('area_id',Auth::user()->role_id)),2)  }} %</h2>
                        @else
                           <h2>0%</h2>
                        @endif
                        
                    </div>
                   </div>
                    
                  <hr>
                  <div class="table-responsive">
                    <table id="myTable" class="table display" >
                        <thead>
                            <tr>
                                {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                <th style="width:20%">Nome</th>
                                <th style="width:15%">Modelo</th>
                                <th style="width:15%">Marca</th>
                                <th style="width:15%">Tipo</th>
                                <th style="width:10%">Serial</th>
                                <th style="width:10%">Chassis</th>
                                <th style="width:10%">Ano</th>
                                <th style="width:15%">Estado</th>
                                <th>{{__('text.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($type->equipment->where('area_id',Auth::user()->role_id) as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->make}}</td>
                                    <td>{{$item->model}}</td>
                                    <td>{{$item->type->name}}</td>
                                    <td>{{$item->serial}}</td>
                                    <td>{{$item->chassis}}</td>
                                    <td>{{$item->year}}</td>
                                    <td>@if ($item->status == 1) <span class="badge bg-success">Disponível</span> @else <span class="badge bg-danger">Indisponível</span> @endif</td>
                                    <td class="table-action">
                                        {{-- <a href="{{URL::to('/equipment-area/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a> --}}
                                        <a href="{{URL::to('/equipment-area/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                        {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                                    </td> 
                                </tr>
                               
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
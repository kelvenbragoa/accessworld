@extends('layouts_manutencao.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Requisição de Equipamento</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <a href="{{route('equipment.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>Adicionar</a>
                   
                </div> --}}
                
                <div class="card-body">
                    @if (Session::has('messageSuccess'))
                        <div class="alert alert-success">
                            {{Session::get('messageSuccess')}}
                        </div>
                    @endif
                    @if (Session::has('messageError'))
                        <div class="alert alert-danger">
                            {{Session::get('messageError')}}
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table id="myTable" class="table display" >
                        <thead>
                            <tr>
                                {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                                <th style="width:20%">Turno</th>
                                <th style="width:15%">Equipamento</th>
                                <th style="width:10%">Quantidade Requisitada</th>
                                <th style="width:10%">Quantidade Respondida</th>
                                <th style="width:10%">Percentagem</th>
                                <th style="width:15%">Observação</th>
                                <th style="width:15%">Estado</th>
                                 <th>{{__('text.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $item)
                                <tr>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->scheduled_shift->shift->name}}</td>
                                    <td>{{$item->type_equipment->name}}</td>
                                    <td>{{$item->qtd}}</td>
                                    <td>{{$item->qtd_real}}</td>
                                    <td>{{(100*$item->qtd_real)/ $item->qtd }}%</td>
                                    <td>{{$item->obs}}</td>
                                    <td>@if ($item->status == 1) <span class="badge bg-success">Respondido</span> @else <span class="badge bg-danger">Pendente</span> @endif</td>
                                    <td>
                                        @if ($item->status == 0)
                                        <a href="{{URL::to('/equipmentrequest/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                        @endif
                                        <a href="{{URL::to('/equipmentrequest/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                    </td>
                                </tr>
                                @include('manutencao.equipment.modaldelete')
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
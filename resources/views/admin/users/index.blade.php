@extends('layouts_admin.master')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Destino de Aplicação</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('users.create')}}" class="btn btn-pill btn-primary"><i class="far fa-plus"></i>Adicionar</a>
                   <a href="" data-toggle="modal" data-target="#exampleImport" class="btn btn-pill btn-warning"><i class="far fa-plus"></i>{{__('text.import')}}</a>
                    @include('admin.users.modalimport')  
                </div>
                
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
                              
                                <th style="width:20%">Nome</th>
                                <th style="width:20%">Email</th>
                                <th style="width:20%">Telefone</th>
                                <th style="width:20%">Nível</th>
                                <th style="width:20%">Codigo</th>
                               
                                <th>{{__('text.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                   
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->mobile}}</td>
                                    <td>{{$item->role->name}}</td>
                                    <td>{{$item->code}}</td>
                                   
                                   

                                    <td class="table-action">
                                        <a href="{{URL::to('/users/'.$item->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                       
                                    </td> 
                                </tr>
                                @include('manutencao.destination.modaldelete')
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
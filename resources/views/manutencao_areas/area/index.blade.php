@extends('manutencao_areas.layouts_area_manutencao.master')
@section('content')

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('text.analytics_dashboard')}} - {{\App\Models\Area::find(Auth::user()->role_id)->name}}</strong></h3>
        </div>

        
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Total MCSCR</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3">{{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->get())}}</h1>
                                        <div class="mb-1">
                                          
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 class="">Este mês: {{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->get())}}</h5>
                                        <h5 class="">Este ano: {{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->whereYear('created_at',date('Y'))->get())}}</h5>
                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Total MCSCR ABERTOS</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3">{{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('status',0)->get())}}</h1>
                                        <div class="mb-1">
                                            
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 class="">Este mês: {{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('status',0)->whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->get())}}</h5>
                                        <h5 class="">Este ano: {{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('status',0)->whereYear('created_at',date('Y'))->get())}}</h5>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Total MCSCR Fechados</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3">{{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('status',1)->get())}}</h1>
                                        <div class="mb-1">
                                           
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 class="">Este mês: {{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('status',1)->whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->get())}}</h5>
                                        <h5 class="">Este ano: {{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('status',1)->whereYear('created_at',date('Y'))->get())}}</h5>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Horas Paralizadas (MCSCR FECHADOS)</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3">{{$time_total}}H</h1>
                                        <div class="mb-1">
                                           
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 class="">Este mês: {{$time_m}}H</h5>
                                        <h5 class="">Este ano: {{$time_y}}H</h5>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Equipamentos Aguardando Peças</h5>
                                <h1 class="mt-1 mb-3">{{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('waiting_id',1)->get())}} </h1>
                                <div class="mb-1">
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Equipamentos Aguardando Técnicos</h5>
                                <h1 class="mt-1 mb-3">{{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('waiting_id',2)->get())}} </h1>
                                <div class="mb-1">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Equipamentos Acidentados</h5>
                                <h1 class="mt-1 mb-3">{{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('waiting_id',3)->get())}} </h1>
                                <div class="mb-1">
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">MCSCR Aguardando Aprovação</h5>
                                <h1 class="mt-1 mb-3">{{count(\App\Models\Mcscr::where('area_id',Auth::user()->role_id)->where('status',2)->get())}} </h1>
                                <div class="mb-1">
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    
</div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Total Equipamentos</h5>
                                    <h1 class="mt-1 mb-3">{{count(\App\Models\Equipment::where('area_id',Auth::user()->role_id)->get())}}</h1>
                                    <div class="mb-1">
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Total Equipamentos Disponíveis</h5>
                                    <h1 class="mt-1 mb-3">{{count(\App\Models\Equipment::where('area_id',Auth::user()->role_id)->where('status',1)->get())}}</h1>
                                    <div class="mb-1">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Total Equipamentos indisponíveis</h5>
                                    <h1 class="mt-1 mb-3">{{count(\App\Models\Equipment::where('area_id',Auth::user()->role_id)->where('status',0)->get())}}</h1>
                                    <div class="mb-1">
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Percentagem global disponibilidade</h5>
                                    @if (count(\App\Models\Equipment::where('area_id',Auth::user()->role_id)->get())>0)
                                    <h1 class="mt-1 mb-3"> {{round(count(\App\Models\Equipment::where('area_id',Auth::user()->role_id)->where('status',1)->get())*100/count(\App\Models\Equipment::where('area_id',Auth::user()->role_id)->get()),2)  }} % </h1>
                                    @else
                                    <h1 class="mt-1 mb-3">0% </h1>
                                    @endif
                                    
                                    <div class="mb-1">
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
    
        
    </div>
    <hr>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Disponibilidade por Destino de Aplicação</strong></h3>
        </div>

        
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="w-100">
                <div class="row">

                    @foreach (\App\Models\Destination::all() as $item)
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-4">{{$item->name}}</h5>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-1 mb-3" style="color: green">{{count(\App\Models\Equipment::where('area_id',Auth::user()->role_id)->where('status',1)->where('destination_id',$item->id)->get())}}</h1>
                                        <div class="mb-1">
                                          Total Equipamentos: {{count(\App\Models\Equipment::where('area_id',Auth::user()->role_id)->where('destination_id',$item->id)->get())}} <a href="{{URL::to('/availability-area/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i>Ver</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h1 class="mt-1 mb-3" style="color: red">{{count(\App\Models\Equipment::where('area_id',Auth::user()->role_id)->where('status',0)->where('destination_id',$item->id)->get())}}</h1>
                                        <div class="mb-1">
                                          
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                  
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>



    <hr>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Disponibilidade por tipo de Equipamentos</strong></h3>
        </div>

        
    </div>
    <div class="row">
  
            <div class="table-responsive">
                <table id="myTable" class="table display" >
                    <thead>
                        <tr>
                            {{-- <th style="width:10%;">{{__('text.id')}}</th> --}}
                            <th style="width:25%">Nome</th>
                           
                            <th style="width:10%">Quantidade Equipamentos</th>
                            <th style="width:10%">Percentagem Disponibilidade(%)</th>
                            <th style="width:10%">Disponíveis</th>
                            <th style="width:10%">Indisponíveis</th>
                            <th>{{__('text.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\TypeEquipment::all() as $item)
                            <tr>
                                {{-- <td>{{$item->id}}</td> --}}
                                <td>{{$item->name}}</td>
                           
                                <td>{{count($item->equipment->where('area_id',Auth::user()->role_id))}}</td>
                                @if (count($item->equipment->where('area_id',Auth::user()->role_id)) == 0)
                                    <td>0%</td>
                                @else
                                <td>{{round(count($item->equipment->where('area_id',Auth::user()->role_id)->where('status',1))*100/count($item->equipment->where('area_id',Auth::user()->role_id)),2)}} %</td>
                                @endif
                                
                                <td style="color: green">{{count($item->equipment->where('area_id',Auth::user()->role_id)->where('status',1))}}</td>
                                <td style="color: red">{{count($item->equipment->where('area_id',Auth::user()->role_id)->where('status',0))}}</td>

                                <td class="table-action">
                                    
                                    <a href="{{URL::to('/type_equipment-area/'.$item->id)}}"><i class="align-middle" data-feather="eye"></i></a>
                                    {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                                </td> 
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                </div>
        
        
    </div>

</div>

@endsection
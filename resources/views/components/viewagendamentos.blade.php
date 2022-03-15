@extends('layouts.app')

@section('title', '| Main')

@section('content')
    @include('components/navbar')
    <div style="margin-top: 10vh;">
        <a href="{{ route('logout') }}" class="position-absolute top-0 end-0 link-secondary p-3" style="width: 1300px; height: 1000px; display: table-cell; text-align: center; vertical-align: middle;">
            <i class="bi bi-box-arrow-right fs-3"></i>
        </a>
        <div class=" card min-vh-100 justify-content-center align-items-center" style="margin: 0 15% 0 15%;">
            <h2 class="link-danger">Agendamentos</h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código:</th>
                        <th scope="col">Data:</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Medico:</th>
                        <th scope="col">Paciente:</th>
                        <th scope="col">Excluir</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                @foreach ($agendas as $agenda)
                   <tr>

                       <th scope="row">{{$agenda->id}}</th>
                       <th scope="row">{{$agenda->data_consulta}}</th>
                       <th scope="row">{{$agenda->horario}}</th>
                       <th scope="row">{{$agenda->nome_medico}}</th>
                       <th scope="row">{{$agenda->nome}}</th>
                       <th scope="row"><a href="/agendamentos/delete/{{$agenda->id}}">
                        <i class="bi bi-trash fs-5 link-danger"></i>
                    </a></th>
                    <th scope="row"><a href="/agendamentos/edit/{{$agenda->id}}">
                        <i class="bi bi-pencil-square fs-5 link-danger"></i>
                    </a></th>
                </tr>
            </div>
            @endforeach
        </table>
        <a href="/dashboard">
            <i class="bi bi-arrow-left-circle-fill link-danger">Anterior</i>
            </a>
            <a href="/agendamentos/create">
                <i class="bi bi-plus-circle-fill link-danger">Novo</i>
                </a>
        </div>
        
    </div>
   
    
@endsection

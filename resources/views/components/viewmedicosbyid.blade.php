
@extends('layouts.app')

@section('title', '| Médicos')

@section('content')
    @include('components/navbar')
    <div style="margin-top: 7vh ;">
        <div class="card min-vh-100 justify-content-center align-items-center" style="margin: 0 15% 0 15%;">
            <h1 class="link-danger">{{$medicos->nome_medico}}</h1>
            <h3 class="link-danger">{{$medicos->especialidade}}</h3>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Paciente:</th>
                        <th scope="col">Data:</th>
                        <th scope="col">horario:</th>
                        <th scope="col">Sintomas:</th>
                        <th scope="col">Excluir</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                @foreach ($agendas as $agenda)
                <tr>
                    <th scope="row">{{$agenda->nome}}</th>
                    <th scope="row">{{$agenda->data_consulta}}</th>
                    <th scope="row">{{$agenda->horario}}</th>
                    <th scope="row">{{$agenda->observacao}}</th>
                    <th scope="row"><a href="/agendamentos/delete/{{$agenda->id}}">
                        <i class="bi bi-trash fs-5 link-danger"></i>
                    </a></th>
                    <th scope="row"><a href="/agendamentos/edit/{{$agenda->id}}">
                        <i class="bi bi-pencil-square fs-5 link-danger"></i>
                    </a></th>
                    
                </tr>
                @endforeach
            </table>
            <a href="/medicos">
            <i class="bi bi-arrow-left-circle-fill link-danger">Anterior</i>
            </a>
            <a href="/dashboard">
                <i class="bi bi-arrow-left-circle-fill link-danger">Página Inicial</i>
                </a>
            <a href="/medicos/create">
                <i class="bi bi-plus-circle-fill link-danger">Novo</i>
                </a>
        </div>
    </div>
    
@endsection



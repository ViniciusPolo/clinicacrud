
@extends('layouts.app')

@section('title', '| Médicos')

@section('content')
    @include('components/navbar')
    <div style="margin-top: 7vh ;">
        <div class="card min-vh-100 justify-content-center align-items-center" style="margin: 0 15% 0 15%;">
            <h1 class="link-danger">Pacientes</h1>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código:</th>
                        <th scope="col">Nome:</th>
                        <th scope="col">Data de Nascimento:</th>
                        <th scope="col">Sexo:</th>
                        <th scope="col">Observação:</th>
                        <th scope="col" >Excluir</th>
                        <th scope="col" >Editar</th>
                        <th scope="col">Consultar</th>
                    </tr>
                </thead>
                @foreach ($pacientes as $paciente)
                <tr>
                    <th scope="row">{{$paciente->id}}</th>
                    <th scope="row">{{$paciente->nome}}</th>
                    <th scope="row">{{$paciente->dt_nascimento}}</th>
                    <th scope="row">{{$paciente->sexo}}</th>
                    <th scope="row">{{$paciente->observação}}</th>
                    <th scope="row"><a href="/pacientes/delete/{{$paciente->id}}">
                        <i class="bi bi-trash fs-5 link-danger"></i>
                    </a></th>
                    <th scope="row"><a href="/pacientes/edit/{{$paciente->id}}">
                        <i class="bi bi-pencil-square fs-5 link-danger"></i>
                    </a></th>
                    <th scope="row"><a href="/pacientes/{{$paciente->id}}">
                        <i class="bi bi-zoom-in fs-5 link-danger"></i>
                    </a></th>

                    
                </tr>
                @endforeach
            </table>
            <a href="/dashboard">
                <i class="bi bi-arrow-left-circle-fill link-danger">Anterior</i>
                </a>
                <a href="/pacientes/create">
                    <i class="bi bi-plus-circle-fill link-danger">Novo</i>
                    </a>
        </div>
    </div>
    
@endsection

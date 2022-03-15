
@extends('layouts.app')

@section('title', '| Médicos')

@section('content')
    @include('components/navbar')
    <div style="margin-top: 7vh ;">
        <div class="card min-vh-100 justify-content-center align-items-center" style="margin: 0 15% 0 15%;">
            <h1 class="link-danger">Medicos</h1>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código:</th>
                        <th scope="col">Medico:</th>
                        <th scope="col">Especialidade:</th>
                        <th scope="col">Excluir</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Consultar</th>
                    </tr>
                </thead>
                @foreach ($medicos as $medico)
                <tr>
                    <th scope="row">{{$medico->id}}</th>
                    <th scope="row">{{$medico->nome_medico}}</th>
                    <th scope="row">{{$medico->especialidade}}</th>
                    <th scope="row"><a href="/medicos/delete/{{$medico->id}}">
                        <i class="bi bi-trash fs-5 link-danger"></i>
                    </a></th>
                    <th scope="row"><a href="/medicos/edit/{{$medico->id}}">
                        <i class="bi bi-pencil-square fs-5 link-danger"></i>
                    </a></th>
                    <th scope="row"><a href="/medicos/{{$medico->id}}">
                        <i class="bi bi-zoom-in fs-5 link-danger"></i>
                    </a></th>
                </tr>
                @endforeach
            </table>
            <a href="/dashboard">
            <i class="bi bi-arrow-left-circle-fill link-danger">Anterior</i>
            </a>
            <a href="/medicos/create">
                <i class="bi bi-plus-circle-fill link-danger">Novo</i>
                </a>
        </div>
    </div>
    
@endsection



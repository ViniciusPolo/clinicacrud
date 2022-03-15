@extends('layouts.app')

@section('title', '| Novo Médico')

@section('content')
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <form class="mw-100" action="/medicos/update/{{$medicos->id}}" method="post" style="width: 400px;">
            @csrf

            <h1 class="mb-5 text-danger text-center">Editar Médico</h1>

            <div class="mb-3">
                <input class="form-control" name="nome_medico" value="{{$medicos->nome_medico}}" required>
            </div>

            <div class="mb-3">
                <input class="form-control" name="especialidade" value="{{$medicos->especialidade}}" required>
            </div>

            <div class="mb-3">
                <input class="form-control" type="email" name="email" value="{{$medicos->email}}" required>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-danger" type="submit">Salvar</button>
        </form>
    </div>
@endsection
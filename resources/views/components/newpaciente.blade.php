@extends('layouts.app')

@section('title', '| Novo Paciente')

@include('components/navbar')
@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <form action="store" class="" method="post" enctype="multipart/form-data">
        @csrf
        Nome:<input type="text" name="nome" class="form-control" >
        <div class="" style="margin: 5px 0 5px 0; padding: 2px; padding: 5px;">
            Sexo:<br>
            <label for="sexo" class="">Feminino</label><input type="radio" name="sexo" value="Feminino"><br>
            <label for="sexo" class="">Masculino</label><input type="radio" name="sexo" value="Masculino"><br>
            <label for="sexo" class="">Não-Binário</label><input type="radio" name="sexo" value="Não Binário">
        </div>
            <label for="dt_nascimento" class="">Data de Nascimento:</label><input type="date" name="dt_nascimento" class="form-control">
        Telefone:<input type="text" name="telefone" class="form-control">
        Observação: <input type="text" name="observação" class="form-control">
        <button type="submit" class="form-control btn-danger" style="margin-top: 10px;">Salvar</button>
    </form>
</div>
@endsection
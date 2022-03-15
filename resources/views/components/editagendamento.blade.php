@extends('layouts.app')

@section('title', '| Agendar')

@include('components/navbar')
@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <form action="/agendamentos/update/{{$agendas->id}}" class="" method="post" enctype="multipart/form-data">
        @csrf
        Data:<input type="date" name="data_consulta" class="form-control" value="{{$agendas->data_consulta}}">
        Horário:<input type="time" name="horario" class="form-control" value="{{$agendas->horario}}">
        Observação: <input type="text" name="observacao" class="form-control" value="{{$agendas->observacao}}">
        Médico: <select name="medico_id" class="form-control">
            <option value=""></option>
            @foreach ($medicos as $medico)
            <option value="{{$medico->id}}  ">{{$medico->nome_medico}}</option>
            @endforeach
            </select>
        Paciente: <select name="paciente_id" class="form-control">
            <option value=""></option>
            @foreach ($pacientes as $paciente)
            <option value="{{$paciente->id}}">{{$paciente->nome}}</option>
            @endforeach
            </select>
        Marcada: <input type="radio" name="ativa" class="" value=1>
        Desmarcada: <input type="radio" name="ativa" class="" value=0>
        <button type="submit" class="form-control btn-danger">Salvar</button>
    </form>
</div>
@endsection
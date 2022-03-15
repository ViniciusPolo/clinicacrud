@extends('layouts.app')

@section('title', '| Dashboard')
@include('components/navbar')
@section('content')
    <style>
        .dashboard{
            padding: 20px;
            
        }
        .dashboard:hover{
            background: rgb(255, 172, 172);
            border-radius: 50px;
            transition: 1ms;
        }
        a{
            text-decoration: none;
        }
    </style>
    
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        
        <div class="">
            <table>
                <tr>
                    
                    <th class="dashboard"><a href="/agendamentos/create"><i class="bi bi-calendar2-plus fs-1 link-danger"> Novo Agendamento</i></a></th>
                    <th class="dashboard"><a href="/agendamentos"><i class="bi bi-calendar-week fs-1 link-danger"> Consultar Agenda</i></a></th>
                </tr>
                <tr>
                    
                    <th class="dashboard"><a href="/pacientes/create"><i class="bi bi-plus-square fs-1 link-danger"> Novo Paciente</i></a></th>
                    <th class="dashboard"><a href="/pacientes"><i class="bi bi-zoom-in fs-1 link-danger"> Consultar Pacientes</i></a></th>
                </tr>
            
            
                <tr>
                    <th class="dashboard"><a href="/medicos/create"><i class="bi bi-plus-square fs-1 link-danger"> Novo Médico</i></a></th>
                    <th class="dashboard"><a href="/medicos"><i class="bi bi-zoom-in fs-1 link-danger"> Consultar Médicos</i></a></th>

                </tr>  
                    
                </table>
        </div>
    </div>
    <a href="{{ route('logout') }}" class="position-absolute end-0 link-secondary p-3">
        <i class="bi bi-box-arrow-right fs-3">Sair</i>
    </a>
    
@endsection

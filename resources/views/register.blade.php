@extends('layouts.app')

@section('title', '| Novo Médico')

@section('content')
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <form class="mw-100" action="{{ route('signup') }}" method="post" style="width: 400px;">
            @csrf
            <h1 class="mb-5 text-danger text-center " >Clínica Crud</h1>

            <h1 class="mb-5 text-danger text-center">Cadastro</h1>

            <div class="mb-3">
                <input class="form-control" name="nome_medico" placeholder="Nome" required>
            </div>

            <div class="mb-3">
                <input class="form-control" name="especialidade" placeholder="Especialidade" required>
            </div>

            <div class="mb-3">
                <input class="form-control" type="email" name="email" placeholder="E-mail" required>
            </div>

            <div class="mb-3">
                <input class="form-control" type="password" name="password" placeholder="Senha" required>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-danger" type="submit">Cadastrar</button>
                <a class="link-secondary" href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
@endsection

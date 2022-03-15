<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agendamentos;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $agendas = Agendamentos::join('users','agendamentos.medico_id','=','users.id')
        ->join('pacientes','agendamentos.paciente_id','=','pacientes.id')
        ->select('agendamentos.id','horario','data_consulta','paciente_id','pacientes.nome','medico_id','users.nome_medico')
        ->orderby('data_consulta','asc','horario','asc')->get();
        return view('components/viewagendamentos', compact('agendas')); 

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = User::orderby('id','asc')->get();
        $pacientes = Pacientes::orderby('id','asc')->get();
        return view('components/newagendamento', compact('medicos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Agendamentos::create([
            'data_consulta'=>$request->data_consulta,
            'horario'=>$request->horario,
            'observacao'=>$request->observacao,
            'medico_id'=>$request->medico_id,
            'paciente_id'=>$request->paciente_id,
            'ativa'=>$request->ativa


        ]);

        return view ('dashboard');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agendas = Agendamentos::find($id);
        $medicos = User::orderby('id','asc')->get();
        $pacientes = Pacientes::orderby('id','asc')->get();
        return view('components/editagendamento', compact('agendas','medicos','pacientes'));

    }

    public function update(Request $request, $id)
    {
        $input = $request->only(
            'data_consulta',
            'observacao',
            'medico_id',
            'paciente_id',
            'ativa',
            'horario',
        );

        $agendamentos = Agendamentos::find($id);
        $agendamentos->update($input);
        return redirect('/agendamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agendamentos = Agendamentos::find($id);
        $agendamentos->delete();


        return redirect('dashboard');
    }
}

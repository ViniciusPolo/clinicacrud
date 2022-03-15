<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use App\Models\Agendamentos;
use Illuminate\Http\Request;
use Facade\Ignition\Support\Packagist\Package;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pacientes = Pacientes::orderby('id','desc')->get();
        return view('components/viewpacientes', compact('pacientes'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components/newpaciente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pacientes::create([
            'nome'=>$request->nome,
            'sexo'=>$request->sexo,
            'dt_nascimento'=>$request->dt_nascimento,
            'telefone'=>$request->telefone,
            'observação'=>$request->observação,

        ]);

        return view ('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pacientes = Pacientes::find($id);
        $agendas = Agendamentos::join('users','agendamentos.medico_id','=','users.id')
        ->join('pacientes','agendamentos.paciente_id','=','pacientes.id')
        ->select('agendamentos.id','horario','data_consulta','paciente_id','observacao','pacientes.nome','medico_id','users.nome_medico')
        ->where('paciente_id',"=",$pacientes->id)
        ->orderby('data_consulta','asc','horario','asc')->get();
        return view('components/viewpacientesbyid',compact('pacientes','agendas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacientes = Pacientes::find($id);
        return view('components/editpaciente', compact('pacientes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->only(
            'nome',
            'sexo',
            'dt_nascimento',
            'telefone',
            'observação',
        );

        $medico = Pacientes::find($id);
        $medico->update($input);
        return redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacientes = Pacientes::find($id);
        $pacientes->delete();


        return redirect('viewpacientes');
    }
}

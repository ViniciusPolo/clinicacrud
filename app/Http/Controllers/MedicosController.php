<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agendamentos;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = User::orderby('id','desc')->get();
        return view('/components/viewmedicos', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view ('/components/newmedico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'nome_medico' => $request->nome_medico,
            'especialidade' => $request->especialidade,
            'email' => $request->email,
            'password' => bcrypt($request->password)
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
        $medicos = User::find($id);
        $agendas = Agendamentos::join('users','agendamentos.medico_id','=','users.id')
        ->join('pacientes','agendamentos.paciente_id','=','pacientes.id')
        ->select('agendamentos.id','horario','data_consulta','paciente_id','observacao','pacientes.nome','medico_id','users.nome_medico')
        ->where('medico_id',"=",$medicos->id)
        ->orderby('data_consulta','asc','horario','asc')->get();
        return view('components/viewmedicosbyid',compact('medicos','agendas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicos = User::find($id);
        return view('components/editmedico', compact('medicos'));
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
            'nome_medico',
            'especialidade',
            'email',
        );

        $medico = User::find($id);
        $medico->update($input);
        return redirect('/medicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();


        return redirect('/medicos');
    }
}

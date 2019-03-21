<?php

namespace App\Http\Controllers;

use App\Medico;
use App\Paciente;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view("pacientes.index", compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = DB::table('medicos')
            ->orderBy('nome')
            ->get();

        return view("pacientes.create", compact('medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'cpf' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'cep' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'telefone_fixo' => 'required',
            'telefone_celular' => 'required',
            'e_mail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/pacientes/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $paciente = new Paciente();

            $paciente->nome = $request->input('nome');
            $paciente->cpf = $request->input('cpf');
            $paciente->rua = $request->input('rua');
            $paciente->numero = $request->input('numero');
            $paciente->cep = $request->input('cep');
            $paciente->bairro = $request->input('bairro');
            $paciente->cidade = $request->input('cidade');
            $paciente->estado = $request->input('estado');
            $paciente->pais = $request->input('pais');
            $paciente->telefone_fixo = $request->input('telefone_fixo');
            $paciente->telefone_celular = $request->input('telefone_celular');
            $paciente->e_mail = $request->input('e_mail');
            $paciente->observacoes = $request->input('observacoes');

            $paciente->save();

            // Salva os dados do multi select
            $paciente->medicos()->attach($request->medicos);

            return redirect('admin/pacientes')->with('status', 'Pacientes criado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        $paciente = Paciente::findOrFail($paciente->id);

        // Recebe uma lista de todos os médicos para alimentar no select multi
        $medicos = DB::table('medicos')
            ->orderBy('nome')
            ->get();

        // Recebe os médicos que estão vinculados como id do paciente
        $medicosSelecionados = DB::table('medico_paciente')
            ->where('paciente_id', '=', $paciente->id)
            ->get();

        return view('pacientes.edit', compact('paciente', 'medicos', 'medicosSelecionados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'cpf' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'cep' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'telefone_fixo' => 'required',
            'telefone_celular' => 'required',
            'e_mail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/pacientes/'.$paciente->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $paciente->nome = $request->input('nome');
            $paciente->cpf = $request->input('cpf');
            $paciente->rua = $request->input('rua');
            $paciente->numero = $request->input('numero');
            $paciente->cep = $request->input('cep');
            $paciente->bairro = $request->input('bairro');
            $paciente->cidade = $request->input('cidade');
            $paciente->estado = $request->input('estado');
            $paciente->pais = $request->input('pais');
            $paciente->telefone_fixo = $request->input('telefone_fixo');
            $paciente->telefone_celular = $request->input('telefone_celular');
            $paciente->e_mail = $request->input('e_mail');
            $paciente->observacoes = $request->input('observacoes');

            $paciente->save();

            // Salva os dados do multi select o sync salva os dados e faz com que os dados não sejam duplicados
            $paciente->medicos()->sync($request->medicos);

            return redirect('admin/pacientes')->with('status', 'Paciente atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente, Request $request)
    {
        $paciente = Paciente::findOrFail($paciente->id);

        if ( $request->ajax() ) {
            $paciente->delete( $request->all() );

            return response([
                'msg' => 'Paciente deletado com sucesso!',
                'status' => 'success'
            ]);
        } else {
            return response([
                'msg' => 'Falha ao deletar paciente!',
                'status' => 'failed'
            ]);
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Especialidade;
use Validator;
use App\Medico;
use Illuminate\Http\Request;
use TJGazel\Toastr\Facades\Toastr;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $medicos = Medico::all();
        return view("medicos.index", compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidade::all();
        return view("medicos.create", compact('especialidades'));
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
            'crm' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'cep' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'especialidade_id' => 'required',
            'telefone_fixo' => 'required',
            'telefone_celular' => 'required',
            'e_mail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/medicos/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $medico = new Medico();

            $medico->nome = $request->input('nome');
            $medico->crm = $request->input('crm');
            $medico->rua = $request->input('rua');
            $medico->numero = $request->input('numero');
            $medico->cep = $request->input('cep');
            $medico->bairro = $request->input('bairro');
            $medico->cidade = $request->input('cidade');
            $medico->estado = $request->input('estado');
            $medico->pais = $request->input('pais');
            $medico->especialidade_id = $request->input('especialidade_id');
            $medico->telefone_fixo = $request->input('telefone_fixo');
            $medico->telefone_celular = $request->input('telefone_celular');
            $medico->e_mail = $request->input('e_mail');
            $medico->observacoes = $request->input('observacoes');

            $medico->save();

            return redirect('admin/medicos')->with('status', 'Médico criado com sucesso!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        $medico = Medico::findOrFail($medico->id);
        return view('medicos.show')->withTask($medico);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        $medico = Medico::findOrFail($medico->id);
        $especialidades = Especialidade::all();

        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'crm' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'cep' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'especialidade_id' => 'required',
            'telefone_fixo' => 'required',
            'telefone_celular' => 'required',
            'e_mail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/medicos/'.$medico->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $medico->nome = $request->input('nome');
            $medico->crm = $request->input('crm');
            $medico->rua = $request->input('rua');
            $medico->numero = $request->input('numero');
            $medico->cep = $request->input('cep');
            $medico->bairro = $request->input('bairro');
            $medico->cidade = $request->input('cidade');
            $medico->estado = $request->input('estado');
            $medico->pais = $request->input('pais');
            $medico->especialidade_id = $request->input('especialidade_id');
            $medico->telefone_fixo = $request->input('telefone_fixo');
            $medico->telefone_celular = $request->input('telefone_celular');
            $medico->e_mail = $request->input('e_mail');
            $medico->observacoes = $request->input('observacoes');

            $medico->save();

            return redirect('admin/medicos')->with('status', 'Médico atualizado com sucesso!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $medico = Medico::findOrFail($id);

        if ( $request->ajax() ) {
            $medico->delete( $request->all() );
    
            return response([
                'msg' => 'Médico deletado com sucesso!',
                'status' => 'success'
            ]);
        } else {
            return response([
                'msg' => 'Falha ao deletar médico!',
                'status' => 'failed'
            ]);
        }

    }

}

<?php

namespace App\Http\Controllers;

use Validator;
use App\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidade::all();
        return view("especialidades.index", compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("especialidades.create");
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
            'descricao' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/especialidades/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $especialidade = new Especialidade();

            $especialidade->nome = $request->input('nome');
            $especialidade->descricao = $request->input('descricao');

            $especialidade->save();

            return redirect('admin/especialidades')->with('status', 'Especialidade criada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidade $especialidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidade $especialidade)
    {
        $especialidade = Especialidade::findOrFail($especialidade->id);

        return view('especialidades.edit', compact( 'especialidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidade $especialidade)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/especialidades/'.$especialidade->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $especialidade->nome = $request->input('nome');
            $especialidade->descricao = $request->input('descricao');

            $especialidade->save();

            return redirect('admin/especialidades')->with('status', 'Especialidade atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Especialidade $especialidade)
    {
        $especialidade = Especialidade::findOrFail($especialidade->id);

        if ( $request->ajax() ) {
            $especialidade->delete( $request->all() );

            return response([
                'msg' => 'Especialidade deletada com sucesso!',
                'status' => 'success'
            ]);
        } else {
            return response([
                'msg' => 'Falha ao deletar especialidade!',
                'status' => 'failed'
            ]);
        }
    }
}

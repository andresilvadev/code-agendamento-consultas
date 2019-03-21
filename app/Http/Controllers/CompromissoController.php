<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Compromisso;

class CompromissoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("compromissos.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();

            $response = [
                'status' => 'fail',
                'mensagem' => 'Ocorreu um erro ao gravar compromisso!',
                'data' => $errors
            ];

            return response()->json($response, 400);
        } 

            $compromisso = new Compromisso();
            $compromisso->title = $request->title;
            $compromisso->start = $request->start;
            $compromisso->end = $request->end;

            // dd($compromisso);

            try {
                $compromisso->save();

                 $response = [
                    'status' => 'success',
                    'mensagem' => 'Compromisso salve com sucesso!',
                    'compromisso' => $compromisso
                ];

                return response()->json($response, 201);
            }
            catch (\Exception $e) {

                $response = [
                    'status' => 'fail',
                    'mensagem' => 'Ocorreu um erro ao gravar compromisso!',
                    'exception' => $e->getMessage()
                ];
    
                return response()->json($response, 400);

            }
            

                    
           

            // return response()->json($response, 201);
        


        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Compromisso::findOrFail($id);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Lista todos os compromissos em formato json
     */
    public function list()
    {
        return \App\Compromisso::all();
    }
}

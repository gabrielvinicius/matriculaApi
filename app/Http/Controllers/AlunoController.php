<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Resources\AlunoJson as AlunoResourceJson; 
use App\Models\Curso as Curso;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $alunos = Aluno::all();
    return AlunoResourceJson::collection($alunos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
            $aluno = new Aluno;
            $aluno->nome = $request->input('nome');
            $aluno->email = $request->input('email');
            $aluno->curso()->associate(Curso::findOrFail($request->input('curso')));
            $aluno->save();
            return new AlunoResourceJson($aluno);
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alunos = Aluno::findOrFail($id);
        return new AlunoResourceJson($alunos);
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
        $aluno = Aluno::findOrFail($id);
    $aluno->nome = $request->input('nome');
    $aluno->email = $request->input('email');
    $aluno->curso()->associate(Curso::findOrFail($request->input('curso')));
    $aluno->save();
    return new AlunoResourceJson($aluno);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        if( $aluno->delete() ){
          return new AlunoResourceJson($aluno);
        }
    }
}

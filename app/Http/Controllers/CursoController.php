<?php

namespace App\Http\Controllers;

use App\Models\Curso as Curso;
use App\Http\Resources\CursoJson as CursoResourceJson;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $cursos = Curso::all();
   return CursoResourceJson::collection($cursos); 
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $validator = $request->validated([
            'name' => 'required'
        ]);


$curso = new Curso;
$curso->nome = $request->input('nome');
$curso->save();
return new CursoResourceJson($curso);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$curso = Curso::findOrFail($id);
    return new CursoResourceJson($curso);

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
    $curso = Curso::findOrFail($request->id);
    $curso->nome = $request->input('nome');

    if( $curso->save() ){
      return new CursoResourceJson( $curso );
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $curso = Curso::findOrFail($id);
    if( $curso->delete() ){
      return new CursoResourceJson($curso);
    }
    }
}

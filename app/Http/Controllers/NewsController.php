<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\News;
use Illuminate\Support\Facades\DB;
use App\Models\Reader;

class NewsController extends Controller
{
    /**
     * Muestra una lista de noticias
     */
    public function index()
    {
        $ORM_paginada = News::orderby('id','desc')->paginate();
        return view('News.modoEdicion',['ORM_paginada'=>$ORM_paginada]);
    }

    /**
     *  Formulario para crear una nueva noticia
     */
    public function create()
    {
        return view('News.create');

    }

    /**
     * Store news
     */
    public function store(Request $request)
    {
        $nuevo = News::create($request->all());
        return redirect()->route('News.show',$nuevo->id);
    }

    /**
     * Mostrar noticia lado edicion
     */
    public function show(string $id)
    {
         $noticia= News::find($id);   //Por convencion seria new, pero es palabra reservada de php

         //Para ver los suscriptores, accedemos a la tabla pivote
        $names ="";
        $suscriptores =  DB::table('news_reader')->select('reader_id')->where('news_id',$noticia->id)->get();    //Escribo $noticia->id en lugar de $noticia o solo $id, que tambien son validos, por visual
        foreach ($suscriptores as $suscriptores){
            $reader=Reader::find($suscriptores->reader_id);
            $names=$names." | ".$reader->name;
            }
        //Para poder agregar suscriptores
        $readers= Reader::all();
         return view('News.show',['noticia'=>$noticia,'names'=>$names,'readers'=>$readers]);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $noticia = News::find($id);
          return view('News.edit',['noticia'=>$noticia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actualizada = News::find($id);
        $actualizada->update($request->all());
        return redirect()->route('News.show',$actualizada->id);
    }

    /**
     * Remove the specified resource from storage, falta un alert js
     */
    public function destroy(string $id)
    {
        $noticia = News::find($id);
        $noticia->delete();
        return redirect()->route('index')->with('message','Eliminado Satisfactoriamente !');
    }

    /*
        Metodo para contar visitas no robots
    */
    /*
    public function contador_visitas(string $id){
        $noticia = News::find($id);
        $noticia->visitas= $noticia->visitas+1; //Aumenta el contador
        $noticia->save();
    }
    */
      /*
     *  Metodo crea readers y agrega suscripcion a news actual
     */

    public function agregar_suscriptor(string $news_id, Request $request){
        $noticia = News::find($news_id);
        $lector = Reader::find($request->id);
        DB::table('news_reader')->insert([['news_id'=>$noticia->id,'reader_id'=>$lector->id]]);
        return redirect()->route('Readers.show',$lector->id)->with('message','Agregado Satisfactoriamente !');
    }
}

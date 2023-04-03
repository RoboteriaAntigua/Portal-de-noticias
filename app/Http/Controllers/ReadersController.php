<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class ReadersController extends Controller
{
    /**
     * Muestro todos los lectores
     */
    public function index()
    {
        $lector = Reader::all();
        return view('Readers.modoEdicion',['lector'=> $lector]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Readers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nuevo = Reader::create($request->all());
        return redirect()->route('Readers.show',$nuevo->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lector= Reader::find($id);

        //Para ver las suscripciones que tiene el lector
        $titulos ="";
        $suscripciones =  DB::table('news_reader')->select('news_id')->where('reader_id',$lector->id)->get();
        foreach ($suscripciones as $suscripciones){
            $noticia=News::find($suscripciones->news_id);
            $titulos=$titulos." | ".$noticia->title;
            }
        //Para poder agregar suscripciones: Le paso todas las News para el form-select
        $news= News::all();
        return view('Readers.show',['lector'=>$lector,'titulos'=>$titulos,'news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lector = Reader::find($id);
        return view('Readers.edit',['lector'=>$lector]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actualizado = Reader::find($id);
        $actualizado->update($request->all());
        return redirect()->route('Readers.show',$actualizado->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lector = Reader::find($id);
        $lector->delete();
        return redirect()->route('Readers.modoEdicion')->with('message','Eliminado Satisfactoriamente !');
    }

    /*
     *  Metodo para agregar suscripciones de News a Readers
     */
    public function agregar_suscripcion(string $lector_id, Request $request){
        $lector = Reader::find($lector_id);
        $noticia = News::find($request->suscripcion);
        DB::table('news_reader')->insert([['reader_id'=>$lector->id,'news_id'=>$noticia->id]]);
        return redirect()->route('Readers.show',$lector->id)->with('message','Agregado Satisfactoriamente !');
    }


}

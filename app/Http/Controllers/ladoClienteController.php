<?php

namespace App\Http\Controllers;

use App\Models\News;
class ladoClienteController extends Controller
{
    /**
     *  El cliente ve las noticias en un formato "agradable"
     */
    public function index()
    {
        $ORM_paginada = News::orderby('id','desc')->paginate();    //Guardo en una variable la base de datos paginada
        return view('index',['ORM_paginada'=>$ORM_paginada]);
    }



    /**
     * Entra a una noticia especifica
     */
    public function show(string $id)
    {
        $noticia= News::find($id);   //Por convencion seria new, pero es palabra reservada de php
        //Para incrementar el contador de visitas
        $noticia->visitas= $noticia->visitas+1;
        $noticia->save();
        return view('show',['noticia'=>$noticia]);
    }

}

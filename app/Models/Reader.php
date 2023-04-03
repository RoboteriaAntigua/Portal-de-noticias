<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;
    protected $fillable= [
        'id',
        'name',
        'last_name'
    ];
    //******** Metodo Muchos a muchos ********** */
    public function News(){
        return $this->belongsToMany('App\Models\News');
        /* Guardar un registro con que relacione una noticia con varios lectores (suscripciones)
            $noticia = News::find($id);
            $noticia->readers()->attach($id);
            //$noticia->readers()->dettach($id); //para borrar

            guardar un registro que relacion un lector con muchas noticias
            $lector = Readers::find($id);
            $lector->News()->attacha($id);
            */
    }

}

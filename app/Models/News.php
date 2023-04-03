<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reader;

class News extends Model
{
    use HasFactory;

    /* Como el singular de News, New esta reservado para PHP: */
    protected $table="News";

    protected $fillable= [
        'title',
        'content',
        'autor'
    ];

    /*******Relacion muchos a muchos, tabla News y tabla Readers******** */
    public function Lectores(){
        return $this->belongsToMany('App\Models\Reader');
    }

}

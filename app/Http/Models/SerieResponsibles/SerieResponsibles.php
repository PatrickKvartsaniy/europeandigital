<?php

namespace App\Http\Models\SerieResponsibles;

use Eloquent;

class SerieResponsibles extends Eloquent
{
    protected $table = 'serie_responsibles';

    protected $fillable = [
        'serie_id',
        'user_id',
    ];

    protected $casts = [
        'serie_id' => 'integer',
        'user_id'  => 'integer',
    ];

    protected $dates = [

    ];

}

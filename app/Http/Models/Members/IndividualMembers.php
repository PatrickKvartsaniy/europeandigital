<?php

namespace App\Http\Models\Members;

use Eloquent;

class IndividualMembers extends Eloquent
{
    protected $table = 'individual_members';

    protected $fillable = [
        'first_name',
        'last_name',
        'avatar_img',
        'occupation',
        'nationality',
    ];

    protected $casts = [
        'id'          => 'integer',
        'first_name'  => 'string',
        'last_name'   => 'string',
        'avatar_img'  => 'string',
        'occupation'  => 'string',
        'nationality' => 'string',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}

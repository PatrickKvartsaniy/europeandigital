<?php

namespace App\Http\Models\Members;

use Eloquent;

class Members extends Eloquent
{
    protected $table = 'members';

    protected $fillable = [
        'name',
        'logo',
        'type',
        'country_code',
        'is_hidden',
    ];

    protected $casts = [
        'id'           => 'integer',
        'name'         => 'string',
        'logo'         => 'string',
        'type'         => 'string',
        'country_code' => 'string',
        'is_hidden'    => 'boolean',
    ];

    protected $dates = [

    ];

    public static function allOrganizations()
    {
        return self::where('type', 'organization')
            ->where('is_hidden', '0')
            ->get();
    }
}

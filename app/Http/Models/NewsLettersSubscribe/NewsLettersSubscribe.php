<?php

namespace App\Http\Models\NewsLettersSubscribe;

use Eloquent;

class NewsLettersSubscribe extends Eloquent
{
    protected $table = 'newsletter_subscribe';

    protected $fillable = [
        'name',
        'email',
        'user_agent',
    ];

    protected $casts = [
        'id'         => 'integer',
        'name'       => 'string',
        'email'      => 'string',
        'user_agent' => 'string',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public static function checkEmailExists($email)
    {
        $record = self::where('email', '=', $email)->first();
        if ($record) {
            return true;
        }

        return false;
    }

}

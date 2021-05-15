<?php

namespace App\Http\Models\Settings;

use Eloquent;

class Settings extends Eloquent
{
    protected $table = 'global_settings';

    protected $fillable = [
        'global_twitter_link',
        'global_facebook_link',
        'global_linkedin_link',
        'global_email_link',
        'global_footer_address',
    ];

    protected $casts = [
        'id'                    => 'integer',
        'global_twitter_link'   => 'string',
        'global_facebook_link'  => 'string',
        'global_linkedin_link'  => 'string',
        'global_email_link'     => 'string',
        'global_footer_address' => 'string',
    ];

    protected $dates = [

    ];

}

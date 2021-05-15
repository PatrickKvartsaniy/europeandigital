<?php

namespace App\Http\Models\PagesContent;

use Eloquent;
//use \Venturecraft\Revisionable\RevisionableTrait;

class PagesContent extends Eloquent
{
   // use RevisionableTrait;

    protected $table = 'pages_content';

    protected $fillable = [
        'name'       => 'string',
        'content_id' => 'string',
        'content'    => 'string',
    ];

    protected $casts = [
        'id'         => 'integer',
        'name'       => 'string',
        'content_id' => 'string',
        'content'    => 'string',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public static function getFirstByContentId($contentId)
    {
        return self::where('content_id', '=', $contentId)->first();
    }

    public static function getFirstById($id)
    {
        return self::where('id', '=', $id)->first();
    }

}

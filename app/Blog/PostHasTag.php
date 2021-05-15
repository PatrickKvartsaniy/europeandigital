<?php

namespace App\Blog;

use Eloquent;

/**
 * App\Blog\PostHasTag
 *
 * @property int $post_id
 * @property int $tag_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Blog\Post[] $posts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasTag wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasTag whereTagId($value)
 * @mixin \Eloquent
 */
class PostHasTag extends Eloquent
{

    public $guarded = [];

    /**
     * PostHasTag constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('larablog.table.prefix').'_post_tag';
    }

    /**
     * @param $postId
     * @param $tagId
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getById($postId, $tagId)
    {
        return self::where('tag_id', '=', $tagId)->where('post_id', '=', $postId)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, '', '');
    }

}

<?php

namespace App\Blog;

use Eloquent;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * App\Blog\Tag
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property int $posts_count
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Blog\Post[] $posts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Tag findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Tag wherePostsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Eloquent
{
    use Sluggable;

    public $guarded = [];

    /**
     * Tag constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('larablog.table.prefix').'_tags';
    }

    /**
     * @param $tagId
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getById($tagId)
    {
        return self::where('id', '=', $tagId)->first();
    }

    /**
     * @param $serieId
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public static function getBySlug($slug)
    {
        return self::where('slug', '=', $slug)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, config('larablog.table.prefix').'_post_tag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAll()
    {
        return self::orderBy('slug', 'asc')->get();
    }

    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('tags').'/'.$this->slug;
    }

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}

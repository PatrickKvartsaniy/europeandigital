<?php

namespace App\Blog;

use App\User;
use Eloquent;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * App\Blog\Serie
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property int $posts_count
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Blog\Post[] $posts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Serie findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Serie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Serie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Serie wherePostsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Serie whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Serie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Serie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Serie extends Eloquent
{
    use Sluggable;

    public $guarded = [];

    /**
     * Serie constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('larablog.table.prefix').'_series';
    }

    public static function policies()
    {
        return self::where('type', 'policy')
            ->with(['posts'])->get();
    }

    /**
     * @param $serieId
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getById($serieId)
    {
        return self::where('id', '=', $serieId)->first();
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return self::orderBy('slug', 'asc')->with(['posts', 'responsibles'])->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllForMenu()
    {
        return self::where('show_in_main_menu', '=', true)->orderBy('position', 'asc')->get();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllOrderedByPosts()
    {
        return self::orderBy('posts_count', 'desc')->get();
    }

    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('series').'/'.$this->slug;
    }

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function responsibles()
    {
        return $this->belongsToMany(User::class, 'serie_responsibles',
            'serie_id', 'user_id');
    }

}
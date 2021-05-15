<?php

namespace App\Blog;

use App\User;
use Eloquent;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * App\Blog\Post
 *
 * @property int $id
 * @property int $serie_id
 * @property string $identifier
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $type
 * @property string $status
 * @property int $views_count
 * @property \Carbon\Carbon|null $published_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $language
 * @property string $short_description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Blog\PostHasFiles[] $files
 * @property-read mixed $buttons
 * @property-read mixed $full_title
 * @property-read mixed $img
 * @property-read mixed $meta
 * @property-read mixed $url
 * @property-read \App\Blog\Serie $serie
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Blog\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post search($search)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereSerieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\Post whereViewsCount($value)
 * @mixin \Eloquent
 */
class Post extends Eloquent
{

    use Sluggable;

    protected $dates = ['published_at'];

    public $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function posts()
    {
        return self::where('published_at', '<>', 'NULL')
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->with([
                'tags',
                'files',
                'serie',
            ])->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function postsAdmin()
    {
        return self:: //where('published_at', '<>', 'NULL')
        where('type', 'post')
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->with([
                'tags',
                'files',
                'serie',
            ])->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getBySlug($slug)
    {
        return self::where('slug', '=', $slug)
            ->where('published_at', '<>', 'NULL')
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->with([
                'tags',
                'files',
                'serie',
            ])
            ->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getNextById($id)
    {
        return self::where('id', '>', $id)
            ->where('published_at', '<>', 'NULL')
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->limit(1)
//            ->with([
//                'tags',
//                'files',
//                'serie',
//            ])
            ->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getPreviousById($id)
    {
        return self::where('id', '<', $id)
            ->where('published_at', '<>', 'NULL')
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->limit(1)
//            ->with([
//                'tags',
//                'files',
//                'serie',
//            ])
            ->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getPopularLimit(array $excludeIds = [], $limit = 4)
    {
        return self::where('published_at', '<>', 'NULL')
            ->whereNotIn('id', $excludeIds)
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('views_count', 'desc')
            ->limit($limit)
            ->with([
                'tags',
                'files',
                'serie',
            ])
            ->get();
    }

    public static function getPostsLimit(array $excludeIds = [], $limit = 6)
    {
        return self::where('published_at', '<>', 'NULL')
            ->whereNotIn('id', $excludeIds)
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('views_count', 'desc')
            ->limit($limit)
            ->with([
                'tags',
                'serie',
            ])
            ->get();
    }

    public static function getPostsForHomeLimit(array $excludeIds = [], $limit = 6)
    {
        return self::where('published_at', '<>', 'NULL')
            ->whereNotIn('id', $excludeIds)
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->with([
                'tags',
                'serie',
            ])
            ->get();
    }

    public static function getPostsForPoliciesLimit(array $excludeIds = [], $limit = 5)
    {
        return self::where('published_at', '<>', 'NULL')
            ->whereNotIn('id', $excludeIds)
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->distinct('serie')
            ->limit($limit)
            ->with([
                'tags',
                'serie',
            ])
            ->get();
    }

    public static function getPostsForEmailsLimit($emailPolicyId, array $excludeIds = [], $limit = 3)
    {
        return self::where('published_at', '<>', 'NULL')
            ->whereNotIn('id', $excludeIds)
            ->where('serie_id', '=', $emailPolicyId)
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->with([
                'tags',
                'serie',
            ])
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getRelatedLimit(array $excludeIds = [], $limit = 3)
    {
        return self::where('published_at', '<>', 'NULL')
            ->whereNotIn('id', $excludeIds)
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('views_count', 'desc')
            ->limit($limit)
            ->with([
                'tags',
                'files',
                'serie',
            ])
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getRecentLimit(array $excludeIds = [], $limit = 4)
    {
        return self::where('published_at', '<>', 'NULL')
            ->whereNotIn('id', $excludeIds)
            ->where('type', 'post')
            ->where('status', 'active')
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->with([
                'tags',
                'files',
                'serie',
            ])
            ->get();
    }

    /**
     * Post constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('larablog.table.prefix').'_posts';
    }

    /**
     * @param $postId
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|static
     */
    public function getById($postId)
    {
        return self::where('id', '=', $postId)->with(['files', 'tags', 'serie'])->first();
    }

    /**
     * @return int|mixed|string
     */
    public function getMaxIdentifier()
    {
        $max = self::orderBy('identifier', 'desc')->first();
        if (isset($max->identifier) && !empty($max->identifier)) {
            return $max->identifier + 1;
        }

        return 1;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, config('larablog.table.prefix').'_post_tag', 'post_id', 'tag_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    /**
     * @param $q
     * @param $search
     * @return mixed
     */
    public function scopeSearch($q, $search)
    {
        return $q->whereRaw("MATCH (`title`, `body`) AGAINST (?)", [$search]);
    }

    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        if ($this->external_slug) {
            return $this->external_slug;
        }

        return url('/').'/'.$this->slug;
    }

    /**
     * @return string
     */
    public function getFullTitleAttribute()
    {
        return ($this->serie ? $this->serie->title.' :: ' : '').$this->title;
    }

    /**
     * @param $val
     * @return mixed
     */
    public function getMetaAttribute($val)
    {
        return json_decode($val);
    }

    /**
     * @return mixed
     */
    public function getButtonsAttribute()
    {
        return $this->meta->buttons;
    }

    /**
     * @return string
     */
    public function getImgAttribute()
    {
        return url('/').(@$this->meta->img ?: config('larablog.meta.logo'));
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(PostHasFiles::class, 'post_id', 'id');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}

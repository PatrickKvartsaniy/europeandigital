<?php

namespace App\Blog;

use App\Traits\FileStorage;
use Eloquent;
use Illuminate\Http\UploadedFile;

/**
 * App\Blog\PostHasFiles
 *
 * @property int $id
 * @property string $name
 * @property string $dir
 * @property bool $is_main
 * @property string $original_name
 * @property int $post_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $base_name
 * @property-read mixed $full_path
 * @property-read mixed $large_real_name
 * @property-read mixed $little_real_name
 * @property-read mixed $medium_real_name
 * @property-read mixed $original_real_name
 * @property-read mixed $real_name
 * @property-read mixed $slide_real_name
 * @property-read mixed $small_real_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasFiles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasFiles whereDir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasFiles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasFiles whereIsMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasFiles whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasFiles whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasFiles wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Blog\PostHasFiles whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PostHasFiles extends Eloquent
{

    use FileStorage;

    protected $table = 'post_has_files';

    const IMAGE_DIR = '/post';

    protected $fillable = [
        'id',
        'dir',
        'name',
        'post_id',
        'is_visible',
        'is_main',
        'original_name',
    ];

    protected $casts = [
        'id'            => 'integer',
        'dir'           => 'string',
        'name'          => 'string',
        'post_id'       => 'integer',
        'is_visible'    => 'boolean',
        'is_main'       => 'boolean',
        'original_name' => 'string',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @param UploadedFile $uploadedFile
     * @param $attachmentId
     * @param null $isMain
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function saveImage(UploadedFile $uploadedFile, $attachmentId, $isMain = null)
    {
        $randomName = str_random(32); // config('crypto_art.name_length'));
        $ext = $uploadedFile->getClientOriginalExtension();
        $name = $uploadedFile->getClientOriginalName();
        $fullName = $randomName.'.'.$ext;
        $this->makeOriginFile($uploadedFile, $fullName);
        $this->makeSizeFile($uploadedFile, $fullName);

        return self::create([
            'name'                       => $randomName.'.'.$ext,
            'dir'                        => $this->getImageDir(),
            'is_main'                    => isset($isMain) && !empty($isMain) ? true : false,
            'original_name'              => $name,
            $this->getAttachmentColumn() => $attachmentId,
        ]);
    }

    /**
     * @return string
     */
    public function getFullPathAttribute()
    {
        return $this->dir.'/medium/'.$this->name;
    }

    /**
     * @param $postId
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getByPostId($postId)
    {
        return self::where('post_id', '=', $postId)->first();
    }

    /**
     * @return string
     */
    public function getAttachmentColumn()
    {
        return 'post_id';
    }

    /**
     * @return string
     */
    public function getImageDir()
    {
        return self::IMAGE_DIR;
    }

}

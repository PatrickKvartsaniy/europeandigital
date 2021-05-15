<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Storage;
use File;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Class FileStorage
 *
 * @property string $dir
 * @property string $name
 * @property string $original_name
 * @property string $real_name
 *
 * @package App\Helpers\FileStorage
 */
trait FileStorage
{
    /**
     * @param UploadedFile $uploadedFile
     * @param $nameFile
     * @return bool
     */
    private function makeOriginFile(UploadedFile $uploadedFile, $nameFile)
    {
        if (!File::exists(storage_path().('/app/crypto_art'))) {
            File::makeDirectory(storage_path().('/app/crypto_art'));
        }
        if (!File::exists(storage_path().('/app/crypto_art'.$this->getImageDir()))) {
            File::makeDirectory(storage_path().('/app/crypto_art'.$this->getImageDir()));
        }
        if (1 == true) { //if (config('crypto_art.original.enabled') == true) {
            $originalDirectory = '/app/crypto_art'.$this->getImageDir().'/'.'original'; // config('crypto_art.original.name');
            if (!File::exists(storage_path().($originalDirectory))) {
                File::makeDirectory(storage_path().($originalDirectory));
            }
            Image::make($uploadedFile)
                ->save(storage_path().($originalDirectory.'/'.$nameFile));
        }

        return true;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param $nameFile
     * @return bool
     */
    private function makeOriginAnyFile(UploadedFile $uploadedFile, $nameFile)
    {
        if (!File::exists(storage_path().('/app/crypto_art'))) {
            File::makeDirectory(storage_path().('/app/crypto_art'));
        }
        if (!File::exists(storage_path().('/app/crypto_art'.$this->getImageDir()))) {
            File::makeDirectory(storage_path().('/app/crypto_art'.$this->getImageDir()));
        }
        if (config('crypto_art.original.enabled') == true) {
            $originalDirectory = '/app/crypto_art'.$this->getImageDir().'/'.config('crypto_art.original.name');
            if (!File::exists(storage_path().($originalDirectory))) {
                File::makeDirectory(storage_path().($originalDirectory));
            }

            $uploadedFile->move(storage_path().($originalDirectory.'/'), $nameFile);

//            Image::make($uploadedFile)
//                ->save(storage_path().($originalDirectory.'/'.$nameFile));
        }

        return true;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param $nameFile
     * @return bool
     */
    private function makeSizeFile(UploadedFile $uploadedFile, $nameFile)
    {
        foreach (config('crypto_art.size') as $size) {
            if ($size['enabled'] != true) {
                continue;
            }
            $directory = '/app/crypto_art'.$this->getImageDir().'/'.$size['name'];
            if (!File::exists(storage_path().($directory))) {
                File::makeDirectory(storage_path().($directory));
            }
            Image::make($uploadedFile)
                ->resize($size['width'], $size['height'], function ($sizeHandler) {
                    $sizeHandler->aspectRatio();
                })
                ->save(storage_path().($directory.'/'.$nameFile));
        }

        return true;
    }

    /**
     * @param $sourcePath
     * @param $attachmentId
     * @param null $destinationPath
     * @return bool
     */
    public function copyImage($sourcePath, $attachmentId, $destinationPath = null)
    {
        if (!File::exists($sourcePath)) {
            return false;
        }
        if ($destinationPath && File::exists($destinationPath)) {
            return false;
        }

        $ext = File::extension($sourcePath);
        $name = File::name($sourcePath);

        if (!$destinationPath) {
            $randomName = str_random(config('crypto_art.name_length'));
            $path = File::dirname($sourcePath);
            $destinationPath = $path.'/'.$randomName.'.'.$ext;
        } else {
            $ext = File::extension($destinationPath);
            $randomName = File::name($destinationPath);
        }

        foreach (config('crypto_art.size') as $size) {
            if ($size['enabled'] != true) {
                continue;
            }
            $directory = '/app/crypto_art'.$this->getImageDir().'/'.$size['name'];
            if (!File::exists(storage_path().($directory))) {
                File::makeDirectory(storage_path().($directory));
            }
            Image::make($uploadedFile)
                ->resize($size['width'], $size['height'], function ($sizeHandler) {
                    $sizeHandler->aspectRatio();
                })
                ->save(storage_path().($directory.'/'.$nameFile));
        }

        if (!File::copy($sourcePath, $destinationPath)) {
            return false;
        }

        return self::create([
            'name'                       => $randomName.'.'.$ext,
            'dir'                        => $this->getImageDir(),
            'original_name'              => $name,
            $this->getAttachmentColumn() => $attachmentId,
        ]);
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param $attachmentId
     * @return mixed
     */
    public function saveImage(UploadedFile $uploadedFile, $attachmentId)
    {
        $randomName = str_random(config('crypto_art.name_length'));
        $ext = $uploadedFile->getClientOriginalExtension();
        $name = $uploadedFile->getClientOriginalName();
        $fullName = $randomName.'.'.$ext;
        $this->makeOriginFile($uploadedFile, $fullName);
        $this->makeSizeFile($uploadedFile, $fullName);

        return self::create([
            'name'                       => $randomName.'.'.$ext,
            'dir'                        => $this->getImageDir(),
            'original_name'              => $name,
            $this->getAttachmentColumn() => $attachmentId,
        ]);
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param $attachmentId
     * @return mixed
     */
    public function saveAnyFile(UploadedFile $uploadedFile, $attachmentId)
    {
        $randomName = str_random(config('crypto_art.name_length'));
        $ext = $uploadedFile->getClientOriginalExtension();
        $name = $uploadedFile->getClientOriginalName();
        $fullName = $randomName.'.'.$ext;
        $this->makeOriginAnyFile($uploadedFile, $fullName);

        return self::create([
            'name'                       => $randomName.'.'.$ext,
            'dir'                        => $this->getImageDir(),
            'original_name'              => $name,
            $this->getAttachmentColumn() => $attachmentId,
        ]);
    }

    /**
     *
     * @param UploadedFile $uploadedFile
     * @param integer $idFile
     * @return self
     */
    public function updateAnyFile(UploadedFile $uploadedFile, $idFile)
    {
        $oldFile = self::find((int)$idFile);
        if (!$oldFile) {
            return $oldFile;
        }
        $this->deleteOriginalImage($oldFile->name);
        $this->deleteSizeImage($oldFile->name);
        $randomName = str_random(config('crypto_art.name_length'));
        $ext = $uploadedFile->getClientOriginalExtension();
        $name = $uploadedFile->getClientOriginalName();
        $fullName = $randomName.'.'.$ext;
        $this->makeOriginAnyFile($uploadedFile, $fullName);

        return $oldFile->update([
            'name'          => $randomName.'.'.$ext,
            'original_name' => $name,
        ]);
    }

    /**
     *
     * @param UploadedFile $uploadedFile
     * @param integer $idFile
     * @return self
     */
    public function updateImg(UploadedFile $uploadedFile, $idFile)
    {
        $oldFile = self::find((int)$idFile);
        if (!$oldFile) {
            return $oldFile;
        }
        $this->deleteOriginalImage($oldFile->name);
        $this->deleteSizeImage($oldFile->name);
        $randomName = str_random(config('crypto_art.name_length'));
        $ext = $uploadedFile->extension();
        $name = $uploadedFile->getClientOriginalName();
        $fullName = $randomName.'.'.$ext;
        $this->makeOriginFile($uploadedFile, $fullName);
        $this->makeSizeFile($uploadedFile, $fullName);

        return $oldFile->update([
            'name'          => $randomName.'.'.$ext,
            'original_name' => $name,
        ]);
    }

    /**
     * @param integer $idFile
     * @return boolean
     * @throws \Exception
     */
    public function deleteImage($idFile)
    {
        /**
         * @var self $file
         */
        $file = self::find((int)$idFile);
        if (!$file) {
            return false;
        }
        $this->deleteOriginalImage($file->name);
        $this->deleteSizeImage($file->name);
        $file->delete();

        return true;
    }

    /**
     * @param $fileName
     * @return bool
     */
    private function deleteOriginalImage($fileName)
    {
        if (config('crypto_art.original.enabled') == true) {
            $originalDirectory = $this->getImageDir().'/'.config('crypto_art.original.name');
            if (!File::exists(storage_path().('/app/crypto_art'.$originalDirectory.'/'.$fileName))) {
                return false;
            }
            if (!File::delete(storage_path().('/app/crypto_art'.$originalDirectory.'/'.$fileName))) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param $fileName
     * @return bool
     */
    private function deleteSizeImage($fileName)
    {
        foreach (config('crypto_art.size') as $size) {
            $directory = $this->getImageDir().'/'.$size['name'];
            if (!File::exists(storage_path().('/app/crypto_art'.$directory.'/'.$fileName))) {
                continue;
            }
            if (!File::delete(storage_path().('/app/crypto_art'.$directory.'/'.$fileName))) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return string
     */
    public function getRealNameAttribute()
    {
        return '/app/crypto_art'.$this->dir.'/'.$this->name;
    }

    /**
     * @return string
     */
    public function getOriginalRealNameAttribute()
    {
        return '/app/crypto_art'.$this->dir.'/'.config('crypto_art.original.name').'/'.$this->name;
    }

    /**
     * @return string
     */
    public function getSmallRealNameAttribute()
    {
        return '/app/crypto_art'.$this->dir.'/'.config('crypto_art.size.small.name').'/'.$this->name;
    }

    /**
     * @return string
     */
    public function getLittleRealNameAttribute()
    {
        return '/app/crypto_art'.$this->dir.'/'.config('crypto_art.size.little.name').'/'.$this->name;
    }

    /**
     * @return string
     */
    public function getMediumRealNameAttribute()
    {
        return '/app/crypto_art'.$this->dir.'/'.config('crypto_art.size.medium.name').'/'.$this->name;
    }

    /**
     * @return string
     */
    public function getLargeRealNameAttribute()
    {
        return '/app/crypto_art'.$this->dir.'/'.config('crypto_art.size.large.name').'/'.$this->name;
    }

    /**
     * @return string
     */
    public function getSlideRealNameAttribute()
    {
        return '/app/crypto_art'.$this->dir.'/'.config('crypto_art.size.slide.name').'/'.$this->name;
    }

    /**
     * @return string
     */
    public function getBaseNameAttribute()
    {
        return '/app/crypto_art'.$this->dir.'/'.$this->original_name;
    }

    /**
     * @return string
     */
    abstract public function getAttachmentColumn();

    /**
     * @return string
     */
    abstract public function getImageDir();
}
<?php

namespace App\Models;


use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Client extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
    ];


    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(368)
    //         ->height(232)
    //         ->sharpen(10);
    // }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
        ->width(368)
            ->height(232)
            ->sharpen(10);

        $this->addMediaConversion('old-picture')
        ->sepia()
            ->border(10, 'black', Manipulations::BORDER_OVERLAY);

        $this->addMediaConversion('thumb-cropped')
        ->crop('crop-center', 400, 400); // Trim or crop the image to the center for specified width and height.
    }
}

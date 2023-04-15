<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'album_id',
        'title',
        'slug',
        'photo',
    ];

    public function albumName()
    {
        return $this->belongsTo(GalleryAlbum::class,'album_id');
    }
}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    // Tabelnaam
    protected $table = 'songs';

    // Primaire sleutel
    protected $primaryKey = 'id';

    // Primaire sleuteltype
    protected $keyType = 'string'; // Of 'int' voor auto-incrementele gehele getallen

    // Tijdstempels
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Vulbare velden
    protected $fillable = ['title', 'singer'];

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'album_song');
    }

}

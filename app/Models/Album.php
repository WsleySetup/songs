<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // Table name
    protected $table = 'albums';

    // Primary key
    protected $primaryKey = 'id';

    // Primary key type
    protected $keyType = 'string'; // Or 'int' for auto-increment integers

    // Timestamps
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Fillable fields
    protected $fillable = ['name', 'year', 'times_sold', 'band_id'];

    // One-to-Many relationship with Song
    public function songs()
    {
        return $this->belongsToMany(Song::class, 'album_song');
    }

    // Many-to-One relationship with Band
    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}

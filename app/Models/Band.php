<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    // Table name
    protected $table = 'bands';

    // Primary key
    protected $primaryKey = 'id';

    // Primary key type
    protected $keyType = 'string'; // Or 'int' for auto-increment integers

    // Timestamps
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Fillable fields
    protected $fillable = ['name', 'year', 'times_sold'];

    // One-to-Many relationship with Album
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}

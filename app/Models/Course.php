<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The materials that belong to the course.
     */
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}


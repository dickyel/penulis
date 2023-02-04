<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'categories_name','slug'
    ];

    protected $hidden =[];

    public function contents()
    {
        return $this->hasMany(
            Content::class,'id_categories','id'
        );
    }
}

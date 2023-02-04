<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'photos','id_contents'
    ];

    protected $hidden = [];

    public function contents()
    {
        return $this->belongsTo(
            Content::class,'id_content','id'
        );
    }
}

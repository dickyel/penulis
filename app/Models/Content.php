<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','id_users','id_categories','description'
    ];

    protected $hidden = [

    ];

    public function galleries()
    {

        return $this->hasMany(
            Gallery::class, 'id_contents','id'
        );
    }

    public function category()
    {
        return $this->belongsTo(
            Category::class,'id_categories','id'
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,'id_users','id'
        );
    }


}

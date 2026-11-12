<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        "name",
        "ISBN",
        "category_id",
        "author",
        "publisher",
        "publish_date",

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

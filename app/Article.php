<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Article extends Model
{
    protected $fillable = [
        'category_id', 'title', 'body'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
    	'category_name_th',
    	'category_name_en',
    	'category_status'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}

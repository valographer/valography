<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $with = ['category'];

    public function scopeFilter($query, $permission) {
        if(!$permission){
            $query->when(!$permission, function ($query, $permission) {
                $query->where('category_id', 'not like', '1');
            });
        }
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

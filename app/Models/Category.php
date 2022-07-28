<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug'
    ];

    public static function showCategories(){
        $permission = (auth()->user()->admin OR auth()->user()->kd ) ? true : false;
        
        $categories = Category::first()->filter($permission)->get();
        return $categories;
    }

    public function scopeFilter($query, $permission) {
        if(!$permission){
            $query->when(!$permission, function ($query, $permission) {
                $query->where('id', 'not like', '1');
            });
        }
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description',
        'image', 'price', 'category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sales(){
        return $this->belongsToMany(Sale::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}

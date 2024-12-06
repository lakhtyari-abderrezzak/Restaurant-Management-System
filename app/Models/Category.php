<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['title', 'slug'];
    public function menus(){
        return $this->hasMany(Menu::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}

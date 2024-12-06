<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    /** @use HasFactory<\Database\Factories\TableFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'status' ,'slug',
    ];
    public function sales(){
        return $this->belongsToMany(Sale::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}

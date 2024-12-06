<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servant extends Model
{
    /** @use HasFactory<\Database\Factories\ServantFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'address',
    ];
    public function sales(){
        return $this->hasMany(Sale::class);
    }
}

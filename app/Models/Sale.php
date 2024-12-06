<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'servant_id', 'quantity', 'price',
        'total', 'change', 'payment_type', 'payment_status'
    ];
    public function tables(){
        return $this->belongsToMany(Table::class);
    }
    public function menus(){
        return $this->belongsToMany(Menu::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function servant(){
        return $this->belongsTo(related: Servant::class);
    }
}

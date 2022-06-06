<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model


{  
    
    protected $fillable = [
        'name', 'country','company'
      ];
    
    
    
    
    
    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
    
    
    
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        protected $fillable = [
        'name'
      ];
    
    
    
    public function items()
    {
    
    return $this->belongsToMany('App\Models\Item', 'items_categories',  'category_id','items_id');
        
    }
    use HasFactory;
}

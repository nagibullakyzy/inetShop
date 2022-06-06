<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    protected $fillable = [
        'name','description','price', 'pic_url', 'producer_id'
      ];
    
    
    
    public function categories()
    {
    
    return $this->belongsToMany('App\Models\Category', 'items_categories', 'items_id', 'category_id');
        
    }
    
     public function producer()
    {
        return $this->belongsTo('App\Models\Producer','producer_id');
    }
    
  
    
    
    use HasFactory;
}

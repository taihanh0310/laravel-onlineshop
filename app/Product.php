<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{

    protected $table = "products";
    protected $fillable = [
        'category_id',
        'discount_id',
        'tags',
        'keywords',
        'price',
        'market_price',
        'status',
        'desciption',
        'use_icon',
        'use_icon_period_from',
        'use_icon_period_to',
        'images',
        'visible',
        'use_slideshow',
        'number_view',
        'number_like',
        'number_bookmark',
        'number_share',
        'number_item'
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }
    
    public function setCreatedByAttribute($email)
    {
        $this->attributes['created_by'] = Auth::user()->email;
    }
    
    public function setUpdatedByAttribute($email)
    {
        $this->attributes['updated_by'] = Auth::user()->email;
    }
    
    public function getImages($size = null){
        if($this->attributes['images']){
            $images = $this->attributes['images'];
            $id = $this->attributes['id'];
            $path = "images/products/" . $id;
            
            $images = explode("|", $images);
            $images = array_map(function ($image) use ($path)
            {
                return "$path/$image";
            }, $images);
            return array_filter($images);    
        }
        return array();
    }
    
    public function getImage(){
        $images = $this->getImages();
        if(!empty($images))
        {
            return reset($images);
        }
        return 'http://vignette3.wikia.nocookie.net/galaxylife/images/7/7c/Noimage.png/revision/latest?cb=20120622041841';
    }
    
    

}
